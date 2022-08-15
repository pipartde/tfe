<div class="container">

    <div class="title">Modifier les informations d'une école</div>

    <form method="post" action="/ecole/update/<?= $ecole->pk ?>" class="create-form-ecole">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= $ecole->nom ?>">
        <label for="adresse">adresse :</label>
        <input type="text" name="adresse" id="adresse" value="<?= $ecole->adresse ?>">

        <input type="hidden" name="id" id="id" value="<?= $ecole->pk ?>">
        <input class="linkButton" type="submit" value="modifier" name="updateecole" onclick="return confirm('Êtes vous sûr(e) ?')">
    </form>
    <p>
        <a href="/ecole/index">annuler</a>
    </p>




</div>