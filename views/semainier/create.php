<?php
//var_dump(count($listingSemainier));
foreach ($listingSemainier as $semainier): ?>

    <div class="containerParent">

        <fieldset class="child">
            <legend>Planning du lundi :</legend>
            <p>Première heure : <?= $semainier['L12'][0] ?></p>
            <p>Deuxième heure : <?= $semainier['L12'][0] ?></p>
            <p>Troisième heure : <?= $semainier['L34'][0] ?></p>
            <p>Quatrième heure : <?= $semainier['L34'][0] ?></p>
            <p>Cinquième heure : <?= $semainier['L56'][0] ?></p>
            <p>Sixième heure : <?= $semainier['L56'][0] ?></p>
        </fieldset>
        <fieldset class="child">
            <legend>Planning du mardi :</legend>
            <p>Première heure : <?= $semainier['MA12'][0] ?></p>
            <p>Deuxième heure : <?= $semainier['MA12'][0] ?></p>
            <p>Troisième heure : <?= $semainier['MA34'][0] ?></p>
            <p>Quatrième heure : <?= $semainier['MA34'][0] ?></p>
            <p>Cinquième heure : <?= $semainier['MA56'][0] ?></p>
            <p>Sixième heure : <?= $semainier['MA56'][0] ?></p>
        </fieldset>
        <fieldset class="child">
            <legend>Planning du mercredi :</legend>
            <p>Première heure : <?= $semainier['ME12'][0] ?></p>
            <p>Deuxième heure : <?= $semainier['ME12'][0] ?></p>
            <p>Troisième heure : <?= $semainier['ME34'][0] ?></p>
            <p>Quatrième heure : <?= $semainier['ME34'][0] ?></p>
        </fieldset>
        <fieldset class="child">
            <legend>Planning du jeudi :</legend>
            <p>Première heure : <?= $semainier['J12'][0] ?></p>
            <p>Deuxième heure : <?= $semainier['J12'][0] ?></p>
            <p>Troisième heure : <?= $semainier['J34'][0] ?></p>
            <p>Quatrième heure : <?= $semainier['J34'][0] ?></p>
            <p>Cinquième heure : <?= $semainier['J56'][0] ?></p>
            <p>Sixième heure : <?= $semainier['J56'][0] ?></p>
        </fieldset>
        <fieldset class="child">
            <legend>Planning du vendredi :</legend>
            <p>Première heure : <?= $semainier['V12'][0] ?></p>
            <p>Deuxième heure : <?= $semainier['V12'][0] ?></p>
            <p>Troisième heure : <?= $semainier['V34'][0] ?></p>
            <p>Quatrième heure : <?= $semainier['V34'][0] ?></p>
            <p>Cinquième heure : <?= $semainier['V56'][0] ?></p>
            <p>Sixième heure : <?= $semainier['V56'][0] ?></p>
        </fieldset>
        <fieldset>
            <legend>Actions</legend>
            <form method="post" action="/semainier/store">
                <input type="hidden" name="L12" value="<?= $semainier['L12'][0] ?>">
                <input type="hidden" name="L34" value="<?= $semainier['L34'][0] ?>">
                <input type="hidden" name="L56" value="<?= $semainier['L56'][0] ?>">
                <input type="hidden" name="MA12" value="<?= $semainier['MA12'][0] ?>">
                <input type="hidden" name="MA34" value="<?= $semainier['MA34'][0] ?>">
                <input type="hidden" name="ME12" value="<?= $semainier['MA56'][0] ?>">
                <input type="hidden" name="ME34" value="<?= $semainier['ME12'][0] ?>">
                <input type="hidden" name="MA56" value="<?= $semainier['ME34'][0] ?>">
                <input type="hidden" name="J12" value="<?= $semainier['J12'][0] ?>">
                <input type="hidden" name="J34" value="<?= $semainier['J34'][0] ?>">
                <input type="hidden" name="J56" value="<?= $semainier['J56'][0] ?>">
                <input type="hidden" name="V12" value="<?= $semainier['V12'][0] ?>">
                <input type="hidden" name="V34" value="<?= $semainier['V34'][0] ?>">
                <input type="hidden" name="V56" value="<?= $semainier['V56'][0] ?>">
                <input type="submit" value="Choisir ce semainier ?" onclick="return confirm('Êtes vous sûr(e) ?  Au risque de supprimer l\'ancien semainier ? ')">
            </form>
        </fieldset>
    </div>
<?php
endforeach;
?>
