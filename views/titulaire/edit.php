<div class="container">

    <div class="title">Modifier les informations du titulaire</div>

    <form method="post" action="/titulaire/update/<?= $titulaire->pk ?>" class="create-form-enfant">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= $titulaire->nom ?>">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= $titulaire->prenom ?>">
        <label for="ecole">Ecole :</label>
        <select name="ecole_id" id="ecole">
            <?php foreach ($ecoles as $ecole) :
                if($ecole->pk == $titulaire->ecole_id->pk) { ?>
                    <option selected value="<?= $ecole->pk ?>"> <?php echo ($ecole->nom); ?> </option>
                <?php }else { ?>
                    <option value="<?= $ecole->pk ?>"> <?php echo ($ecole->nom); ?> </option>
                <?php } endforeach; ?>
        </select>

        <input type="hidden" name="id" id="id" value="<?= $titulaire->pk ?>">
        <input class="linkButton" type="submit" value="modifier" name="addKid" onclick="return confirm('Êtes vous sûr(e) ?')">
    </form>
    <p>
        <a href="/titulaire/index">annuler</a>
    </p>




</div>