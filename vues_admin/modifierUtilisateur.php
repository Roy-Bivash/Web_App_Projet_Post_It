<div class="container">
    <div class="shadow-none p-3 mb-5 bg-light rounded">
        <h4 class="fw-lighter text-center">Selectionner un utilisateur à modifier</h4>
        <br>
        <form action="" method="post">
            <select name="utilisateurSelectionner" class="form-select" aria-label="Default select example">
                <option selected>Selectionner</option>
                <?php
                foreach($infosUtilisateurs as $lesInfos){
                    $leNom = $lesInfos['nom'];
                    $leLogin = $lesInfos['lg'];
                    echo "<option value=".$leLogin.">Nom : ".$leNom." - Login : ".$leLogin."</option>";
                }
                ?>
            </select>
            <br>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
        <br><br>
        
        <?php
        if(isset($_POST['utilisateurSelectionner'])){
            $utilisateurSelectionner = $_POST["utilisateurSelectionner"];
            $_SESSION['utilisateurSelectionner'] = $utilisateurSelectionner;
            // echo $utilisateurSelectionner;
            if($utilisateurSelectionner == "Selectionner"){
                echo "<h5 class=text-center>Veuillez selectionner un utilisateur</h5>";
            }else{
                $infosUtilisateur = getInfosUtilisateurSelectionner($utilisateurSelectionner);
                // var_dump($infosUtilisateur);
                $leNom = $infosUtilisateur['nom'];
                $leLogin = $infosUtilisateur['lg'];
                
                //Si la selection est OK :
                ?>
                <hr>
                <h4 class="fw-lighter text-center">Modifier un utilisateur</h4>
                <br>
                <form action="../admin/action_modifierUtilisateur.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input name="nom" type="text" class="form-control" placeholder="<?php echo $leNom; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label">Login</label>
                                <input name="login" type="text" class="form-control" placeholder="<?php echo $leLogin; ?>">
                            </div>
                        </div>
                    
                    </div><!--Fermeture du row -->

                    <select name="statutSelectionner" class="form-select" aria-label="Default select example">
                    <?php
                    
                    $typeUtilisateur = getAutorisation($utilisateurSelectionner)['admin'];
                    $_SESSION['typeUtilisateur'] = $typeUtilisateur;
                    if($typeUtilisateur != 0){
                        //si c'est un admin :
                        ?>
                        <option value="0">Utilisateur normal</option>
                        <option selected value="1">Administrateur</option>
                        <?php
                    }else{
                        //si ce n'est pas un admin :
                        ?>
                        <option selected value="0">Utilisateur normal</option>
                        <option value="1">Administrateur</option>
                        <?php
                    }
                    ?>
                    </select>
                    <br>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="../monCompte/?page=admin&action_admin=none" type="button" class="btn btn-danger">Annuler</a>
                </form>
                <?php
            }
        }
        ?>
    </div><!-- Fermeture du shadow -->
</div><!-- Fermeture du container -->