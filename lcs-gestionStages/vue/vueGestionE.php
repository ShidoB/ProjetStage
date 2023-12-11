<?php
if (isset($_SESSION['login']) && $_SESSION['admin'] == true) {

    include "./modele/ModeleUserDAO.php";
    $allUsers = ModeleUserDAO::loadUsers();
?>

    <h1 class="pageTitle">Gestion des utilisateurs</h1>
    <br><br>




    <br><br>
    <center>
        <br>

        <label>Rechercher un utilisateur</label>
        <select name="userSearch" id="userSearch">
            <option value="" disabled selected>Choisir un utilisateur</option>

            <?php
            foreach ($allUsers as $user) {
            ?>
                <option value="<?= $user->getName() ?>"><?= $user->getName() ?> <?= $user->getFirstname() ?></option>

            <?php
            }



            ?>
        </select>
        <input type="button" value="Rechercher" onclick="UpdateUserView()" style="cursor:pointer;">
        <br><br>

        <table class="userTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Login</th>
                    <th>Stage</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody id="userBody">

                <?php                


                if (isset($_GET['login'])) {
                    $login = filter_input(INPUT_GET, 'login', FILTER_SANITIZE_STRING);
                    $flag = false;
                    foreach ($allUsers as $user) {
                        if ($login == $user->getName()) {
                            $flag = true;
                            $usrn = $user->getUsername();
                ?>
                            <tr>
                                <td id="nomFamille"><?= $user->getName() ?></td>
                                <td><?= $user->getFirstname() ?></td>
                                <td><?= $user->getUsername() ?></td>
                                <td style="user-select: none;">
                                <?php 
                                
                                if(ModeleUserDAO::getStage($user->getUsername()) == 1){

                                    
                                        
                                    ?>
                                    <p>&#x2705</p>
                                    
                                    <p>(<a id="viewPdf" onclick='openPdf("<?php echo ModeleUserDAO::getConventionStage($user->getUsername()); ?>")'>Voir la convention</a>)</p>
                                    <?php
                                }else{
                                    ?>
                                    <p>&#x274C</p>
                                    
                                    <?php
                                }
                                ?>
                                </td>
                                

                                <td>
                                    <input type="button" value=" Modifier " id="<?= $usrn ?>UpdateBtn" onclick='updateUser(<?php echo (json_encode($usrn)); ?>)'></input>
                                </td>
                                <td>
                                    <input type="button" value=" Supprimer " id="<?= $usrn ?>DeleteBtn" onclick='deleteUser(<?php echo (json_encode($usrn)); ?>)'></input>
                                </td>
                            </tr>


                        <?php
                        }
                    }
                    if (!$flag) {
                        foreach ($allUsers as $user) {
                            $usrn = $user->getUsername();
                        ?>
                            <tr>
                                <td id="nomFamille"><?= $user->getName() ?></td>
                                <td><?= $user->getFirstname() ?></td>
                                <td><?= $user->getUsername() ?></td>
                                <td style="user-select: none;"><a href="">
                                <?php 
                                
                                if(ModeleUserDAO::getStage($user->getUsername()) == 1){

                                    
                                    
                                    ?>
                                    <p>&#x2705</p>
                                    
                                    <p>(<a id="viewPdf" onclick='openPdf("<?php echo ModeleUserDAO::getConventionStage($user->getUsername()); ?>")'>Voir la convention</a>)</p>
                                    <?php
                                }else{
                                    ?>
                                    <p>&#x274C</p>
                                    
                                    <?php
                                }
                                ?>
                                </td>
                                <td><input type="button" value=" Modifier " id="<?= $usrn ?>UpdateBtn" onclick='updateUser(<?php echo (json_encode($usrn)); ?>)'></input></td>
                                <td>
                                    <input type="button" value=" Supprimer " id="<?= $usrn ?>DeleteBtn" onclick='deleteUser(<?php echo (json_encode($usrn)); ?>)'></input>
                                </td>
                            </tr>


                        <?php
                        }
                    }
                } else {
                    foreach ($allUsers as $user) {
                        $usrn = $user->getUsername();
                        ?>
                        <tr>
                            <td id="nomFamille"><?= $user->getName() ?></td>
                            <td><?= $user->getFirstname() ?></td>
                            <td><?= $user->getUsername() ?></td>
                            <td style="user-select: none;">
                            <?php 
                                
                                if(ModeleUserDAO::getStage($user->getUsername()) == 1){

                                    ?>
                                    <p>&#x2705</p>
                                    
                                    <p>(<a id="viewPdf" onclick='openPdf("<?php echo ModeleUserDAO::getConventionStage($user->getUsername()); ?>")'>Voir la convention</a>)</p>
                                    <?php
                                }else{
                                    ?>
                                    <p>&#x274C</p>
                                    
                                    <?php
                                }
                                ?>
                                </td>
                            <td><input type="button" value=" Modifier " id="<?= $usrn ?>UpdateBtn" onclick='updateUser(<?php echo (json_encode($usrn)); ?>)'></input></td>
                            <td>
                                <input type="button" value=" Supprimer " id="<?= $usrn ?>DeleteBtn" onclick='deleteUser(<?php echo (json_encode($usrn)); ?>)'></input>
                            </td>
                        </tr>


                <?php
                    }
                }

                ?>




            </tbody>

        </table>


                <?php var_dump(ModeleUserDAO::isAdmin("d.duma"))?>
    </center>
<?php

} else {
    header('location: ./?action=defaut');
}
?>