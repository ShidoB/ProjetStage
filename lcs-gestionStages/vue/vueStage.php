<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Stage</title>
</head>
<body>
    <h2>Saisir les informations du stage</h2>
    <form method="post" action="modeleStage.php">
        <!-- Ajoutez les champs du formulaire ici -->
        <label for="periode">Période:</label>
        <input type="text" name="periode" required><br>

        <label for="organisation">ID de l'Organisation:</label>
        <input type="text" name="organisation" required><br>

        <label for="maitre_de_stage_mail">E-mail du Maître de stage:</label>
        <input type="text" name="maitre_de_stage_mail" required><br>

        <label for="maitre_de_stage_telephone">Téléphone du Maître de stage:</label>
        <input type="text" name="maitre_de_stage_telephone" required><br>

        <label for="taches">Résumé des tâches:</label>
        <textarea name="taches" required></textarea><br>

        <button type="submit">Soumettre</button>
    </form>
</body>
</html>
