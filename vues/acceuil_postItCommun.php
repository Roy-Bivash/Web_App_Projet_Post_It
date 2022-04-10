<?php
//Pas besoin de session_start() car cette page serra inclu dans index.php qui elle a deja une session
$login = $_SESSION["login"];

$nom = getnom($login)['nom'];//chercher le nom dans la colonne nom

?>
<br>
<div class="container">
    <div class="titre">
        <h1 class="fw-lighter">Bonjour <?php echo $nom; ?> </h1>
        <hr>
        <h4 class="fw-normal">POST-IT EN COMMUN</h4>
    </div>
    
    <div class="row">
        <div class="col-sm-4 btnPostIt">
            <div class="shadow p-3 mb-5 bg-body rounded">
                <a href="../monCompte/?page=nouveauPostItCommnun">Ecrire un nouveau Post-It</a>
            </div>
            <div class="shadow p-3 mb-5 bg-body rounded">
                <a href="../monCompte/?page=modificationPostItCommun">Modifier un Post-It</a>
            </div>
            <div class="shadow p-3 mb-5 bg-body rounded">
                <a href="../monCompte/?page=supprimerPostItCommun">Suprimer un Post-It</a>
            </div>
        </div>
        <?php
            $lesPostIts = getPostItCommun();
            foreach($lesPostIts as $postIt){
                $numPostIt = $postIt['numPostIt'];
                $date = $postIt['date'];
                $msg = $postIt['message'];
                $gravite = $postIt['gravite'];
                $nomRedacteur = $postIt['nom'];
                ?>
                <div class="col-md-4">
                    <div style="background-color:white" class="shadow p-3 mb-5 rounded">
                        <h6 class="gravite"><?php echo $gravite; ?></h6>
                        <p class="date"><?php echo $date; ?></p>
                        <div class="shadow-none p-3 mb-5 bg-light rounded">
                            <p class="msg"><?php echo $msg; ?></p>
                            <p class="nom">Ecrit par <u style="text-transform:uppercase"><?php echo $nomRedacteur; ?></u></p>
                        </div>
                        <p class="num">n° <?php echo $numPostIt; ?></p>                       
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>

