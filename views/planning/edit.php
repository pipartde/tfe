<div class="title h2 text-center">Modification du planning pour l'enfant : <?= $enfant->prenom . " " . $enfant->nom ?></div>
<form method="post" action="/planning/update/<?= $enfant->planning_id->pk ?>">
    <div class="containerParent">

        <div class="card child">
            <div class="card-header">
                Disponibilité du Lundi :
            </div>
            <div class="card-body">
                <p>Première heure : </p>
                <div>
                    <input type="radio" id="l1yes" name="l1" value="true"
                           <?php if ($lundi[0] === "true") : ?>checked <?php endif; ?>>
                    <label for="l1yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="l1no" name="l1" value="false"
                           <?php if ($lundi[0] === "false") : ?>checked <?php endif; ?>>
                    <label for="l1no">Non</label>
                </div>
                <p>Deuxième heure : </p>
                <div>
                    <input type="radio" id="l2yes" name="l2" value="true"
                           <?php if ($lundi[1] === "true") : ?>checked <?php endif; ?>>
                    <label for="l2yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="l2no" name="l2" value="false"
                           <?php if ($lundi[1] === "false") : ?>checked <?php endif; ?>>
                    <label for="l2no">Non</label>
                </div>
                <p>Troisième heure : </p>
                <div>
                    <input type="radio" id="l3yes" name="l3" value="true"
                           <?php if ($lundi[2] === "true") : ?>checked <?php endif; ?>>
                    <label for="l3yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="l3no" name="l3" value="false"
                           <?php if ($lundi[2] === "false") : ?>checked <?php endif; ?>>
                    <label for="l3no">Non</label>
                </div>
                <p>Quatrième heure : </p>
                <div>
                    <input type="radio" id="l4yes" name="l4" value="true"
                           <?php if ($lundi[3] === "true") : ?>checked <?php endif; ?>>
                    <label for="l4yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="l4no" name="l4" value="false"
                           <?php if ($lundi[3] === "false") : ?>checked <?php endif; ?>>
                    <label for="l4no">Non</label>
                </div>
                <p>Cinquième heure : </p>
                <div>
                    <input type="radio" id="l5yes" name="l5" value="true"
                           <?php if ($lundi[4] === "true") : ?>checked <?php endif; ?>>
                    <label for="l5yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="l5no" name="l5" value="false"
                           <?php if ($lundi[4] === "false") : ?>checked <?php endif; ?>>
                    <label for="l5no">Non</label>
                </div>
                <p>Sixième heure : </p>
                <div>
                    <input type="radio" id="l6yes" name="l6" value="true"
                           <?php if ($lundi[5] === "true") : ?>checked <?php endif; ?>>
                    <label for="l6yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="l6no" name="l6" value="false"
                           <?php if ($lundi[5] === "false") : ?>checked <?php endif; ?>>
                    <label for="l6no">Non</label>
                </div>
            </div>
        </div>
        <div class="card child">
            <div class="card-header">
                Disponibilité du Mardi :
            </div>
            <div class="card-body">
                <p>Première heure : </p>
                <div>
                    <input type="radio" id="ma1yes" name="ma1" value="true"
                           <?php if ($mardi[0] === "true") : ?>checked <?php endif; ?>>
                    <label for="ma1yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="ma1no" name="ma1" value="false"
                           <?php if ($mardi[0] === "false") : ?>checked <?php endif; ?>>
                    <label for="ma1no">Non</label>
                </div>
                <p>Deuxième heure : </p>
                <div>
                    <input type="radio" id="ma2yes" name="ma2" value="true"
                           <?php if ($mardi[1] === "true") : ?>checked <?php endif; ?>>
                    <label for="ma2yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="ma2no" name="ma2" value="false"
                           <?php if ($mardi[1] === "false") : ?>checked <?php endif; ?>>
                    <label for="ma2no">Non</label>
                </div>
                <p>Troisième heure : </p>
                <div>
                    <input type="radio" id="ma3yes" name="ma3" value="true"
                           <?php if ($mardi[2] === "true") : ?>checked <?php endif; ?>>
                    <label for="ma3yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="ma3no" name="ma3" value="false"
                           <?php if ($mardi[2] === "false") : ?>checked <?php endif; ?>>
                    <label for="ma3no">Non</label>
                </div>
                <p>Quatrième heure : </p>
                <div>
                    <input type="radio" id="ma4yes" name="ma4" value="true"
                           <?php if ($mardi[3] === "true") : ?>checked <?php endif; ?>>
                    <label for="ma4yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="ma4no" name="ma4" value="false"
                           <?php if ($mardi[3] === "false") : ?>checked <?php endif; ?>>
                    <label for="ma4no">Non</label>
                </div>
                <p>Cinquième heure : </p>
                <div>
                    <input type="radio" id="ma5yes" name="ma5" value="true"
                           <?php if ($mardi[4] === "true") : ?>checked <?php endif; ?>>
                    <label for="ma5yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="ma5no" name="ma5" value="false"
                           <?php if ($mardi[4] === "false") : ?>checked <?php endif; ?>>
                    <label for="ma5no">Non</label>
                </div>
                <p>Sixième heure : </p>
                <div>
                    <input type="radio" id="ma6yes" name="ma6" value="true"
                           <?php if ($mardi[5] === "true") : ?>checked <?php endif; ?>>
                    <label for="ma6yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="ma6no" name="ma6" value="false"
                           <?php if ($mardi[5] === "false") : ?>checked <?php endif; ?>>
                    <label for="ma6no">Non</label>
                </div>
            </div>
        </div>
        <div class="card child">
            <div class="card-header">
                Disponibilité du Mercredi :
            </div>
            <div class="card-body">
                <p>Première heure : </p>
                <div>
                    <input type="radio" id="me1yes" name="me1" value="true"
                           <?php if ($mercredi[0] === "true") : ?>checked <?php endif; ?>>
                    <label for="me1yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="me1no" name="me1" value="false"
                           <?php if ($mercredi[0] === "false") : ?>checked <?php endif; ?>>
                    <label for="me1no">Non</label>
                </div>
                <p>Deuxième heure : </p>
                <div>
                    <input type="radio" id="me2yes" name="me2" value="true"
                           <?php if ($mercredi[1] === "true") : ?>checked <?php endif; ?>>
                    <label for="me2yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="me2no" name="me2" value="false"
                           <?php if ($mercredi[1] === "false") : ?>checked <?php endif; ?>>
                    <label for="me2no">Non</label>
                </div>
                <p>Troisième heure : </p>
                <div>
                    <input type="radio" id="m3yes" name="me3" value="true"
                           <?php if ($mercredi[2] === "true") : ?>checked <?php endif; ?>>
                    <label for="me3yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="me3no" name="me3" value="false"
                           <?php if ($mercredi[2] === "false") : ?>checked <?php endif; ?>>
                    <label for="me3no">Non</label>
                </div>
                <p>Quatrième heure : </p>
                <div>
                    <input type="radio" id="me4yes" name="me4" value="true"
                           <?php if ($mercredi[3] === "true") : ?>checked <?php endif; ?>>
                    <label for="me4yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="me4no" name="me4" value="false"
                           <?php if ($mercredi[3] === "false") : ?>checked <?php endif; ?>>
                    <label for="me4no">Non</label>
                </div>
            </div>
        </div>
        <div class="card child">
            <div class="card-header">
                Disponibilité du Jeudi :
            </div>
            <div class="card-body">
                <p>Première heure : </p>
                <div>
                    <input type="radio" id="j1yes" name="j1" value="true"
                           <?php if ($jeudi[0] === "true") : ?>checked <?php endif; ?>>
                    <label for="j1yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="j1no" name="j1" value="false"
                           <?php if ($jeudi[0] === "false") : ?>checked <?php endif; ?>>
                    <label for="j1no">Non</label>
                </div>
                <p>Deuxième heure : </p>
                <div>
                    <input type="radio" id="j2yes" name="j2" value="true"
                           <?php if ($jeudi[1] === "true") : ?>checked <?php endif; ?>>
                    <label for="j2yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="j2no" name="j2" value="false"
                           <?php if ($jeudi[1] === "false") : ?>checked <?php endif; ?>>
                    <label for="j2no">Non</label>
                </div>
                <p>Troisième heure : </p>
                <div>
                    <input type="radio" id="j3yes" name="j3" value="true"
                           <?php if ($jeudi[2] === "true") : ?>checked <?php endif; ?>>
                    <label for="j3yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="j3no" name="j3" value="false"
                           <?php if ($jeudi[2] === "false") : ?>checked <?php endif; ?>>
                    <label for="j3no">Non</label>
                </div>
                <p>Quatrième heure : </p>
                <div>
                    <input type="radio" id="j4yes" name="j4" value="true"
                           <?php if ($jeudi[3] === "true") : ?>checked <?php endif; ?>>
                    <label for="j4yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="j4no" name="j4" value="false"
                           <?php if ($jeudi[3] === "false") : ?>checked <?php endif; ?>>
                    <label for="j4no">Non</label>
                </div>
                <p>Cinquième heure : </p>
                <div>
                    <input type="radio" id="j5yes" name="j5" value="true"
                           <?php if ($jeudi[4] === "true") : ?>checked <?php endif; ?>>
                    <label for="j5yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="j5no" name="j5" value="false"
                           <?php if ($jeudi[4] === "false") : ?>checked <?php endif; ?>>
                    <label for="j5no">Non</label>
                </div>
                <p>Sixième heure : </p>
                <div>
                    <input type="radio" id="j6yes" name="j6" value="true"
                           <?php if ($jeudi[5] === "true") : ?>checked <?php endif; ?>>
                    <label for="j6yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="j6no" name="j6" value="false"
                           <?php if ($jeudi[5] === "false") : ?>checked <?php endif; ?>>
                    <label for="j6no">Non</label>
                </div>
            </div>
        </div>
        <div class="card child">
            <div class="card-header">
                Disponibilité du Vendredi :
            </div>
            <div class="card-body">
                <p>Première heure : </p>
                <div>
                    <input type="radio" id="v1yes" name="v1" value="true"
                           <?php if ($vendredi[0] === "true") : ?>checked <?php endif; ?>>
                    <label for="v1yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="v1no" name="v1" value="false"
                           <?php if ($vendredi[0] === "false") : ?>checked <?php endif; ?>>
                    <label for="v1no">Non</label>
                </div>
                <p>Deuxième heure : </p>
                <div>
                    <input type="radio" id="v2yes" name="v2" value="true"
                           <?php if ($vendredi[1] === "true") : ?>checked <?php endif; ?>>
                    <label for="v2yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="v2no" name="v2" value="false"
                           <?php if ($vendredi[1] === "false") : ?>checked <?php endif; ?>>
                    <label for="v2no">Non</label>
                </div>
                <p>Troisième heure : </p>
                <div>
                    <input type="radio" id="v3yes" name="v3" value="true"
                           <?php if ($vendredi[2] === "true") : ?>checked <?php endif; ?>>
                    <label for="v3yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="v3no" name="v3" value="false"
                           <?php if ($vendredi[2] === "false") : ?>checked <?php endif; ?>>
                    <label for="v3no">Non</label>
                </div>
                <p>Quatrième heure : </p>
                <div>
                    <input type="radio" id="v4yes" name="v4" value="true"
                           <?php if ($vendredi[3] === "true") : ?>checked <?php endif; ?>>
                    <label for="v4yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="v4no" name="v4" value="false"
                           <?php if ($vendredi[3] === "false") : ?>checked <?php endif; ?>>
                    <label for="v4no">Non</label>
                </div>
                <p>Cinquième heure : </p>
                <div>
                    <input type="radio" id="v5yes" name="v5" value="true"
                           <?php if ($vendredi[4] === "true") : ?>checked <?php endif; ?>>
                    <label for="v5yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="v5no" name="v5" value="false"
                           <?php if ($vendredi[4] === "false") : ?>checked <?php endif; ?>>
                    <label for="v5no">Non</label>
                </div>
                <p>Sixième heure : </p>
                <div>
                    <input type="radio" id="v6yes" name="v6" value="true"
                           <?php if ($vendredi[5] === "true") : ?>checked <?php endif; ?>>
                    <label for="v6yes">Oui</label>
                </div>
                <div>
                    <input type="radio" id="v6no" name="v6" value="false"
                           <?php if ($vendredi[5] === "false") : ?>checked <?php endif; ?>>
                    <label for="v6no">Non</label>
                </div>
            </div>
        </div>
    </div>

    <div class="containerMessage">
        <div class="card text-center childMessage">
            <div class="card-header">
                Action :
            </div>
            <div class="card-body">
                <p>
                    <input type="hidden" id="enfant_id" name="enfant_id" value="<?= $enfant->pk ?>">
                    <input class="linkButton btn btn-success" type="submit" value="Valider la modification"
                           name="addplanning"
                           onclick="return confirm('Êtes vous sûr(e) ?')">
                </p>
                <p>
                    <a href="/enfant/show/<?= $enfant->pk ?>" class="btn btn-info">Annuler</a>
                </p>
            </div>
        </div>
    </div>

</form>


