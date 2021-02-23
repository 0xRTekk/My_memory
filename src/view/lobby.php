<?php

$title = "Lobby";

ob_start();?>

<!-- Modale de connexion -->
<div class="modal-wrapper" id="nickname-modal">
    <div class="container modal-container">
        <div class="modal-header">
            <h5 class="modal-title">Salut à toi joueur !</h5>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control" id="input-nickname" placeholder="Quel est ton pseudo ?">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="nickname-modal-submit">Valider</button>
        </div>
    </div>
</div>
<!-- Fin Modale de connexion -->

<!-- Lobby : listing des meillerus temps -->
<div class="lobby-wrapper">
    <div class="main-container">
        <article class="general-best-game-times" style="border:1px solid black;">
            <h2>Les meilleurs temps de tous les temps !</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Joueur</th>
                        <th scope="col">Temps</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($game_list as $game) { ?>
                        <tr>
                            <th scope="row"><?=$game['id'];?></td>
                            <td><?=$game['nickname'];?></td>
                            <td><?=$game['time_played'];?></td>
                            <td><?=$game['start_date'];?></td>
                        </tr>
                    <?php } ?>              
                </tbody>
            </table>
        </article>

        <aside class="user-best-game-times" style="border:1px solid red;">
            <h2>Tes meilleurs temps (de tous les temps)</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Temps</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rempli en JS -->
                </tbody>
            </table>
        </aside>
    </div>
    <div class="second-container">
        <a class="btn btn-primary btn-lg" id="start-game-submit" href="/my_memory/index.php?action=start_game" role="button">JOUER</a>
    </div>
</div>
<!-- Lobby : listing des meillerus temps -->

<?php $content = ob_get_clean();
require_once('include/header.php');
// require_once(__DIR__.'/include/footer.php');
?>