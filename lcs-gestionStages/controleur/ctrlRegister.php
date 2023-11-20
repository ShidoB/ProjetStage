<?php
    if(isset($_SESSION['login']) && $_SESSION['admin'] == true){
        include "$racine/vue/vueEntete.php";
        include "$racine/vue/vueRegister.php";
        include "$racine/vue/vuePied.php";
    }else{
        header('Location: ./?action=defaut');
    }
    