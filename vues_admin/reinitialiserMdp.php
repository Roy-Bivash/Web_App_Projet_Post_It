<div class="container">
    <div class="shadow-none p-3 mb-5 bg-light rounded">
    <h4 class="fw-lighter text-center">Selectionner un utilisateur pour reinitialiser sont mdp</h4>
        <br>
        <form action="" method="post">
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
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
        <br><br>
        
        <?php
        if(isset($_POST['utilisateurSelectionner'])){
            $utilisateurSelectionner = $_POST["utilisateurSelectionner"];
            // echo $utilisateurSelectionner;
            if($utilisateurSelectionner == "Selectionner"){
                echo "<h5 class=text-center>Veuillez selectionner un utilisateur</h5>";
            }else{
                reinitialiserMdp($utilisateurSelectionner);
                // header('location:../monCompte/?page=admin');
                ?>
                <script>
                    alert('Le mot de passe à bien été reinitialiser, il vous suffit de vous connecter sans mot de passe puis de changer votre mot de passe depuis votre espace compte');
                    document.location.href='../monCompte/?page=admin';//redirection vers la page admin
                </script>
                <?php
            }
        }
        ?>




    </div>
</div>