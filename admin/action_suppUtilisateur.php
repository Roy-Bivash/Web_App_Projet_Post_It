<?php
include '../bdd/ctnBDD.php';
include '../bdd/admin_ctnBDD.php';


if(isset($_POST["utilisateurSelectionner"])){
    $utilisateurSelectionner = $_POST["utilisateurSelectionner"];
    // echo $utilisateurSelectionner;
    if($utilisateurSelectionner == "Selectionner"){
        echo "<h5 class=text-center>Veuillez selectionner un utilisateur</h5>";
        
    }else{
        supprimerUtilisateur($utilisateurSelectionner);
        ?>
        <script>
            document.location.href='../monCompte/?page=admin';//redirection vers la page admin
        </script>
        <?php
    }
}


?>


