<?php
//Pas besoin de session_start() car cette page serra inclu dans index.php qui elle a deja une session
$login = $_SESSION["login"];

$nom = getnom($login)['nom'];//chercher le nom dans la colonne nom

$nbPostItPrive = countPostItPrive($login)['COUNT(numPostIt)'];

?>
<br><br>

<div class="container">
    <div class="titre">
        <h4 class="fw-normal">modifier mes informations personnelles</h4>
        <hr>
        <br>
        <h5>Ne remplissez que la partie que vous voulez modifier</h5>
    </div>

    
    <div class="shadow-lg p-3 mb-5 ">
    <!-- Formulaire de modification de compte -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="formFileSm" class="form-label">Changer de photo de profile</label>
                <input class="form-control form-control-sm" name="avatar" type="file">
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">Changer votre nom :</label>
                    <input type="text" class="form-control" name="nom" placeholder="<?php echo $nom; ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label for="inputEmail4" class="form-label">Changer votre login :</label>
                    <input type="text" class="form-control"name="lg" placeholder="<?php echo $login; ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <label for="inputEmail4" class="form-label">Changer votre mot de passe :</label>
                    <input type="text" class="form-control" name="mdp1">
                </div>
                <div class="col-md-5">
                    <label for="inputPassword4" class="form-label">Confirmer votre mot de passe :</label>
                    <input type="password" class="form-control" name="mdp2">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <a href="../monCompte/?page=monCompteInfos" type="button" class="btn btn-danger">Annuler</a>
        <form>
    </div>
</div>

<?php


//importation du photo de profile : 
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
    $tailleMax = 2097152; //defnir la taille max du fichier 
    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['avatar']['size'] <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if(in_array($extensionUpload, $extensionsValides)) {

            $chemin = "../img/avatars/".$_SESSION['login'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
            if($resultat) {
            //si tous est bon :
                ajoutAvatar($login, $extensionUpload);//ajout du fichier dans la BDD
                echo "Votre photo de profile à bien été mise à jour";
            } else {
                echo "Erreur durant l'importation de votre photo de profil";
            }
        } else {
            echo "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
    } else {
        echo "Votre photo de profil ne doit pas dépasser 2Mo";
    }
}


//modification du nom
if(!empty($_POST["nom"])){
    $nouvNom = $_POST['nom'];
    
    // modifNom($login, $nouvNom);
    echo "Votre Nom à bien été modifier en ".$nouvNom;
    
}

//modification du login
if(!empty($_POST["lg"])){
    ?>
    <script>
        if (confirm("Voulez vous vraiment modifier votre Login, cela va vous déconnecter")) {
            // Code à éxécuter si le l'utilisateur clique sur "OK"
            <?php
            if($nouvLogin != null){
                modifLogin($login, $nouvLogin);
                // echo "Votre Login à bien été modifer en ".$nouvLogin;
                header('Location:../deconnexion.php');
            }
            ?>
        } else {
            // Code à éxécuter si l'utilisateur clique sur "Annuler" 
            document.location.href="../monCompte/?page=monCompteInfos";
        }
    </script>
    <?php
}
?>












