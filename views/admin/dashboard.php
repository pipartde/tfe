<a href="/aidepeda/logout">logout</a>


<p>
    <a href="/enfant/index">listing des enfants suivit</a> - <a href="/enfant/create">ajouter un enfant</a>
</p>
<p>
    <a href="/titulaire/index">listing des titulaires</a> - <a href="/titulaire/create">ajouter un titulaire</a>
</p>
<p>
    <a href="/ecole/index">listing des écoles</a> - <a href="/ecole/create">ajouter une école</a>
</p>

<p>
    <a href="/semainier/generateSemainier">Générer une liste de proposition de semainier</a> -
    <?php if ($aidepeda->semainier_id) : ?>
    <a href="/semainier/show/<?= $aidepeda->semainier_id ?>">Voir le semainier enregistré</a>

    <?php if ($semainier[0]->planningUpdated) : ?>
<p>
    Attention, le planning d'un des enfants a été modifié depuis la génération du Semainier. <br>
    Il se peut donc que le Semainier ne soit plus à jour...
</p>
<?php endif;
endif; ?>

</p>