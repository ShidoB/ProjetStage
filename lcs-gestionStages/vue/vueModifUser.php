<?php 
    if (isset($_SESSION['login']) && $_SESSION['admin'] == true) {

        $username = filter_input(INPUT_GET,'login',FILTER_SANITIZE_SPECIAL_CHARS);
?>

<h1 class="pageTitle">Modification de l'utilisateur <?=$username?></h1>




<?php

    }

?>