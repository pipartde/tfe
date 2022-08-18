<div class="title h2">Planning de l'enfant <?= $enfant->prenom . " " . $enfant->nom ?></div>

<div class="containerParent">

    <div class="card child">
        <div class="card-header">
            Disponibilité du Lundi :
        </div>
        <div class="card-body">
            <p>Première heure : <?php if ($lundi[0] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Deuxième heure : <?php if ($lundi[1] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Troisième heure : <?php if ($lundi[2] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Quatrième heure : <?php if ($lundi[3] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
            <p>Cinquième heure : <?php if ($lundi[4] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
            <p>Sixième heure : <?php if ($lundi[5] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
        </div>
    </div>
    <div class="card child">
        <div class="card-header">
            Disponibilité du Mardi :
        </div>
        <div class="card-body">
            <p>Première heure : <?php if ($mardi[0] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Deuxième heure : <?php if ($mardi[1] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Troisième heure : <?php if ($mardi[2] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Quatrième heure : <?php if ($mardi[3] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
            <p>Cinquième heure : <?php if ($mardi[4] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
            <p>Sixième heure : <?php if ($mardi[5] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
        </div>
    </div>
    <div class="card child">
        <div class="card-header">
            Disponibilité du Mercredi :
        </div>
        <div class="card-body">
            <p>Première heure : <?php if ($mercredi[0] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Deuxième heure : <?php if ($mercredi[1] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Troisième heure : <?php if ($mercredi[2] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Quatrième heure : <?php if ($mercredi[3] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
        </div>
    </div>
    <div class="card child">
        <div class="card-header">
            Disponibilité du Jeudi :
        </div>
        <div class="card-body">
            <p>Première heure : <?php if ($jeudi[0] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Deuxième heure : <?php if ($jeudi[1] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Troisième heure : <?php if ($jeudi[2] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Quatrième heure : <?php if ($jeudi[3] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
            <p>Cinquième heure : <?php if ($jeudi[4] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
            <p>Sixième heure : <?php if ($jeudi[5] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
        </div>
    </div>
    <div class="card child">
        <div class="card-header">
            Disponibilité du Vendredi :
        </div>
        <div class="card-body">
            <p>Première heure : <?php if ($vendredi[0] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Deuxième heure : <?php if ($vendredi[1] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Troisième heure : <?php if ($vendredi[2] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
            <p>Quatrième heure : <?php if ($vendredi[3] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
            <p>Cinquième heure : <?php if ($vendredi[4] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
            <p>Sixième heure : <?php if ($vendredi[5] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
        </div>
    </div>
</div>
