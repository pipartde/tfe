<div class="container">

    <div class="title h2 text-center">Modifier les informations du titulaire</div>

    <form method="post" action="/titulaire/update/<?= $titulaire->pk ?>" class="create-form-enfant">
        <div class="containerForm">
            <div class="input-group m-1">
                <span class="input-group-text" id="nom">Nom</span>
                <input type="text" class="form-control" name="nom" aria-label="nom" aria-describedby="nom" id="nom"
                       value="<?= $titulaire->nom ?>">
            </div>
            <div class="input-group m-1">
                <span class="input-group-text" id="prenom">Prénom</span>
                <input type="text" class="form-control" name="prenom" aria-label="prenom" aria-describedby="prenom" id="prenom"
                       value="<?= $titulaire->prenom ?>">
            </div>
            <div class="input-group m-1">
                <label class="input-group-text" for="ecole">Ecole</label>
                <select class="form-select" id="ecole" name="ecole_id">
                    <?php foreach ($ecoles as $ecole) :
                        if($ecole->pk == $titulaire->ecole_id->pk) { ?>
                            <option selected value="<?= $ecole->pk ?>"> <?php echo ($ecole->nom); ?> </option>
                        <?php }else { ?>
                            <option value="<?= $ecole->pk ?>"> <?php echo ($ecole->nom); ?> </option>
                        <?php } endforeach; ?>
                </select>
            </div>

        <input type="hidden" name="id" id="id" value="<?= $titulaire->pk ?>">
        <input class="linkButton btn btn-warning m-1" type="submit" value="Modifier ce titulaire" name="addKid" onclick="return confirm('Êtes vous sûr(e) ?')">
        </div>
    </form>




</div>