<div class="container">

    <div class="title h2 text-center">Ajout d'une ecole</div>

    <form method="post" action="/ecole/store" class="create-form-ecole">
        <div class="containerForm">
            <div class="input-group m-1">
                <span class="input-group-text" id="nom">Nom</span>
                <input type="text" class="form-control" name="nom" aria-label="nom" aria-describedby="nom" id="nom">
            </div>
            <div class="input-group m-1">
                <span class="input-group-text" id="adresse">Adresse</span>
                <input type="text" class="form-control" name="adresse" aria-label="adresse" aria-describedby="adresse" id="adresse">
            </div>
            <input class="linkButton btn btn-success m-1" type="submit" value="Ajouter cette école" name="addecole" onclick="return confirm('Êtes vous sûr(e) ?')">

        </div>
    </form>
</div>