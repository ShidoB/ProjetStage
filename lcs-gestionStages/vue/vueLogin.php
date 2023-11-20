
        <div class="containerLog">
            <!-- zone de connexion -->
            
            <form action="./?action=verif&log-reg=login" method="POST">
                <h1>Connexion</h1>
                
                <?php 
                    if(isset($_GET['error'])){
                ?>
                <p style="color: red;">Une erreur dans le nom d'utilisateur ou le mot de passe a été rencontré</p>
                <?php }?>

                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value="Se connecter" >

            </form> 
			
        </div>
