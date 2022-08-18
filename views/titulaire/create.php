<div class="container">

    <div class="title h2 text-center">Ajout d'un titulaire</div>

    <form method="post" action="/titulaire/store" class="create-form-titulaire">
        <div class="containerForm">
            <div class="input-group m-1">
                <span class="input-group-text" id="nom">Nom</span>
                <input type="text" class="form-control" name="nom" aria-label="nom" aria-describedby="nom" id="nom">
            </div>
            <div class="input-group m-1">
                <span class="input-group-text" id="prenom">Prénom</span>
                <input type="text" class="form-control" name="prenom" aria-label="prenom" aria-describedby="prenom" id="prenom">
            </div>
            <div class="input-group m-1">
                <label class="input-group-text" for="ecole">Ecole</label>
                <select class="form-select" id="ecole" name="ecole_id">
                    <?php foreach ($ecoles as $ecole) : ?>
                        <option value="<?= $ecole->pk ?>"> <?php echo ($ecole->nom); ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>



        <input class="linkButton btn btn-success m-1" type="submit" value="Enregistrer ce titulaire" name="addtitulaire" onclick="return confirm('Êtes vous sûr(e) ?')">
        </div>
    </form>



</div>