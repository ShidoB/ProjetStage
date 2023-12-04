<?php
// Inclure les fichiers de connexion à la base de données et les classes
include("Connexion.php");
include("classes/classeStage.php");



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
