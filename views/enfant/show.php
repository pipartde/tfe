<div class="container">

    <div class="title h2 text-center">Présentation de : <?= $enfant->prenom . " " . $enfant->nom ?></div>
    <?php if (empty($enfant)): ?>
        <p>Il n'y a rien à afficher.</p>
    <?php else: ?>
        <table class="table">
            <thead>
            <tr class="input-box">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Titulaire</th>
                <th>Ecole</th>
                <th colspan="3">Actions</th>
            </tr>
            </thead>
            <tr class="input-box">
                <td><?= $enfant->nom; ?></td>
                <td><?= $enfant->prenom ?></td>
                <td><?= $enfant->titulaire_id->nom . " " . $enfant->titulaire_id->prenom ?></td>
                <td><?= $enfant->ecole_id->nom ?></td>
                <td>
                    <a class="linkButton inputButton"
                       href="/enfant/edit/<?= htmlspecialchars($enfant->__get('pk')); ?>">
                        <svg class="svgbtn" height="401pt" viewBox="0 -1 401.52289 401" width="401pt"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="m370.589844 250.972656c-5.523438 0-10 4.476563-10 10v88.789063c-.019532 16.5625-13.4375 29.984375-30 30h-280.589844c-16.5625-.015625-29.980469-13.4375-30-30v-260.589844c.019531-16.558594 13.4375-29.980469 30-30h88.789062c5.523438 0 10-4.476563 10-10 0-5.519531-4.476562-10-10-10h-88.789062c-27.601562.03125-49.96875 22.398437-50 50v260.59375c.03125 27.601563 22.398438 49.96875 50 50h280.589844c27.601562-.03125 49.96875-22.398437 50-50v-88.792969c0-5.523437-4.476563-10-10-10zm0 0"/>
                            <path d="m376.628906 13.441406c-17.574218-17.574218-46.066406-17.574218-63.640625 0l-178.40625 178.40625c-1.222656 1.222656-2.105469 2.738282-2.566406 4.402344l-23.460937 84.699219c-.964844 3.472656.015624 7.191406 2.5625 9.742187 2.550781 2.546875 6.269531 3.527344 9.742187 2.566406l84.699219-23.464843c1.664062-.460938 3.179687-1.34375 4.402344-2.566407l178.402343-178.410156c17.546875-17.585937 17.546875-46.054687 0-63.640625zm-220.257812 184.90625 146.011718-146.015625 47.089844 47.089844-146.015625 146.015625zm-9.40625 18.875 37.621094 37.625-52.039063 14.417969zm227.257812-142.546875-10.605468 10.605469-47.09375-47.09375 10.609374-10.605469c9.761719-9.761719 25.589844-9.761719 35.351563 0l11.738281 11.734375c9.746094 9.773438 9.746094 25.589844 0 35.359375zm0 0"/>
                        </svg>
                    </a>
                </td>
                <td>
                    <form method="post" action="/enfant/delete" class="delete-form-immeuble">
                        <input type="hidden" name="pk" value="<?= htmlspecialchars($enfant->pk); ?>">
                        <input class="linkButton btn btn-danger" type="submit" value="Supprimer l'enfant" name="deleteKid"
                               onclick="return confirm('Êtes vous sûr(e) ?')">
                    </form>
                </td>
            </tr>
        </table>

        <?php if ($enfant->planning_id->pk != NULL): ?>


            <div class="containerParent">
                <div class="card child">
                    <div class="card-header">
                        Disponibilité du Lundi :
                    </div>
                    <div class="card-body">
                        <p>Première heure : <?php if ($lundi[0] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
                        <p>Deuxième heure : <?php if ($lundi[1] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
                        <p>Troisième heure : <?php if ($lundi[2] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
                        <p>Quatrième heure
                            : <?php if ($lundi[3] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
                        <p>Cinquième heure
                            : <?php if ($lundi[4] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
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
                        <p>Quatrième heure
                            : <?php if ($mardi[3] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
                        <p>Cinquième heure
                            : <?php if ($mardi[4] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
                        <p>Sixième heure : <?php if ($mardi[5] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
                    </div>
                </div>
                <div class="card child">
                    <div class="card-header">
                        Disponibilité du Mercredi :
                    </div>
                    <div class="card-body">
                        <p>Première heure
                            : <?php if ($mercredi[0] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
                        <p>Deuxième heure
                            : <?php if ($mercredi[1] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
                        <p>Troisième heure
                            : <?php if ($mercredi[2] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
                        <p>Quatrième heure
                            : <?php if ($mercredi[3] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
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
                        <p>Quatrième heure
                            : <?php if ($jeudi[3] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
                        <p>Cinquième heure
                            : <?php if ($jeudi[4] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
                        <p>Sixième heure : <?php if ($jeudi[5] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
                    </div>
                </div>
                <div class="card child">
                    <div class="card-header">
                        Disponibilité du Vendredi :
                    </div>
                    <div class="card-body">
                        <p>Première heure
                            : <?php if ($vendredi[0] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
                        <p>Deuxième heure
                            : <?php if ($vendredi[1] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
                        <p>Troisième heure
                            : <?php if ($vendredi[2] === "true"): ?>Oui<?php else: ?>Non<?php endif; ?></p>
                        <p>Quatrième heure
                            : <?php if ($vendredi[3] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
                        <p>Cinquième heure
                            : <?php if ($vendredi[4] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
                        <p>Sixième heure
                            : <?php if ($vendredi[5] === "true"): ?>Oui<?php else: ?> Non <?php endif; ?></p>
                    </div>
                </div>
            </div>
            <div class="containerAction">
                <div class="card margin: 10px; text-center child">
                    <div class="card-header">
                        Action :
                    </div>
                    <div class="card-body flew-row">
                        <a class="btn btn-warning" href="/planning/edit/<?= $enfant->planning_id->pk ?>">Modifier le
                            planning</a><br>

                    </div>
                </div>
            </div>


        <?php else: ?>
            <h5>Cet enfant n'a pas de Planning</h5>
            <a class="btn btn-success" href="/planning/createPlanning/<?= $enfant->pk ?>">Lui en créer un</a>
        <?php endif; endif; ?>


</div>
