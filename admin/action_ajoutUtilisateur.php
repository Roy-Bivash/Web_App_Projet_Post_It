<?php
include '../bdd/ctnBDD.php';
include '../bdd/admin_ctnBDD.php';

if(!empty($_POST["nom"]) && !empty($_POST["login"]) && !empty($_POST["mdp1"]) && !empty($_POST["mdp2"])){
    $nouvNom = $_POST["nom"];
    $nouvLogin = $_POST["login"];
    $nouvMdp1 = $_POST["mdp1"];
    $nouvMdp2 = $_POST["mdp2"];
    if($nouvMdp1 != $nouvMdp2){
        echo "<p class=text-center>Les mots de passe saisie ne sont pas identique</p>";
    }else{
        ajoutUtilisateur($nouvNom, $nouvLogin, $nouvMdp1);
        echo $nouvNom.$nouvLogin.$nouvMdp1.$nouvMdp2;
        ?>
        <script>
            document.location.href='../monCompte/?page=admin';//redirection vers la page admin
        </script>

        <?php
    }
}else{
    echo "<p class=text-center>Remplissez tous les partie </p>";
}


?>
