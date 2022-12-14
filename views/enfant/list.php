
    <div class="container">

        <div class="title h2 text-center">Liste des enfants</div>
        <?php if (empty($enfants)): ?>
            <p>Il n'y a rien à afficher.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                <tr class="input-box">
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Ecole</th>
                    <th>Titulaire</th>
                    <th colspan="2">Actions</th>
                </tr>
                </thead>
                <?php foreach ($enfants as $enfant): ?>
                    <tr class="input-box">
                        <td><?= $enfant->nom; ?></td>
                        <td><?= $enfant->prenom; ?></td>
                        <td><?= $enfant->ecole_id->nom; ?></td>
                        <td><?= $enfant->titulaire_id->nom; ?></td>
                        <td>
                            <a class="linkButton inputButton btn" href="/enfant/show/<?= htmlspecialchars($enfant->__get('pk')); ?>"><img src="/ressources/img/view.png" alt="oeil" class="svgbtn"></a>
                            <a class="linkButton inputButton btn" href="/enfant/edit/<?= htmlspecialchars($enfant->__get('pk')); ?>"><svg class="svgbtn" height="401pt" viewBox="0 -1 401.52289 401" width="401pt" xmlns="http://www.w3.org/2000/svg"><path d="m370.589844 250.972656c-5.523438 0-10 4.476563-10 10v88.789063c-.019532 16.5625-13.4375 29.984375-30 30h-280.589844c-16.5625-.015625-29.980469-13.4375-30-30v-260.589844c.019531-16.558594 13.4375-29.980469 30-30h88.789062c5.523438 0 10-4.476563 10-10 0-5.519531-4.476562-10-10-10h-88.789062c-27.601562.03125-49.96875 22.398437-50 50v260.59375c.03125 27.601563 22.398438 49.96875 50 50h280.589844c27.601562-.03125 49.96875-22.398437 50-50v-88.792969c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m376.628906 13.441406c-17.574218-17.574218-46.066406-17.574218-63.640625 0l-178.40625 178.40625c-1.222656 1.222656-2.105469 2.738282-2.566406 4.402344l-23.460937 84.699219c-.964844 3.472656.015624 7.191406 2.5625 9.742187 2.550781 2.546875 6.269531 3.527344 9.742187 2.566406l84.699219-23.464843c1.664062-.460938 3.179687-1.34375 4.402344-2.566407l178.402343-178.410156c17.546875-17.585937 17.546875-46.054687 0-63.640625zm-220.257812 184.90625 146.011718-146.015625 47.089844 47.089844-146.015625 146.015625zm-9.40625 18.875 37.621094 37.625-52.039063 14.417969zm227.257812-142.546875-10.605468 10.605469-47.09375-47.09375 10.609374-10.605469c9.761719-9.761719 25.589844-9.761719 35.351563 0l11.738281 11.734375c9.746094 9.773438 9.746094 25.589844 0 35.359375zm0 0"/></svg></a>
                        </td>
                        <td>
                            <form method="post" action="/enfant/delete" class="delete-form-immeuble">
                                <input type="hidden" name="pk" value="<?= htmlspecialchars($enfant->pk); ?>">
                                <input class="linkButton btn btn-danger" type="submit" value="Supprimer" name="deleteKid" onclick="return confirm('Êtes vous sûr(e) ?')">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
