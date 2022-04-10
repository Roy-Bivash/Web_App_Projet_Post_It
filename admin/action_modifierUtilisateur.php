<?php
include '../bdd/ctnBDD.php';
include '../bdd/admin_ctnBDD.php';
session_start();
//recuperation de l'utilisateur selectionner :
$utilisateurSelectionner = $_SESSION['utilisateurSelectionner'];

//modification du nom :
if(!empty($_POST['nom'])){
    $nouvNom = $_POST['nom'];
    modifierNom($nouvNom, $utilisateurSelectionner);
}


//modification du login :
if(!empty($_POST['login'])){
    $nouvLogin = $_POST['login'];
    modifierLogin($nouvLogin, $utilisateurSelectionner);
    echo $utilisateurSelectionner;
}


//modification du statut :
if(isset($_POST['statutSelectionner'])){
    $statutSlectionner = $_POST['statutSelectionner'];
    $typeUtilisateur = $_SESSION['typeUtilisateur'];
    //si il ya un chanhement de statut :
    if($statutSlectionner != $typeUtilisateur){
        modifierStatut($statutSlectionner, $utilisateurSelectionner);
    }
}

$_SESSION['utilisateurSelectionner'] = null;
$_SESSION['typeUtilisateur'] = null;
?>
<script>
    document.location.href='../monCompte/?page=admin';//redirection vers la page admin
</script>