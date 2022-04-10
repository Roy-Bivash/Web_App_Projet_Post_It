<div class="container">
    <div class="shadow-none p-3 mb-5 bg-light rounded">
        <h4 class="fw-lighter text-center">Ajout d'un nouvelle utilisateur</h4>
        <br>
        <form action="../admin/action_ajoutUtilisateur.php" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input name="nom" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Login</label>
                        <input name="login" type="text" class="form-control">
                    </div>
                </div>
            
            </div><!--Fermeture du row -->

            <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <input name="mdp1" type="password" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirmer le mot de passe</label>
                <input name="mdp2" type="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="../monCompte/?page=admin&action_admin=none" type="button" class="btn btn-danger">Annuler</a>
        </form>
    </div><!-- Fermeture du shadow -->
</div><!-- Fermeture du container -->