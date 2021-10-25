$("body").on('submit','.game__delete', function(e){
    e.preventDefault();
    
    const form = $(this)
    const gameId = parseInt($(this).attr('data-game-id'));
    $.ajax({
        type: "POST",
        url: "/h-project_php/public/home/delete_from_favorites", //ссылка на файл php
        data: {
            game_id: gameId
        },
        success: function() {
            form.remove();
        }, error: function(e){
            throw e
        }
    }); 
}); 