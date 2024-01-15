
    <div id="card-panel">


        
        
        <?php
        
        /**
         * ! CREATION DES CARTES POUR LES ADMINS
         */

            if(isset($_SESSION['login']) && $_SESSION['admin'] == true){
        ?>
        <div class="card_" onclick="location.href='./?action=viewUsers'">
            <img src="./images/gestionUser.png" alt="gestionEleve">
            <div class="wrapText">
                <h1>Gestion des utilisateurs</h1>
            </div>
        </div>
        
        <div class="card_" onclick="location.href='./?action=register'">
            
            <img src="./images/addUser.png" alt="gestionEleve">
            <div class="wrapText">
                <h1>Ajouter un utilisateur</h1>
            </div>
        </div>

         <div class="card_" onclick="location.href='./?action=stage'">
            
            <img src="./images/Document.webp" alt="gestionEleve">
            <div class="wrapText">
                <h1>Stages</h1>
            </div>
        </div>

        <?php 
            }

            /**
             * ! FIN CREATION DES CARTES POUR LES ADMINS
             * * -------------------------------
             * ! DEBUT CREATION DES CARTES POUR LES UTILISATEURS LAMBDA
             */
        ?>
        <div class="card_" onclick="location.href='#'">
            
            <img src="./images/mesDocs.png" alt="lesDocs">
            <div class="wrapText">
                <h1>Mes Documents</h1>
            </div>
        </div>

        
 
    </div>


