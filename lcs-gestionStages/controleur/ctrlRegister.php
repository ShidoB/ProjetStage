<?php
    if(isset($_SESSION['login']) && $_SESSION['admin'] == true){
        include "$racine/vue/vueEntete.php";
        include "$racine/vue/vueRegister.php";
        include "$racine/vue/vuePied.php";
    }else{
        header('Location: ./?action=defaut');
    }
    
    if(isset($_SESSION['login']) && $_SESSION['admin'] == true){
    include "$racine/vue/vueEntete.php";

    // Nouvelle condition pour l'action "ajouter_utilisateur"
    if(isset($_GET['action']) && $_GET['action'] == 'ajouter_utilisateur'){
        // Traitement du formulaire d'ajout d'utilisateur
        if(isset($_POST['username']) && isset($_POST['password'])){
            $newUser = [
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                // Vous devriez également valider et sécuriser les données avant de les utiliser
            ];

            // Ajoutez le nouvel utilisateur à votre système de stockage (base de données, fichier, etc.)
            // Exemple avec un tableau de session pour stocker temporairement les utilisateurs
            $_SESSION['users'][] = $newUser;

            echo "Utilisateur ajouté avec succès!";
        }
    } else {
        include "$racine/vue/vueRegister.php";
    }

    include "$racine/vue/vuePied.php";
} else {
    header('Location: ./?action=defaut');
}
?>