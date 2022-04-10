<?php
//Pas besoin de session_start() car cette page serra inclu dans index.php qui elle a deja une session
$login = $_SESSION["login"];

$nom = getnom($login)['nom'];//chercher le nom dans la colonne nom
?>
<br>

<div class="container">
<!-- Partie titre -->
    <div class="titre">
        <h4>Modifier un post-it commun</h4>
        <hr>
    </div>

    <div class="row">
        <!-- Partie selection du post-it à modifier -->
        <div class="col-sm-3">
            <form action="" method="POST">
                <h6 class="fw-lighter">Choisir le numero du Post-it publique à modifier : </h6>
                <select name="numPostItSelectionner" class="form-select form-select-sm" style="width:50%" aria-label=".form-select-sm example">
                    <option>Sélectionner</option>
                    <?php
                        $lesPostIts = getPostItCommun();
                        foreach($lesPostIts as $postIt){
                            $numPostIt = $postIt['numPostIt'];
                            echo '<option>'.$numPostIt.'</option>';
                        }
                    ?>
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
        <!-- Partie modification du post-it selectionner -->
        <div class="col-sm-6 ms-auto">
        <br><br>
            <?php
                if(isset($_POST["numPostItSelectionner"])){
                    $numSelectionner = $_POST['numPostItSelectionner'];
                    // echo $numSelectionner;
                    if($numSelectionner == "Sélectionner"){
                        echo '<p style=text-align:center;color:red;>Veuillez selectionner le numero du Post-it à modifier</p>';
                    }
                    //Si tous un numero de post-it à bien été selectionner alors :
                    else{
                        // recuperer les infos du post-it selectionner 
                        $lesInfosPostIt = getPostItAModifierPublic($numSelectionner);
                        // var_dump($lesInfosPostIt);
                        $num = $lesInfosPostIt['numPostIt'];
                        $date = $lesInfosPostIt['date'];
                        $gravite = $lesInfosPostIt['gravite'];
                        $message = $lesInfosPostIt['message'];

                        $_SESSION["numSelectionner"] = $num;//Cette varible de session n'est utiliser que pour la mmodification
                        $_SESSION["graviteSelectionner"] = $gravite;//Cette varible de session n'est utiliser que pour la mmodification
                        ?>
                        <div class="shadow-none p-3 mb-5 bg-light">
                            <p>
                                Post-it numero : <strong><?php echo $num; ?></strong>
                                <br>
                                Niveau de gravité du Post-It : <strong><?php echo $gravite; ?></strong>
                            </p>
                            <form action="" method="POST">
                                <p>Changer la gravité : </p>
                                <select name="nouvDegre" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <?php
                                    // recuperer les differents niveau de gravite 
                                    $lesGravites = getLesGravite();
                                    foreach($lesGravites as $gr){
                                        $gravite = $gr["niveau"];
                                        echo "<option>".$gravite."</option>";
                                    }
                                    ?>
                                </select>
                                <p>Modifier le message : </p>
                                <div class="form-floating">
                                    <textarea name="nouvMessage" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px"><?php echo $message; ?></textarea>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Changer</button>
                            </form>
                        </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</div>


<?php

if(isset($_POST['nouvDegre']) && isset($_POST['nouvMessage'])){
    $nouvDegre = $_POST['nouvDegre'];
    $nouvMessage = $_POST['nouvMessage'];
    $nouvNum = $_SESSION["numSelectionner"];

    modifPostItCommun($nouvDegre, $nouvMessage, $login, $nouvNum);
    $_SESSION["graviteSelectionner"] = null;
    $_SESSION["numSelectionner"] = null;
    
    ?>
    <script>
        alert ('Votre Post-it à été modifier');
        document.location.href="../monCompte/";
    </script>
    <?php
}

?>