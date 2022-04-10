<?php
include '../bdd/ctnBDD.php';
include '../bdd/admin_ctnBDD.php';
// Supprimer tous les postIt Privee et mettre réinitialiser les valeurs d'auto-incrément,
suppTousPostItPrive();
header('location:../monCompte/?page=admin');


?>