<?php
// Inclure les fichiers de connexion à la base de données et les classes
include("Connexion.php");
include("classes/classeStage.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $maitreStage = $_POST['maitreStage'];
    $profRef = $_POST['profRef'];
    $mailMaitreStage = $_POST['mailMaitreStage'];
    $descriptionStage = $_POST['descriptionStage'];
    $commentMaitreStage = $_POST['commentMaitreStage'];
    $adr = $_POST['adr'];
    $cP = $_POST['cP'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $conventionElevePDF = $_POST['conventionElevePDF'];
    $idEtudiant = $_POST['idEtudiant'];
    $idProf = $_POST['idProf'];
    $idOrga = $_POST['idOrga'];
    $idPeriode = $_POST['idPeriode'];
    $promo = $_POST['promo'];
    

    // Enregistrement du stage dans la base de données
    $sqlStage = "INSERT INTO stage (idEtudiant, idPeriode, idOrga, maitreStage, telMaitreStage, mailMaitreStage, descriptionStage, taches, avancementConvention) VALUES ('$etudiantId', '$periode', '$organisation', '$maitreDeStageMail', '$maitreDeStageTelephone', '$taches', '$avancementConvention')";
    $conn->query($sqlStage);

    header("Location: modeleStage.php");
    exit();
}
?>
