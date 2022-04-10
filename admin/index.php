<?php
//inclure la page contenant les fonctions pour la section admin
include '../bdd/admin_ctnBDD.php';

//Pas besoin de session_start() car cette page serra inclu dans index.php qui elle a deja une session
$login = $_SESSION["login"];

$nom = getnom($login)['nom'];//chercher le nom dans la colonne nom
$autorisation = getAutorisation($login)['admin'];//vherche la valeur contenue dans la colonne admin
// var_dump($autorisation);

if($autorisation != 0){
    //si c'est l'amdinistrateur :
    ?>
    <br>
    <div class="titre">
        <h1 class="fw-lighter">Bonjour <?php echo $nom; ?> </h1>
        <hr>
        <h4 class="fw-normal">Bienvenue dans votre espace admin</h4>
    </div>
    <?php
    //inclure la page contenant tous les propriété
    include 'contenue_admin.php';

    echo '<br><br>';

    //action sur la page :
    if(!isset($_REQUEST['action_admin'])) {
        $action_admin = 'none';
    }
    else {
        $action_admin = $_REQUEST['action_admin'];
    }
    
    switch($action_admin){
        case 'none':
            // echo 'none';
            break;
        case 'ajoutUtilisateur':
            include '../vues_admin/ajoutUtilisateur.php';
            break;
        case 'suppUtilisateur':
            include '../vues_admin/suppUtilisateur.php';
            break;
        case 'modifierUtilisateur':
            include '../vues_admin/modifierUtilisateur.php';
            break;
        case 'reinitialiserMdp':
            include '../vues_admin/reinitialiserMdp.php';
            break;
        case 'suppPostitPrive':
            include '../vues_admin/suppPostitPrive.php';
            break;
        case 'suppPostitCommun':
            include '../vues_admin/suppPostitCommun.php';
            break;
        case 'sauvegarde':
            ?>
            <script>
                document.location.href="../admin/action_sauvegarde.php";
            </script>
            <?php
            // header('Location:../admin/action_sauvegarde.php');
            break;
    }


}else{
    //si ce n'est pas l'amdinistrateur :
    ?>
    <br>
    <div class="titre">
        <h1 class="fw-lighter">Bonjour <?php echo $nom; ?> </h1>
        <hr>
        <br><br><br>
        <h4 class="fw-normal">Vous n'avez pas les doits administrateur</h4>
        <p>Contacter l'adminisatrateur du site pour recevoir les droits</p>
    </div>
    <?php
}




?>
<br><br>