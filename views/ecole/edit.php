<div class="container">

    <div class="title h2 text-center">Modifier les informations d'une école</div>

    <form method="post" action="/ecole/update/<?= $ecole->pk ?>" class="create-form-ecole">
        <div class="containerForm">
            <div class="input-group m-1">
                <span class="input-group-text" id="nom">Nom</span>
                <input type="text" class="form-control" name="nom" aria-label="nom" aria-describedby="nom" id="nom"
                       value="<?= $ecole->nom ?>">
            </div>
            <div class="input-group m-1">
                <span class="input-group-text" id="adresse">Adresse</span>
                <input type="text" class="form-control" name="adresse" aria-label="adresse"
                       aria-describedby="adresse" id="adresse" value="<?= $ecole->adresse ?>">
            </div>

            <input type="hidden" name="id" id="id" value="<?= $ecole->pk ?>">
            <input class="linkButton btn btn-warning m-1" type="submit" value="modifier" name="updateecole"
                   onclick="return confirm('Êtes vous sûr(e) ?')">
        </div>

    </form>
</div>