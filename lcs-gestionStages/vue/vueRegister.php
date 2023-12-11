<div class="containerLog">
            <!-- zone de connexion -->
            
            <form action="./?action=verif&log-reg=register" method="POST">
                <h1>Enregistrer un nouvel utilisateur</h1>
                
                <?php 
                    if(isset($_GET['error'])){
                ?>
                <p style="color: red;">Une erreur dans le nom d'utilisateur ou le mot de passe a été rencontré</p>
                <?php }?>
				
				
				<div class="switch-field">
					<input type="radio" id="swEleve" name="userType" value="eleve" checked/>
					<label for="swEleve">Elève</label>
					<input type="radio" id="swProf" name="userType" value="professeur" />
					<label for="swProf">Professeur</label>
					<input type="radio" id="swAdmin" name="userType" value="admin" />
					<label for="swAdmin">Administrateur</label>
				</div>

				


                <label><b>Nom d'utilisateur</b></label>
                <input type="text" minlength="5" placeholder="Entrer le nom d'utilisateur" name="username" required>

				
                <label><b>Mot de passe</b></label>
                <input type="password" minlength="8" placeholder="Entrer le mot de passe" name="password" id="psw1" required>

                <label><b>Re-taper le mot de passe</b></label>
                <input type="password" minlength="8" placeholder="Entrer le mot de passe" name="passwordControl" id="psw2" required>

				<hr class="loginSeparation">

				<div id="setAdmin" class="hidden">
					<label for="setAdmin">Administrateur :  </label>
					<input type="radio" name="admin" checked disabled/>
				</div>


				<div id="first&Name">

					
					
					<label><b>Nom de famille</b></label>
					<input id="name" type="text" placeholder="Entrer le nom de famille" name="lastname" required>

					<label><b>Prénom</b></label>
					<input id="firstname" type="text" placeholder="Entrer le Prénom" name="firstname" required>
				</div>

				<!-- Enregistrement d'un élève : -->

				<div id="registerStudent">
					
					<p>Option :</p>
				 	<input type="radio" id="slam" name="option" value="SLAM">
					<label for="slam">SLAM</label><br>
				 	<input type="radio" id="sisr" name="option" value="SISR">
					<label for="sisr">SISR</label><br>
									
					<label for="examYear"><b>Année de l'examen : </b></label>
					<select class="selectYear" name="examYear">
					   <?php
						$year = (int)date('Y');
						for ($nextYear = $year+1; $nextYear >= 2018; $nextYear--){ 
							if($year == $nextYear){?>
								<option value="<?=$year;?>"><?=$year;?></option>
								<?php
							}else{
								?>
								<option value="<?=$nextYear;?>"><?=$nextYear;?></option>
							<?php
							}
						} 
							?>
					</select>
					
				</div>
				
				
				<!-- Enregistrement d'un professeur : -->

				<div id="registerTeacher" class="hidden">
					<label for="matiereProf">Matière : </label>
					<select class="selectMatiere" name="matiereProf">
						<option value="Francais">Francais</option>
						<option value="Math">Math</option>
						<option value="Developpement">Developpement</option>
						<option value="Reseau">Réseau</option>
						<option value="BDD">Base de données</option>
						<option value="Anglais">Anglais</option>
						<option value="CEJM">CEJM</option>
						
					
					</select>
				
				</div>
				
				

				<br>
				<input type="submit" id='subRegister' value="S'enregistrer" >
            </form> 
            
        </div>
