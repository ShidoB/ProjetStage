<?php
// Inclure les fichiers de connexion à la base de données et les classes
include("Connexion.php");
include("classeStage.php");

// Vérifier le niveau d'autorisation de l'utilisateur
if ($_SESSION['user']->role !== 'etudiant' && $_SESSION['user']->role !== 'professeur'){
    header("Location: unauthorized.php");
    exit();php 
}

// Afficher le formulaire pour saisir les informations du stage
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include("vueStage.php");
}

// Traiter le formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $etudiantId = $_SESSION['user']->id;
    $periode = $_POST['periode'];
    $organisation = $_POST['organisation'];
    $maitreDeStageMail = $_POST['maitre_de_stage_mail'];
    $maitreDeStageTelephone = $_POST['maitre_de_stage_telephone'];
    $taches = $_POST['taches'];
    $avancementConvention = 'à faire';

    // Enregistrement du stage dans la base de données
    $sqlStage = "INSERT INTO stages (idEtudiant, idPeriode, idOrga, maitreStage, telMaitreStage, mailMaitreStage, descriptionStage, taches, avancementConvention) VALUES ('$etudiantId', '$periode', '$organisation', '$maitreDeStageMail', '$maitreDeStageTelephone', '$taches', '$avancementConvention')";
    $conn->query($sqlStage);

    header("Location: modeleStage.php");
    exit();
}
?>
