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

        <label for="promo">Promotion :</label>
        <select name="promo" required>
            <option value="">--Veuillez choisir une option--</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
        </select>
        <br/>


        <label for="maitreStage">Nom du maître de stage:</label>
        <input type="text" name="maitreStage" required><br>

        <label for="profRef">Nom du Professeur Référent :</label>
        <input type="text" name="profRef" required><br>

        <label for="mailMaitreStage">Adresse mail du maître du stage :</label>
        <input type="email" name="mailMaitreStage" required><br>

        <label for="descriptionStage">Description du stage :</label><br>
        <textarea name="descriptionStage" rows="4" cols="50" required></textarea><br>

        <label for="commentMaitreStage">Commentaire du maître de stage :</label><br>
        <textarea name="commentMaitreStage" rows="4" cols="50" required></textarea><br>

        <label for="adr">Adresse :</label>
        <input type="text" name="adr" required><br>
        
        <label for="cP">Code Postal :</label>
        <input type="text" name="cP" required><br>
        
        <label for="ville">Ville :</label>
        <input type="text" name="ville" required><br>

        <label for="pays">Pays :</label>
        <input type="text" name="pays" required><br>

        <label for="periode">Période:</label><br>
        <label for="de">De</label>
        <input type="date" name="date1" required><br>
        <label for="à">à</label>
        <input type="date" name="date2" required><br>

        <br><button type="submit">Soumettre</button>
    </form>
</body>
</html>
