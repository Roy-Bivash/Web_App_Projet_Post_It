<?php
session_start();
error_reporting(0);
//verification de connexion
$connexion = $_SESSION["connexion"];
//si connexion = false
if(!$connexion){
    header('Location:../deconnexion.php');
}
if(!isset($_GET['page'])) {
    $page = 'acceuil_postItCommun';
}
else {
$page = $_REQUEST['page'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Personnal CSS -->
    <link rel="stylesheet" href="../css/acceuil.css">
    <title>Document</title>

</head>
<body>
<?php
    //Requette pour bdd :
    include ('../bdd/ctnBDD.php');
    //navbar : 
    include ('../vues/nav.html');
    
    //Affichage :
    switch($page){
        case 'acceuil_postItCommun':
            //Page Post-it commun :
            include '../vues/acceuil_postItCommun.php';
            break;
        case 'acceuil_mesPostIt':
            //Page Post-it Privé :
            include '../vues/acceuil_postItPrive.php';
            break;
        case 'admin':
            //Section Admin :
            include '../admin/index.php';
            // header('Location:../admin');
            break;
        case 'monCompteInfos':
            include '../vues/acceuil_monCompte.php';
            break;
        case 'nouveauPostItCommnun':
            //Page creation de Post-it commun:
            include '../vues/nouveauPostItCommnun.php';
            break;
        case 'modificationPostItCommun':
            //Page modification de Post-it commun:
            include '../vues/modificationPostItCommun.php';
            break;
        case 'supprimerPostItCommun':
            //Page supression de Post-it commun:
            include '../vues/supprimerPostItCommun.php';
            break;
        case 'nouveauPostItPrivee':
            //Page creation de Post-it commun:
            include '../vues/nouveauPostItPrivee.php';
            break;
        case 'modificationPostItPrivee':
            //Page modification de Post-it commun:
            include '../vues/modificationPostItPrivee.php';
            break;
        case 'supprimerPostItprivee':
            //Page supression de Post-it commun:
            include '../vues/supprimerPostItPrivee.php';
            break;
        case 'modifierLeProfile':
            //Page modification du profile:
            include '../vues/modifierLeProfile.php';
            break;
    }

?>





















    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Js Perso -->
    <script src="../js/script.js"></script>
</body>
</html>