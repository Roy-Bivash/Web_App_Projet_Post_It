<?php
//Pas besoin de session_start() car cette page serra inclu dans index.php qui elle a deja une session
$login = $_SESSION["login"];

$nom = getnom($login)['nom'];//chercher le nom dans la colonne nom

$nbPostItPrive = countPostItPrive($login)['COUNT(numPostIt)'];

$cheminAvatar = getAvatar($login)['avatar'];
if($cheminAvatar == null){
    $cheminAvatar = "../img/default_profile.png";
}

?>
<br><br>

<div class="container">
    <h1 class="text-center">Votre compte</h1>
    <br><br><br>
    <div class="row">
        <div class="col-md-6" style="background-color:">
            <img src="<?php echo $cheminAvatar; ?>" class="mx-auto d-block" id="imgProfile" alt="...">
            
            <br><br>

            <h4 style="text-transform:uppercase;" class="text-center"><?php echo $nom; ?></h4>
            <p class="text-center">Votre Login : <?php echo $login; ?> <br>Votre mot de passe : **********</p>
            <br>

            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="../monCompte/?page=modifierLeProfile" class="btn btn-secondary" type="button">Modifier le Profile</a>
            </div>
        
        </div>
        <div class="col-md-6">
            <br><br>
            <h6>Vous avez <?php echo $nbPostItPrive; ?> Post-It privé</h6>
        </div>
    </div>
</div>



