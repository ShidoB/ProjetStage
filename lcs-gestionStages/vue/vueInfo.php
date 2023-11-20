<?php 
if(isset($_SESSION['login'])){
    require_once './modele/ModeleUserDAO.php';
?> 
<center>
    <div class="container">
        <h1>Bonjour <?php 
        
        $pseudo =  $_SESSION['login']; 
        $user = ModeleUserDAO::getUser($pseudo);
        echo $user->getFirstname();?></h1>



        

        <a href="./?action=modifInfo&citron=tarte">Mettre à jour mes données</a>
        <a href="./?action=modifInfo&citron=jaune">Modifier mon mot de passe</a>
    </div>
</center>
<?php }
else{
    header("Location: ./?action=defaut");
}