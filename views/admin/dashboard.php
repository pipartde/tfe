<?php
$nbrEcole = count($ecole);
$nbrEnfant = count($enfant);
$nbrTitulaire = count($titulaire);
?>


    <div class="containerInfo">

        <div class="card childInfo">
            <div class="card-header">
                Enfants
            </div>
            <div class="card-body">
                <h5 class="card-title">Informations</h5>
                <p class="card-text">Il y a <?= $nbrEnfant ?> enfants enregistrés.</p>
                <a href="/enfant/index" class="btn btn-primary">Liste des enfants</a>
            </div>
        </div>
        <div class="card childInfo">
            <div class="card-header">
                Ecoles
            </div>
            <div class="card-body">
                <h5 class="card-title">Informations</h5>
                <p class="card-text">Il y a <?= $nbrEcole ?> écoles enregistrées.</p>
                <a href="/ecole/index" class="btn btn-primary">Liste des écoles</a>
            </div>
        </div>
        <div class="card childInfo">
            <div class="card-header">
                Titulaires
            </div>
            <div class="card-body">
                <h5 class="card-title">Informations</h5>
                <p class="card-text">Il y a <?= $nbrTitulaire ?> titulaires enregistrés.</p>
                <a href="/titulaire/index" class="btn btn-primary">Liste des titulaires</a>
            </div>
        </div>
    </div>
    <div class="containerMessage">
        <div class="card text-center childMessage">

            <div class="card-header <?php if ($semainier[0]->planningUpdated) : ?> bg-warning <?php endif; ?> ">
                Messages
            </div>
            <div class="card-body">
<?php if ($semainier[0]->planningUpdated) : ?>
                <h5 class="card-title">Semainier</h5>
                <p class="card-text">
                    Attention, le planning d'un des enfants a été modifié depuis la génération du Semainier.<br>
                    Il se peut donc que le Semainier ne soit plus à jour...</p>
                <a href="/semainier/show/<?= $semainier[0]->pk ?>" class="btn btn-primary">Voir le semainier</a>
                <a href="/semainier/generateSemainier" class="btn btn-primary">Générer un nouveau semainier</a>
<?php else : ?>
                <p class="card-text">Pas de message</p>
            </div>
        </div>
    </div>


<?php endif; ?>