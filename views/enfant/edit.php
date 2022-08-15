<div class="container">

    <div class="title">Modifier les informations de l'enfant</div>

    <form method="post" action="/enfant/update/<?= $enfant->pk ?>" class="create-form-enfant">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= $enfant->nom ?>">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= $enfant->prenom ?>">
        <label for="ecole">Ecole :</label>
        <select name="ecole_id" id="ecole">
            <?php foreach ($ecoles as $ecole) :
                if($ecole->pk == $enfant->ecole_id->pk) { ?>
                    <option selected value="<?= $ecole->pk ?>"> <?php echo ($ecole->nom); ?> </option>
                <?php }else { ?>
                    <option value="<?= $ecole->pk ?>"> <?php echo ($ecole->nom); ?> </option>
                <?php } endforeach; ?>
        </select>


        <label for="titulaire">Titulaire :</label>
        <select name="titulaire_id" id="titulaire">
            <?php foreach ($titulaires as $titulaire) :
                if($titulaire->pk == $enfant->titulaire_id->pk) { ?>
                    <option selected value="<?= $titulaire->pk ?>"> <?php echo ($titulaire->nom); ?> </option>
                <?php }else { ?>
                    <option value="<?= $titulaire->pk ?>"> <?php echo ($titulaire->nom); ?> </option>
                <?php } endforeach; ?>
        </select>
        <input type="hidden" name="id" id="id" value="<?= $enfant->pk ?>">
        <input class="linkButton" type="submit" value="modifier" name="addKid" onclick="return confirm('Êtes vous sûr(e) ?')">
    </form>
    <p>
        <a href="/enfant/index">annuler</a>
    </p>




</div>