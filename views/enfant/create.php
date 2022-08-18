<div class="container">

    <div class="title h2 text-center">Ajout d'un enfant</div>

    <form method="post" action="/enfant/store" class="create-form-enfant">
        <div class="containerForm">
            <div class="input-group m-1">
                <span class="input-group-text" id="nom">Nom</span>
                <input type="text" class="form-control" name="nom" aria-label="nom" aria-describedby="nom" id="nom">
            </div>
            <div class="input-group m-1">
                <span class="input-group-text" id="prenom">Prénom</span>
                <input type="text" class="form-control" name="prenom" aria-label="prenom" aria-describedby="prenom"
                       id="prenom">
            </div>
            <div class="input-group m-1">
                <label class="input-group-text" for="ecole">Ecole</label>
                <select class="form-select" id="ecole" name="ecole_id">
                    <?php foreach ($ecoles as $ecole) : ?>
                        <option value="<?= $ecole->pk ?>"> <?php echo($ecole->nom); ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-group m-1">
                <label class="input-group-text" for="titulaire">Titulaire</label>
                <select class="form-select" id="titulaire" name="titulaire_id">
                    <?php foreach ($titulaires as $titulaire) : ?>
                        <option value="<?= $titulaire->pk ?>"> <?php echo($titulaire->nom); ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input class="linkButton btn btn-warning m-1" type="submit" value="Ajouter cet enfant" name="addKid"
                   onclick="return confirm('Êtes vous sûr(e) ?')">
        </div>
    </form>
</div>