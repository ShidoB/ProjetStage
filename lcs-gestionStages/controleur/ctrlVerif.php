<?php 

    include "$racine/modele/ModeleUserDAO.php";

//log-reg=login

   if($_GET['log-reg'] === 'login'){

        $login = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
        $psw = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
        
        $verif = ModeleUserDAO::verif($login,$psw);

        
        if($verif){
            
            $_SESSION['login'] = $login;
            $bool = ModeleUserDAO::isAdmin($login);
            $_SESSION['admin'] = $bool;
            header("Location: ./?action=defaut");
        }else{
            header("Location: ./?action=login&error=true");
        }


    }else if($_GET['log-reg'] === 'register'){

        if(isset($_POST['userType']) && $_POST['userType'] == "eleve"){

            //? Insertion d'un nouvel eleve

            $usrn = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
            $psw = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
            $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
            $option = filter_input(INPUT_POST, 'option', FILTER_SANITIZE_SPECIAL_CHARS);
            $examYear = filter_input(INPUT_POST, 'examYear', FILTER_SANITIZE_SPECIAL_CHARS);

            //? Formated year in datetime

            $year = date("Y", strtotime($examYear));

            ModeleUserDAO::createStudent($usrn,$psw,$lastname,$firstname,$option,$year);
            header("Location: ./?action=defaut");


        }else if(isset($_POST['userType']) && $_POST['userType'] == "professeur"){

            //? Insertion d'un nouveau prof

            $usrn = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
            $psw = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
            $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
            $matiere = filter_input(INPUT_POST, 'matiereProf', FILTER_SANITIZE_SPECIAL_CHARS);

            ModeleUserDAO::createTeacher($usrn,$psw,$lastname,$firstname,$matiere);
            header("Location: ./?action=defaut");
        }else if (isset($_POST['userType']) && $_POST['userType'] == "admin"){

            //? Insertion d'un nouvel admin

            $usrn = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
            $psw = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
          
            ModeleUserDAO::createAdmin($usrn,$psw);
            header("Location: ./?action=defaut");
        }
        
        
    }