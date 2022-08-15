<div class="container">

    <div class="title">Ajout d'un enfant</div>

    <form method="post" action="/enfant/store" class="create-form-enfant">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom">
        <label for="ecole">Ecole :</label>
        <select name="ecole_id" id="ecole">
            <?php foreach ($ecoles as $ecole) : ?>
                <option value="<?= $ecole->pk ?>"> <?php echo ($ecole->nom); ?> </option>
            <?php endforeach; ?>
        </select>
        <label for="titulaire">Titulaire :</label>
        <select name="titulaire_id" id="titulaire">
            <?php foreach ($titulaires as $titulaire) : ?>
                <option value="<?= $titulaire->pk ?>"> <?php echo ($titulaire->nom); ?> </option>
            <?php endforeach; ?>
        </select>

        <input class="linkButton" type="submit" value="ajouter" name="addKid" onclick="return confirm('Êtes vous sûr(e) ?')">
    </form>





</div>