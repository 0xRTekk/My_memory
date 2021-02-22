$(window).load(function() {

    $('.main-container').css('filter', 'blur(1rem)');

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
            success: function(response){
                console.log('success')
                console.log(response);
                // put on console what server sent back...
            }
        });
    })

});