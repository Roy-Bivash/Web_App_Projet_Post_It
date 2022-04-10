<?php
//Pas besoin de session_start() car cette page serra inclu dans index.php qui elle a deja une session
$login = $_SESSION["login"];

$nom = getnom($login)['nom'];//chercher le nom dans la colonne nom
?>
<br>

<div class="container">
    <div class="titre">
        <h4>écrire un post-it privée</h>
        <hr>
    </div>
    <!-- Formulaire -->
    <form action="" method="post">
        <!-- Selection de la gravité -->
        <h6 class="fw-normal">Selectionner le niveau de gravité : </h6>
        <select name="gravite" class="form-select form-select-sm" style="width:250px">
        <?php
        // recuperer les differents niveau de gravite 
        $lesGravites = getLesGravite();
        foreach($lesGravites as $gr){
            $gravite = $gr["niveau"];
            echo "<option>".$gravite."</option>";
        }
        ?>
        </select>
        <br>
        <!-- Remplissage du message -->
        <div class="form-floating">
            <textarea name="msg" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px"></textarea>
            <label for="floatingTextarea2">Commentaire</label>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<?php


if(isset($_POST['msg']) && isset($_POST['gravite'])){
    $gravite = $_POST['gravite'];
    $message = $_POST['msg'];
    ajoutPostItPrive($login, $message, $gravite);
    ?>
    <script>
        alert('Votre Post-it a été enregistrer !!');
        document.location.href="../monCompte/?page=acceuil_mesPostIt";
    </script>
    <?php
}


?>