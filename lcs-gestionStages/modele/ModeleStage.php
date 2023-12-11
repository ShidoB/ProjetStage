<?php
// Inclure les fichiers de connexion à la base de données et les classes
include("Connexion.php");
include("classes/classeStage.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $profRef = $_POST['profRef'];
    $maitreStage = $_POST['maitreStage'];
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
    $sqlStage = "INSERT INTO stage (maitreStage, profRef, mailMaitreStage, descriptionStage, commentMaitreStage, adr, cP, ville, pays, conventionElevePDF, idEtudiant, idProf, idOrga, idPeriode, promo) VALUES ('$maitreStage', '$profRef', '$mailMaitreStage','$descriptionStage','$commentMaitreStage','$adr','$cP','$ville','$pays','$conventionElevePDF','$idEtudiant','$idProf','$idOrga','$idPeriode','$promo')";
    $conn->query($sqlStage);

    header("Location: modeleStage.php");
    exit();
}
?>
