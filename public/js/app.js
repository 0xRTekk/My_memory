$(window).load(function() {
    // Init variables
    validated_cards = 0;
    flipped_cards = 0;
    nb_total_cards = 0;
    $.each($('.cards'), function() {
        nb_total_cards++;
    });

    // Permet la mise en avant de la modale de connexion
    $('.user-best-game-times').css('display', 'none');
    $('.lobby-wrapper').css('filter', 'blur(.5rem)');

    // Appel des fonctions
    modalSubmit();
    flipCard();
    timer();
});

// Traitement à l'envoi du formulaire de connexion
function modalSubmit() {
    $('#nickname-modal-submit').on('click', function(e) {
        e.preventDefault();
        let input_nickname = $('#input-nickname').val();
        //Req AJAX : permet l'appel d'un controller PHP
        // Traite les donnees retournees sans avoir a recharger la page
        // => traitement asynchrone
        $.ajax({
            type: "GET",
            url: "/my_memory/index.php",
            data: {
                action: 'connect',
                input_nickname: input_nickname
            },
            dataType:'JSON',
            success: function(response) {
                //Si user existe : affichage de ses temps de jeu
                if (response.games) {
                    $('.general-best-game-times').css('flex-basis', '90%');
                    $('.user-best-game-times').css('display', 'block');
                    let table_body = $('.user-best-game-times table tbody');
                    let output = "";
                    $.each(response.games, function() {
                        output += "<tr><td>"+this.start_date+"</td><td>"+this.time_played+"</td></tr>";
                        table_body.html(output);
                    })
                } else {
                    alert('Bienvevnue à toi '+response.nickname+' !');
                }
                $('#nickname-modal').css('display', 'none');
                $('.lobby-wrapper').css('filter', 'unset');
            }
        });
    })
}

// Retournement cartes
function flipCard() {
    let id_flipped_cards = [];
    $('.cards.hidden-card').on('click', function(e) {
        $(this).removeClass('hidden-card').addClass('visible-card');
        flipped_cards++;
        id_flipped_cards.push($(this).find('img').data('id'));
        if (flipped_cards == 2) {
            compareCards(id_flipped_cards);
            flipped_cards = 0;
            id_flipped_cards = [];
        }
    });
}

// Comparaison de 2 cartes
function compareCards(id_flipped_cards) {
    if (id_flipped_cards[0] != id_flipped_cards[1]) {
        setTimeout(function() {
            $.each($('.visible-card'), function() {
                $(this).removeClass('visible-card').addClass('hidden-card');
            });
        }, 300);
    } else {
        $.each($('.visible-card'), function() {
            $(this).removeClass('visible-card').addClass('validated-card');
            $(this).off('click');
            validated_cards++;
            checkValidatedCards();
        });
    }
}

// Check si toutes cartes sont trouvees
function checkValidatedCards() {
    if (validated_cards == nb_total_cards) {
        let total_time = 5;
        let time_left = parseFloat($('#timer').text().replace(/:\s*/g, "."));
        let time = total_time - time_left;
        let win = 1;
        postGameScore(time, win);
    }
}

// Traitement quand timer à 0
function timeIsRunningOut() {
    alert('Argh... Il semblerait que tu n\'ai pas réussi cette partie :( )');
    let time = parseFloat($('#timer').text().replace(/:\s*/g, "."));
    let win = 0;
    postGameScore(time, win);
}

//Req AJAX pour sauvegarder la partie en base de donnees
function postGameScore(time, win) {
    $.ajax({
        type: "POST",
        url: "/my_memory/index.php",
        data: {
            action: 'add_score',
            id_user: $('#game-board').data('id-user'),
            time: time,
            win: win
        },
        dataType:'JSON',
        success: function(response) {
            alert(response);
            // Redirection sur le lobby
            $(location).attr('href',"/my_memory/index.php");
        }
    });
}

// Gestion du timer 
function timer(){
    if ($('#timer').length) {
        let sec = 00;
        let min = 05;
        let timer = setInterval(function(){
            // Formattage des secondes
            if (sec < 10) {
                sec = `0${sec}`;
            }
            $('#timer').html(min+':'+sec);
            if (sec == 0) {
                sec = 59;
                min--
            }
            sec--;
            if (min < 0) {
                clearInterval(timer);
                timeIsRunningOut();
            }
        }, 1000);
    }   
}