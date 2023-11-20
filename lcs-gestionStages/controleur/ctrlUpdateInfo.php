<?php

    include './modele/ModeleUserDAO.php';

    $firstname = filter_input(INPUT_POST,"firstname",FILTER_SANITIZE_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
    $mail = filter_input(INPUT_POST,"mail",FILTER_SANITIZE_SPECIAL_CHARS);

    try{
        $update = ModeleUserDAO::updateUserData($firstname,$name,$mail);
        header("Location: ./?action=defaut");
    }catch(PDOException $e){
        $e->getMessage();
        header("Location: ./?action=modifInfo");
    }


?>