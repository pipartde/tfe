<div class="container">

    <div class="title text-center h2">Modifier les informations : <?= $enfant->nom . " " . $enfant->prenom ?></div>

    <form method="post" action="/enfant/update/<?= $enfant->pk ?>" class="create-form-enfant mb-3">
        <div class="containerForm">
            <div class="input-group m-1">
                <span class="input-group-text" id="nom">Nom</span>
                <input type="text" class="form-control" name="nom" aria-label="nom" aria-describedby="nom" id="nom"
                       value="<?= $enfant->nom ?>">
            </div>
            <div class="input-group m-1">
                <span class="input-group-text" id="prenom">Prénom</span>
                <input type="text" class="form-control" name="prenom" aria-label="prenom" aria-describedby="prenom"
                       id="prenom" value="<?= $enfant->prenom ?>">
            </div>
            <div class="input-group m-1">
                <label class="input-group-text" for="ecole">Ecole</label>
                <select class="form-select" id="ecole" name="ecole_id">
                    <?php foreach ($ecoles as $ecole) :
                        if ($ecole->pk == $enfant->ecole_id->pk) { ?>
                            <option selected value="<?= $ecole->pk ?>"> <?php echo($ecole->nom); ?> </option>
                        <?php } else { ?>
                            <option value="<?= $ecole->pk ?>"> <?php echo($ecole->nom); ?> </option>
                        <?php } endforeach; ?>
                </select>
            </div>
            <div class="input-group m-1">
                <label class="input-group-text" for="titulaire">Titulaire</label>
                <select class="form-select" id="titulaire" name="titulaire_id">
                    <?php foreach ($titulaires as $titulaire) :
                        if ($titulaire->pk == $enfant->titulaire_id->pk) { ?>
                            <option selected value="<?= $titulaire->pk ?>"> <?=$titulaire->nom." ".$titulaire->prenom ?> </option>
                        <?php } else { ?>
                            <option value="<?= $titulaire->pk ?>"> <?=$titulaire->nom." ".$titulaire->prenom ?> </option>
                        <?php } endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="id" id="id" value="<?= $enfant->pk ?>">
            <input class="linkButton btn btn-warning m-1" type="submit" value="Modifier" name="updateKid"
                   onclick="return confirm('Êtes vous sûr(e) ?')">
            <a class="btn btn-info m-1" href="/enfant/index">Annuler</a>
        </div>
    </form>

</div>