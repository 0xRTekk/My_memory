<?php

$title = "Game";
$user_id = $_SESSION['user_id'];
$user_nickname = $_SESSION['nickname'];

ob_start();?>

<div class="game-wrapper">
    <div id="timer"></div>
    <div class="main-container" id="game-board" data-id-user="<?=$user_id?>">
        <!-- Plateau de jeu -->
        <?php foreach($deck_cards as $card) {;?>
            <div class="cards hidden-card">
                <img src="/my_memory/public/img/<?= $card->id();?>.png" data-id="<?= $card->id();?>" alt="<?= $card->description();?>">
            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php $content = ob_get_clean();
require_once('include/page.php');
?>