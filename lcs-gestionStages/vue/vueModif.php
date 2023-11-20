    
<?php 
    if(isset($_SESSION['login'])){
        if($_GET['citron'] == 'tarte'){

?>
    <form action="./?action=updateInfo" method="post">
        <div class="container">
            <label for="firstname">Prénom : </label>
            <input type="text" name="firstname" required>
            <br>
            <label for="name">Nom de famille :</label>
            <input type="text" name="name" required>
            <br>
            <label for="mail">Adresse mail : </label>
            <input type="email" name="mail" required>
            <br>
            <button type="submit">Mettre à jour mes données</button>
        </div>
    </form>


<?php            
        }else if($_GET['citron'] == 'jaune'){
?>
    <form action="./?action=updatePass" method="post">
            <div class="container">
                <label for="name">Saisissez votre nom d'utlisateur : </label>
                <input type="text" id="name" name="username" required>
                <br>
                <label for="name">Nouveau mot de passe : </label>
                <input type="password" id="name" name="new_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir 1 majuscule, 1 minuscule, 1 chiffre et minmum 8 caractères" required>
                <br>
                <label for="name">Confirmez votre mot de passe </label>
                <input type="password" id="name" name="password_Verif" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <br>
                <button type="submit">Envoyer</button>
            </div>
        </form>
<?php
        }
    }
?>