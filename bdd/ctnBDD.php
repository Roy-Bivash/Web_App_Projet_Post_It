<?php
//definition des constante : define("[nom de constante], [valeur de la constante]")
define("BDD","egs");
define("USER_BDD","root");
define("PASSWORD_USER","");
define("SERVEUR","localhost");

//recuperer le nom :
function getNom($Login)
{
	$retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select nom from utilisateur where lg = '.mysqli_real_escape_string($Login).';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}

//recupere les post-it commun:
function getPostItCommun()
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select date, message, gravite, nom, numPostIt FROM postit INNER JOIN utilisateur ON postit.idRedacteur = utilisateur.idUser order by `numPostIt` DESC;;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}

//recupere les post-it Privee :
function getPostItPrivee($login)
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select date, message, gravite, nom, numPostIt FROM postitprive INNER JOIN utilisateur ON postitprive.idRedacteur = utilisateur.idUser WHERE lg = '$login' order by `numPostIt` DESC;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}

//recuperer les differents niveau de gravité :
function getLesGravite(){
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select niveau from gravite;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}


//touver l'IdUser (cette fonction est utiliser dans d'autres fonction)
function idUser($login){
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select idUser from utilisateur where lg = '$login'";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}


//Ajouter un post-it Commun :
function ajoutPostItCommun($login, $message, $gravite)
{
    $id = idUser($login); //utilisation de la fonction idUser() definit precedament
    $idUser = $id['idUser'];
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="INSERT INTO `postit` (`numPostIt`, `idRedacteur`, `date`, `message`, `gravite`) VALUES 
    (NULL, '.mysqli_real_escape_string($idUser).', CURRENT_TIME(), '.mysqli_real_escape_string($message).
    ', '.mysqli_real_escape_string($gravite).');";
    $resultat = $bdd->query($requete);
}

//Ajout post-it privé :
function ajoutPostItPrive($login, $message, $gravite)
{
    $id = idUser($login); //utilisation de la fonction idUser() definit precedament
    $idUser = $id['idUser'];
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="INSERT INTO `postitprive` (`numPostIt`, `idRedacteur`, `date`, `message`, `gravite`) VALUES (NULL, '$idUser', CURRENT_TIME(), '$message', '$gravite');";
    $resultat = $bdd->query($requete);
    
}

//prendre un post-it commun pour modification : 
function getPostItAModifierPublic($numSelectionner)
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select date, message, gravite, numPostIt FROM postit where numPostIt = '$numSelectionner';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}


//prendre un post-it prive pour modification : 
function getPostItAModifierPrive($numSelectionner)
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select date, message, gravite, numPostIt FROM postitprive where numPostIt = '$numSelectionner';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}

//modifier un post-it commun :
function modifPostItCommun($nouvDegre, $nouvMessage, $login, $nouvNum){
    $id = idUser($login); //utilisation de la fonction idUser() definit precedament
    $idUser = $id['idUser'];
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="UPDATE `postit` SET `idRedacteur` = '$idUser', `date` = CURRENT_TIME(), `message` = '$nouvMessage', `gravite` = '$nouvDegre' WHERE `postit`.`numPostIt` = '$nouvNum';";
    $resultat = $bdd->query($requete);
}

//modifier un post-it prive :
function modifPostItPrive($nouvDegre, $nouvMessage, $login, $nouvNum){
    $id = idUser($login); //utilisation de la fonction idUser() definit precedament
    $idUser = $id['idUser'];
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="UPDATE `postitprive` SET `idRedacteur` = '$idUser', `date` = CURRENT_TIME(), `message` = '$nouvMessage', `gravite` = '$nouvDegre' WHERE `postitprive`.`numPostIt` = '$nouvNum';";
    $resultat = $bdd->query($requete);
}


//Supprimer post-it commun :
function supPostItCommun($numSelectionner){
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete=" DELETE FROM `postit` WHERE `postit`.`numPostIt` = '$numSelectionner'";
    $resultat = $bdd->query($requete);
}


//Supprimer post-it prive :
function supPostItPrive($numSelectionner){
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="DELETE FROM `postitprive` WHERE `postitprive`.`numPostIt` ='$numSelectionner'";
    $resultat = $bdd->query($requete);
}


//Conter le nombre de post-it prive
function countPostItPrive($login){
    $id = idUser($login); //utilisation de la fonction idUser() definit precedament
    $idUser = $id['idUser'];
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="SELECT COUNT(numPostIt) FROM postitprive WHERE idredacteur = '$idUser'";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}

//recupere la photo de profile
function getAvatar($login){
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="select avatar from utilisateur where lg = '$login';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}


//mise a jour de l'emplacement de l'avatar
function ajoutAvatar($login, $extensionUpload)
{
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="UPDATE `utilisateur` SET `avatar` = '../img/avatars/$login.$extensionUpload' WHERE `utilisateur`.`lg` = '$login';";
    $resultat = $bdd->query($requete);
    
}


//mise a jour du nom 
function modifNom($login, $nouvNom)
{
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="UPDATE `utilisateur` SET `nom` = '$nouvNom' WHERE `utilisateur`.`lg` = '$login';";
    $resultat = $bdd->query($requete);
    
}


//mise a jour du login
function modifLogin($login, $nouvLogin)
{
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete="UPDATE `utilisateur` SET `lg` = '$nouvLogin' WHERE `utilisateur`.`lg` = '$login';";
    $resultat = $bdd->query($requete);
    
}



//mise a jour du mot de passe 




?>