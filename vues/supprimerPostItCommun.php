<br>
<div class="container">

<div class="titre">
        <h4>supprimer un post-it commun</h4>
        <hr>
    </div>



<br>
<div class="row justify-content-center">
    <div class="col-md-5">
        <form action="" method="POST">
            <h6 class="fw-lighter">Choisir le numero du Post-it publique à modifier : </h6><br>
            <select name="numPostItSelectionner" style="width:60%" class="form-select" aria-label="Default select example">
            <option selected>Sélectionner</option>
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

</div>



<?php
if(isset($_POST['numPostItSelectionner'])){
    $numSelectionner = $_POST['numPostItSelectionner'];
    if($numSelectionner == "Sélectionner"){
        echo '<p style=text-align:center;color:red;>Veuillez selectionner le numero du Post-it à modifier</p>';
    }else{
        supPostItCommun($numSelectionner);
        ?>
        <script>
            alert('Le post-it à été suprrimer');
            document.location.href="../monCompte/";
        </script>
        <?php
    }
}
?>




