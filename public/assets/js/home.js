$("body").on('submit', '.game__add', function(e){
    e.preventDefault();
    
    const form = $(this)
    const gameId = parseInt($(this).attr('data-game-id'));
    $.ajax({
        type: "POST",
        url: "/h-project_php/public/home/add_to_favorites", //ссылка на файл php
        data: {
            game_id: gameId
        },
        success: function() {
            form.removeClass('game__add').addClass('game__delete')
            form.find('button').text('delete')
        }, error: function(e){
            throw e
        }
    }); 
}); 

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
            form.removeClass('game__delete').addClass('game__add')
            form.find('button').text('add')
        }, error: function(e){
            throw e
        }
    }); 
}); 