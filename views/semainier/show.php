<?php
if ($semaine['lundi']) : ?>

<div class="containerParent">
    <div class="card child">
        <div class="card-header">
            Planning du Lundi :
        </div>
        <div class="card-body">
            <p>Première heure : <?php echo $semaine['lundi'][0]->prenom . " " . $semaine['lundi'][0]->nom ?></p>
            <p>Deuxième heure : <?php echo $semaine['lundi'][0]->prenom . " " . $semaine['lundi'][0]->nom ?></p>
            <p>Troisième heure : <?php echo $semaine['lundi'][1]->prenom . " " . $semaine['lundi'][1]->nom ?></p>
            <p>Quatrième heure : <?php echo $semaine['lundi'][1]->prenom . " " . $semaine['lundi'][1]->nom ?></p>
            <p>Cinquième heure : <?php echo $semaine['lundi'][2]->prenom . " " . $semaine['lundi'][2]->nom ?></p>
            <p>Sixième heure : <?php echo $semaine['lundi'][2]->prenom . " " . $semaine['lundi'][2]->nom ?></p>
        </div>
    </div>
    <div class="card child">
        <div class="card-header">
            Planning du Mardi :
        </div>
        <div class="card-body">
            <p>Première heure : <?php echo $semaine['mardi'][0]->prenom . " " . $semaine['mardi'][0]->nom ?></p>
            <p>Deuxième heure : <?php echo $semaine['mardi'][0]->prenom . " " . $semaine['mardi'][0]->nom ?></p>
            <p>Troisième heure : <?php echo $semaine['mardi'][1]->prenom . " " . $semaine['mardi'][1]->nom ?></p>
            <p>Quatrième heure : <?php echo $semaine['mardi'][1]->prenom . " " . $semaine['mardi'][1]->nom ?></p>
            <p>Cinquième heure : <?php echo $semaine['mardi'][2]->prenom . " " . $semaine['mardi'][2]->nom ?></p>
            <p>Sixième heure : <?php echo $semaine['mardi'][2]->prenom . " " . $semaine['mardi'][2]->nom ?></p>
        </div>
    </div>
    <div class="card child">
        <div class="card-header">
            Planning du Mercredi :
        </div>
        <div class="card-body">
            <p>Première heure : <?php echo $semaine['mercredi'][0]->prenom . " " . $semaine['mercredi'][0]->nom ?></p>
            <p>Deuxième heure : <?php echo $semaine['mercredi'][0]->prenom . " " . $semaine['mercredi'][0]->nom ?></p>
            <p>Troisième heure : <?php echo $semaine['mercredi'][1]->prenom . " " . $semaine['mercredi'][1]->nom ?></p>
            <p>Quatrième heure : <?php echo $semaine['mercredi'][1]->prenom . " " . $semaine['mercredi'][1]->nom ?></p>
        </div>
    </div>
    <div class="card child">
        <div class="card-header">
            Planning du Jeudi :
        </div>
        <div class="card-body">
            <p>Première heure : <?php echo $semaine['jeudi'][0]->prenom . " " . $semaine['jeudi'][0]->nom ?></p>
            <p>Deuxième heure : <?php echo $semaine['jeudi'][0]->prenom . " " . $semaine['jeudi'][0]->nom ?></p>
            <p>Troisième heure : <?php echo $semaine['jeudi'][1]->prenom . " " . $semaine['jeudi'][1]->nom ?></p>
            <p>Quatrième heure : <?php echo $semaine['jeudi'][1]->prenom . " " . $semaine['jeudi'][1]->nom ?></p>
            <p>Cinquième heure : <?php echo $semaine['jeudi'][2]->prenom . " " . $semaine['jeudi'][2]->nom ?></p>
            <p>Sixième heure : <?php echo $semaine['jeudi'][2]->prenom . " " . $semaine['jeudi'][2]->nom ?></p>
        </div>
    </div>
    <div class="card child">
        <div class="card-header">
            Planning du Vendredi :
        </div>
        <div class="card-body">
            <p>Première heure : <?php echo $semaine['vendredi'][0]->prenom . " " . $semaine['vendredi'][0]->nom ?></p>
            <p>Deuxième heure : <?php echo $semaine['vendredi'][0]->prenom . " " . $semaine['vendredi'][0]->nom ?></p>
            <p>Troisième heure : <?php echo $semaine['vendredi'][1]->prenom . " " . $semaine['vendredi'][1]->nom ?></p>
            <p>Quatrième heure : <?php echo $semaine['vendredi'][1]->prenom . " " . $semaine['vendredi'][1]->nom ?></p>
            <p>Cinquième heure : <?php echo $semaine['vendredi'][2]->prenom . " " . $semaine['vendredi'][2]->nom ?></p>
            <p>Sixième heure : <?php echo $semaine['vendredi'][2]->prenom . " " . $semaine['vendredi'][2]->nom ?></p>
        </div>
    </div>
</div>
<div class="containerAction">
    <div class="card margin: 10px;">
        <div class="card-header">
            Action :
        </div>
        <div class="card-body">
            <form action="/semainier/delete/<?= $semainier->pk ?>" method="post">
                <input type="hidden" value="<?= $semainier->pk ?>">
                <input type="submit" value="supprimer ce semainier ?" class="btn btn-outline-danger" onclick="return confirm('Êtes vous sûr(e) ?')">
            </form>
        </div>
    </div>
</div>


<?php else : ?>
    <p>Il n'y a pas de Semainier à afficher</p>
    <p><a href="/semainier/generateSemainier">En créer un ?</a></p>
    <p><a href="/">Retour</a></p>
<?php endif; ?>
