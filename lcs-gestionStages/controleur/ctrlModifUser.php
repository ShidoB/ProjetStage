<?php

if(isset($_SESSION['login']) && $_SESSION['admin']){
    include "./vue/vueEntete.php";
    include "./vue/vueModifUser.php";
    include "./vue/vuePied.php";
}else{
    header("Location: ./?action=defaut");
}