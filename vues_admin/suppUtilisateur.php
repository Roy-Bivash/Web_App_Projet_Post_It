<br>
<div class="container">
    <form action="../admin/action_suppUtilisateur.php" method="post">
        <select name="utilisateurSelectionner" class="form-select" aria-label="Default select example">
            <option selected>Selectionner</option>
            <?php
            foreach($infosUtilisateurs as $lesInfos){
                $leNom = $lesInfos['nom'];
                $leLogin = $lesInfos['lg'];
                echo "<option value=".$leLogin.">Nom : ".$leNom." - Login : ".$leLogin."</option>";
            }
            ?>
        </select>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div><!-- Fermeture du contiainer -->