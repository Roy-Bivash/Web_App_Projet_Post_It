<?php
// Contenue de la base de données pour admin :
//Pas besoin de redefinir les constants de connexion au BDD



//verifie si l'utilisateur est admin:
function getAutorisation($login)
{
	$retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="SELECT admin FROM utilisateur WHERE lg = '$login';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}

//fonction pour recuperer les infos de tous les utilisateurs
function getInfosUtilisateur()
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="SELECT nom, lg, admin FROM utilisateur;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}


//Compter les post-it commun
function getNbPostItCommun()
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="SELECT numPostIt FROM postit;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
//Compter les post-it privee
function getNbPostItPrive()
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="SELECT numPostIt FROM postitprive;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}


//Ajouter un utilisateur
function ajoutUtilisateur($nouvNom, $nouvLogin, $nouvMdp1){
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="INSERT INTO `utilisateur` (`idUser`, `nom`, `lg`, `mdp`, `avatar`, `admin`) VALUES (NULL, '$nouvNom', '$nouvLogin', '$nouvMdp1', '', '0');";
    $resultat = $bdd->query($requete);
}

//Suprimer un utilisateur
function supprimerUtilisateur($utilisateurSelectionner){
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="DELETE FROM `utilisateur` WHERE `lg` = '$utilisateurSelectionner';";
    $resultat = $bdd->query($requete);
}

//fonction pour recuperer les infos d'un utilisateur
function getInfosUtilisateurSelectionner($utilisateurSelectionner)
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="SELECT nom, lg FROM utilisateur where lg = '$utilisateurSelectionner';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}


//Modification du nom utilisateur
function modifierNom($nouvNom, $utilisateurSelectionner){
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="UPDATE `utilisateur` SET `nom` = '$nouvNom' WHERE lg = '$utilisateurSelectionner';";
    $resultat = $bdd->query($requete);
}


//Modification du login utilisateur
function modifierLogin($nouvLogin, $utilisateurSelectionner){
    $id = idUser($utilisateurSelectionner)['idUser'];//Utilisation de la fonction definie dans cntBDD.php
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="UPDATE `utilisateur` SET `lg` = '$nouvLogin' WHERE idUser = '$id';";
    $resultat = $bdd->query($requete);
}

//Modification du statut utilisateur
function modifierStatut($statutSlectionner, $utilisateurSelectionner){
    $id = idUser($utilisateurSelectionner)['idUser'];//Utilisation de la fonction definie dans cntBDD.php
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="UPDATE `utilisateur` SET `admin` = '$statutSlectionner' WHERE idUser = '$id';";
    $resultat = $bdd->query($requete);
}

//reinitialiser le mdp utilisateur
function reinitialiserMdp($utilisateurSelectionner){
    $id = idUser($utilisateurSelectionner)['idUser'];//Utilisation de la fonction definie dans cntBDD.php
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="UPDATE `utilisateur` SET `mdp` = ' ' WHERE idUser = '$id';";
    $resultat = $bdd->query($requete);
}

//Supprimer tous les postIt Commun et mettre réinitialiser les valeurs d'auto-incrément,
function suppTousPostItCommun(){
    $id = idUser($utilisateurSelectionner)['idUser'];//Utilisation de la fonction definie dans cntBDD.php
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="TRUNCATE TABLE `postit`;";
    $resultat = $bdd->query($requete);
}

//Supprimer tous les postIt Privee et mettre réinitialiser les valeurs d'auto-incrément,
function suppTousPostItPrive(){
    $id = idUser($utilisateurSelectionner)['idUser'];//Utilisation de la fonction definie dans cntBDD.php
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="TRUNCATE TABLE `postitprive`;";
    $resultat = $bdd->query($requete);
}



?>