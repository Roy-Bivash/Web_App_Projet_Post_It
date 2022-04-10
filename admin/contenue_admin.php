<?php
//fonction pour recuperer les infos des utilisateur
$infosUtilisateurs = getInfosUtilisateur();
//Compter les post-it commun
$nbPostItCommun = count(getNbPostItCommun());
//Compter les post-it prive
$nbPostItPrive = count(getNbPostItprive());

$nbUtilsateurs = count($infosUtilisateurs);

?>
<br>
<div class="container">

    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Sauvegarde
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="../fichier_Du_Site_Date_Maj_16062021/sauvegardeDuSite">Sauvegarder le site</a></li>
            <li><a class="dropdown-item" href="../monCompte/?page=admin&action_admin=sauvegarde">Sauvegarder la base de données</a></li>
        </ul>
    </div><!-- Fermeture du dropdown -->
    <br><br>

    <div class="row">
        <div class="col-sm-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Login</th>
                    <th scope="col">Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($infosUtilisateurs as $lesInfos){
                        $leNom = $lesInfos['nom'];
                        $leLogin = $lesInfos['lg'];
                        $leAdmin = $lesInfos['admin'];
                        if($leAdmin != 0){
                            //si c'est un admin
                            ?>
                            <tr>
                                <td class="table-success"><?php echo $leNom; ?></td>
                                <td class="table-success"><?php echo $leLogin; ?></td>
                                <td class="table-success">Administrateur</td>
                            </tr>
                            <?php
                        }else{
                            //si ce n'est pas un admin
                            ?>
                            <tr>
                                <td class="table-secondary"><?php echo $leNom; ?></td>
                                <td class="table-secondary"><?php echo $leLogin; ?></td>
                                <td class="table-secondary">Utilisateur normal</td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <h6 class="fw-lighter">Nombre d'utilisateurs : <?php echo $nbUtilsateurs ?></h6>
            <!-- Dropdown pour les actions -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Action utilisateurs
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="../monCompte/?page=admin&action_admin=ajoutUtilisateur">Ajouter un utilisateur</a></li>
                    <li><a class="dropdown-item" href="../monCompte/?page=admin&action_admin=suppUtilisateur">Supprimer un utilisateur</a></li>
                    <li><a class="dropdown-item" href="../monCompte/?page=admin&action_admin=modifierUtilisateur">Modifier un utilisateur</a></li>
                    <li><a class="dropdown-item" href="../monCompte/?page=admin&action_admin=reinitialiserMdp">Réinitialiser le mot de passe d'un utilisateur</a></li>
                </ul>
            </div><!-- Fermeture du dropdown -->
        </div><!--Fermeture de la colonne -->



        <div class="col-sm-6">
            <br><br>
            <h5 class="fw-lighter">Nombre de post-it commun : <?php echo $nbPostItCommun ?></h5>
            <h5 class="fw-lighter">Nombre de post-it privé : <?php echo $nbPostItPrive ?></h5>

            <!-- Dropdown pour les actions -->
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Action Post-it
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="../monCompte/?page=admin&action_admin=suppPostitCommun">Supprimer tous les Post-it Commun</a></li>
                    <li><a class="dropdown-item" href="../monCompte/?page=admin&action_admin=suppPostitPrive">Supprimer tous les Post-it Privé</a></li>
                </ul>
            </div><!-- Fermeture du dropdown -->
        </div><!--Fermeture de la colonne -->
    </div><!--Fermeture du row -->
</div><!-- Fermeture du container -->
