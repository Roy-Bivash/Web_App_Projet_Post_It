<?php
session_start();
if (session_destroy()) {
    header("Location:index.php");
} else {
    echo 'Erreur : impossible de se déconnecter, veuillez fermer votre navigateur pour pouvoir vous déconnécter';
}
?>