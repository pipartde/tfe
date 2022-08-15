<div class="container">

    <div class="title">Ajout d'une ecole</div>

    <form method="post" action="/ecole/store" class="create-form-ecole">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" id="adresse">


        <input class="linkButton" type="submit" value="ajouter" name="addecole" onclick="return confirm('Êtes vous sûr(e) ?')">
    </form>

    <p>
        <a href="/ecole/index">annuler</a>
    </p>

</div>