<?php
    session_start();
    $racine = dirname(__FILE__);

    include "$racine/controleur/Routeur.php";

    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!isset($action)){
        $action = "defaut";
    }

    $controleur = Routeur::getControleur($action);



    include "$racine/controleur/$controleur";