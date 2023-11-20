<?php

require_once '..\Connexion.php';


if (isset($_POST['username'])) {
  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
  deleteUser($username);
}

function deleteUser($username) {
  try {

    // if(ModeleUserDAO::isAdmin($username)){
    //     $queryAdmin = Connexion::getInstance()->prepare('DELETE FROM admin where idUser = (SELECT id FROM users WHERE login = :usrn)');
    //     $queryAdmin->bindValue(':usrn', $username, PDO::PARAM_STR);
    //     $queryAdmin->execute();

    //     $success = false;
    //     header('Content-Type: application/json');
    //     return json_encode(array('admin' => $success));
    // }

    $queryUser = Connexion::getInstance()->prepare('DELETE FROM users where login = :usrn');
    $queryUser->bindValue(':usrn', $username, PDO::PARAM_STR);
    $queryUser->execute();
    

    if($queryUser) {
        $success = true;
        header('Content-Type: application/json');
        return json_encode(array('success' => $success));
    } else {
        $success = false;
        header('Content-Type: application/json');
        return json_encode(array('error' => $success));
    }

  } catch (PDOException $e) {
        $success = false;
        header('Content-Type: application/json');
        return json_encode(array('catch' => $success));

    die();
  }
}
