<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <!-- Personnal CSS -->
        <link rel="stylesheet" href="css/pageConnexion.css">
        <title>EGS Connexion</title>
    </head>
    <body>
    <!-- Formulaire -->
    <div class="contenue">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                <div class="shadow p-3 mb-5 bg-body rounded">
                    <br>
                    <h3>CONNEXION</h3>
                    <br>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Login</label>
                            <input name="login" class="form-control" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mot de passe</label>
                            <input name="mdp" type="password" class="form-control" autocomplete="off">
                        <a style="color:black;" href="http://" target="_blank">Mot de passe oublier ?</a>
                        </div>
                        <button type="submit" class="btn btn-outline-dark">Se connecter</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
<?php
include ('bdd/cnxBDD.php');
if(isset($_POST["login"]) && isset($_POST["mdp"])){
    //requette mySQL :
    $rqt = $cnx->prepare("select nom from utilisateur where lg = ? and mdp = ?");
    $rqt-> bindValue(1,$_POST["login"]);
    $rqt-> bindValue(2,$_POST["mdp"]);
    $rqt->execute();

    if(count($rqt->fetchAll()) == 0)
    {
        echo "Identifiants incorrects";
    }
    else
    {
        session_start();
        $_SESSION["login"] = $_POST["login"];
        $_SESSION["connexion"] = true;
        header('Location:monCompte');
    }
}
?>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>
</html>