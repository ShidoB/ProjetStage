<?php

require_once ".\classes\User.php";
require_once "Connexion.php";


class ModeleUserDAO
{

    //Variable contenant tous les utilisateurs
    private static $allUsers;
    private static $enc_Key = "594fa9977cbcf4a8c25e0436f4fe2bbd7f17c79b0a9ca007b2cf949deac1f039";
    private static $cipher_Method = "AES-128-CBC";
    //Initialisation cryptage données



    //Méthodes permettant de lire tous les utilisateurs
    private static function readAll()
    {
        self::$allUsers = self::loadUsers();
        return self::$allUsers;
    }

    //Permet de charger les utilisateurs
    public static function loadUsers()
    {

        $result = [];

        try {

            //Initialisation et éxécution de la requête SQL
            $query = Connexion::getInstance()->prepare('SELECT * FROM users ORDER BY 1');
            $query->execute();
            $allRows = $query->fetchAll();

            //Traitement de chaque lignes de résultats
            foreach ($allRows as $row) {
                $query = Connexion::getInstance()->prepare('SELECT nom, prenom FROM etudiant WHERE idUser = :id UNION SELECT nom, prenom FROM professeur WHERE idUser = :id');
                $query->bindValue(':id', $row['id'], PDO::PARAM_INT);
                $query->execute();

                $FaLname = $query->fetch();

                if ($FaLname) {
                    $user = new User($row['login'], $row['mdp'], $row['id'], $FaLname['nom'], $FaLname['prenom']);
                } else {
                    $user = new User($row['login'], $row['mdp'], $row['id'], "Admin", "Admin");
                }
                $result[] = $user;
            }

            //tri par ordre alphabétique des lastname des users contenu dans le tableau $result
            usort($result, function ($a, $b) {
                return strcmp($a->getName(), $b->getName());
            });
            return $result;
        }
        //Gestion des erreurs
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

 
    public static function updateUserData(string $fstname, string $name, string $mail)
    {
        $username = $_SESSION['login'];
        $en_name = self::encryptData($name);

        $en_mail = self::encryptData($mail);

        $query = Connexion::getInstance()->prepare('UPDATE users SET firstname = :frstname,  h_name = :name, h_mail = :mail WHERE username= :username');
        $query->bindValue(":username", $username, PDO::PARAM_STR);
        $query->bindValue(":frstname", $fstname, PDO::PARAM_STR);
        $query->bindValue(":name", $en_name, PDO::PARAM_STR);
        $query->bindValue(":mail", $en_mail, PDO::PARAM_STR);

        $query->execute();
    }


    public static function updatePassword(string $newPass)
    {
        $username = $_SESSION['login'];

        $h_newPass = password_hash($newPass, PASSWORD_DEFAULT);

        $query = Connexion::getInstance()->prepare('UPDATE users SET h_password = :newPass WHERE username = :usrn');
        $query->bindValue(":newPass", $h_newPass, PDO::PARAM_STR);
        $query->bindValue(":usrn", $username, PDO::PARAM_STR);

        $query->execute();
    }


    private static function encryptData(string $dataToEncrypt)
    {
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher = self::$cipher_Method));
        $ciphertext_raw = openssl_encrypt($dataToEncrypt, $cipher, self::$enc_Key, $option = OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, self::$enc_Key, $as_binary = true);
        $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);


        return $ciphertext;
    }

    private static function decryptData(string $dataToDecrypt)
    {
        $c = base64_decode($dataToDecrypt);
        $ivlen = openssl_cipher_iv_length($cipher = self::$cipher_Method);
        $iv = substr($c, 0, $ivlen);
        $hmac = substr($c, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($c, $ivlen + $sha2len);
        $original_text = openssl_decrypt($ciphertext_raw, $cipher, self::$enc_Key, $option = OPENSSL_RAW_DATA, $iv);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, self::$enc_Key, $as_binary = true);

        if (hash_equals($hmac, $calcmac)) {
            $decrypted = $original_text;
        } else {
            $decrypted = "Confidential";
        }

        return $decrypted;
    }


    public static function verif($login, $passwrd)
    {
        self::readAll();
        $verif = false;
        foreach (self::$allUsers as $u) {
            if ($u->getUsername() == $login) {
                $verif = password_verify($passwrd, $u->getPassword());
            }
        }

        return $verif;
    }

    public static function getUser($login)
    {
        self::readAll();
        foreach (self::$allUsers as $u) {
            if ($u->getUsername() == $login) {
                return $u;
            }
        }
        return null;
    }

    public static function isAdmin($login)
    {
        self::readAll();
        $user = self::getUser($login);
        if ($user !== null) {
            $query = Connexion::getInstance()->prepare('SELECT * FROM admin WHERE idUser = :id');
            $query->bindValue(':id', $user->getId(), PDO::PARAM_INT);
            $query->execute();
            $res = $query->fetch();
            return !empty($res);
        } else {
            return false;
        }
    }


    public static function createStudent($login, $password, $lastName, $firstname, $option, $examYear)
    {

        //* Create user in DB

        $pHash = password_hash($password, PASSWORD_DEFAULT);

        $query = Connexion::getInstance()->prepare("INSERT INTO users (login,mdp) VALUES (:usrn,:psw)");
        $query->bindValue(':usrn', $login, PDO::PARAM_STR);
        $query->bindValue(':psw', $pHash, PDO::PARAM_STR);
        $query->execute();


        //* Create student in DB

        //? Get created user id 

        $query = Connexion::getInstance()->prepare("SELECT id FROM users where login = :usrn");
        $query->bindValue(':usrn', $login, PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetch();
        $uId = $result['id'];


        $query = Connexion::getInstance()->prepare("INSERT INTO etudiant (nom,prenom,option,anneeExam,idUser) VALUES (:nom,:prenom,:option,:anneeExam,:idUser)");
        $query->bindValue(':nom', $lastName, PDO::PARAM_STR);
        $query->bindValue(':prenom', $firstname, PDO::PARAM_STR);
        $query->bindValue(':option', $option, PDO::PARAM_STR);
        $query->bindValue(':anneeExam', $examYear, PDO::PARAM_STR);
        $query->bindValue(':idUser', $uId, PDO::PARAM_INT);
        $query->execute();
    }



    public static function createTeacher($login, $password, $lastName, $firstname, $matiere)
    {

        //* Create user in DB

        $pHash = password_hash($password, PASSWORD_DEFAULT);

        $query = Connexion::getInstance()->prepare("INSERT INTO users (login,mdp) VALUES (:usrn,:psw)");
        $query->bindValue(':usrn', $login, PDO::PARAM_STR);
        $query->bindValue(':psw', $pHash, PDO::PARAM_STR);
        $query->execute();


        //* Create student in DB

        //? Get created user id 

        $query = Connexion::getInstance()->prepare("SELECT id FROM users where login = :usrn");
        $query->bindValue(':usrn', $login, PDO::PARAM_STR);
        $query->execute();

        $result = $query->fetch();
        $uId = $result['id'];

        $query = Connexion::getInstance()->prepare("INSERT INTO professeur (nom,prenom,matiere,idUser) VALUES (:nom,:prenom,:matiere,:idUser)");
        $query->bindValue(':nom', $lastName, PDO::PARAM_STR);
        $query->bindValue(':prenom', $firstname, PDO::PARAM_STR);
        $query->bindValue(':matiere', $matiere, PDO::PARAM_STR);
        $query->bindValue(':idUser', $uId, PDO::PARAM_INT);
        $query->execute();
    }

    //function create admin user
    public static function createAdmin($login, $password)
    {

        //* Create user in DB

        $pHash = password_hash($password, PASSWORD_DEFAULT);

        $query = Connexion::getInstance()->prepare("INSERT INTO users (login,mdp) VALUES (:usrn,:psw); INSERT INTO admin (idUser) SELECT LAST_INSERT_ID();");
        $query->bindValue(':usrn', $login, PDO::PARAM_STR);
        $query->bindValue(':psw', $pHash, PDO::PARAM_STR);
        $query->execute();

    }
    //début fonction si un élève à un stage
    public static function getStage($login)
    {
        self::readAll();
        $user = self::getUser($login);
        if ($user !== null) {
            $query = Connexion::getInstance()->prepare('SELECT id FROM stage WHERE idEtudiant = (SELECT id FROM etudiant WHERE idUser = :id)');
            $query->bindValue(':id', $user->getId(), PDO::PARAM_INT);
            $query->execute();
            $res = $query->fetch();
            return !empty($res);
        } else {
            return false;
        }
    }


    //début function get pdfConventionStage
    public static function getConventionStage($login)
    {
        self::readAll();
        $user = self::getUser($login);
        if (isset($user)) {
            try{
            $query = Connexion::getInstance()->prepare('SELECT conventionElevePDF FROM stage WHERE idEtudiant = (SELECT id FROM etudiant WHERE idUser = :id)');
            $query->bindValue(':id', $user->getId(), PDO::PARAM_INT);
            $query->execute();
            $res = $query->fetch();
            $pdf_blob = $res['conventionElevePDF'];
            
            if($pdf_blob == ""){
                return null;
            }else{
                $filename = 'convention_' . $user->getName() . "-" . $user->getFirstname() . '.pdf';
                $file_path = './Data/PDFs/ConventionEleves/' . $filename;
                file_put_contents($file_path, $pdf_blob);
                
                return $file_path;
            }
            }catch(Exception $e){
                echo $e->getMessage();
                return null;
            }
            
        } else {
            return "User not found";
        }
    }
}
