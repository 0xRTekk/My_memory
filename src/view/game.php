<?php

$title = "Game";

ob_start();?>

<!-- Lobby : listing des meillerus temps -->
<div class="game-wrapper">
    <h2>A toi de jouer !</h2>
    <div class="main-container">
        <!-- Plateau de jeu -->
        <?php foreach($deck_cards as $card) {;?>
            <div class="cards hidden-card">
                <img src="/my_memory/public/img/<?= $card->id();?>.png" data-id="<?= $card->id();?>" alt="<?= $card->description();?>">
            </div>
        <?php
        }
        ?>
    </div>
    <div class="second-container">
        <!-- Timer --> 
    </div>
</div>
<!-- Lobby : listing des meillerus temps -->

<?php $content = ob_get_clean();
require_once('include/header.php');
// require_once(__DIR__.'/include/footer.php');
?>