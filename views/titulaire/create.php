<div class="container">

    <div class="title">Ajout d'un titulaire</div>

    <form method="post" action="/titulaire/store" class="create-form-titulaire">
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


        <input class="linkButton" type="submit" value="ajouter" name="addtitulaire" onclick="return confirm('Êtes vous sûr(e) ?')">
    </form>

    <p>
        <a href="/titulaire/index">annuler</a>
    </p>

</div>