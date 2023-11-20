<?php


include "$racine/vue/vueEntete.php";

if(!isset($_SESSION['login'])){
    include "$racine/vue/vueLogin.php";
}else{
    include "$racine/vue/vueAccueil.php";
}

include "$racine/vue/vuePied.php";

