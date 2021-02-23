$(window).load(function() {
    let validated_cards = 0;
    let flipped_cards = 0;

    $('.user-best-game-times').css('display', 'none');
    $('.lobby-wrapper').css('filter', 'blur(.5rem)');

    modalSubmit();
    flipCard(flipped_cards);
    console.log(flipped_cards);
});

function modalSubmit() {
    $('#nickname-modal-submit').on('click', function(e) {
        e.preventDefault();
        let input_nickname = $('#input-nickname').val();
        $.ajax({
            type: "GET",
            url: "/my_memory/index.php",
            data: {
                action: 'connect',
                input_nickname: input_nickname
            },
            dataType:'JSON', 
            success: function(response) {
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

function flipCard(flipped_cards) {
    $('.cards.hidden-card').on('click', function(e) {
        $(this).removeClass('hidden-card').addClass('visible-card');
        flipped_cards++;
        let id_visible_card = $(this).find('img').data('id');
    })
}