$(window).on('load ready', function() {
    const game_id = $('.form__game-rating').attr('data-game-id')
    console.log(game_id)
    
    $.ajax({
        type: "POST",
        url: "/h-project_php/public/game", //ссылка на файл php
        data: {
            game_id: game_id,
        },
        success: function() {
           console.log('success');
        }, error: function(e){
            throw e
        }
});
});

$(".comment").submit(function(e){
    e.preventDefault();
    const form = $(this)
    const thisId = parseInt($(this).find('.comment-id').text())
    $.ajax({
        type: "POST",
        url: "/h-project_php/public/game/delete_comment", //ссылка на файл php
        data: {
            commentId: thisId
        },
        success: function() {
            form.remove()
        }, error: function(e){
            throw e
        }
    }); 
}); 

$(".form__add_comment").submit(function(e){
    e.preventDefault();
    
    const form = $(this)
    const thisId = parseInt($(this).find('.game-id').text())
    const text = $(this).find('#text').val()
    $.ajax({
        type: "POST",
        url: "/h-project_php/public/game/add_comment", //ссылка на файл php
        data: {
            game_id: thisId,
            text: text
        },
        success: function(data){
           const comment = $(' <div class="name"><?=$_SESSION["user_name"]?></div><div class="text">' + text + '</div><button class="delete_comment">DELETE COMMENT</button><div class="hidden comment-id"></div>')
           const parent = $('.game__comments')
           parent.append(comment)
           console.log(data)
        }, error: function(e){
            throw e
        }
    }); 
}); 

$("body").on('submit', '.game__add', function(e){
    e.preventDefault();
    
    const form = $(this)
    const gameId = parseInt($(this).attr('data-game-id'));
    $.ajax({
        type: "POST",
        url: "/h-project_php/public/game/add_to_favorites", //ссылка на файл php
        data: {
            game_id: gameId
        },
        success: function() {
            form.removeClass('game__add').addClass('game__delete')
            form.find('button').text('Delete')
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
        url: "/h-project_php/public/game/delete_from_favorites", //ссылка на файл php
        data: {
            game_id: gameId
        },
        success: function() {
            form.removeClass('game__delete').addClass('game__add')
            form.find('button').text('Add')
        }, error: function(e){
            throw e
        }
    }); 
}); 

$('body').on('change', '.form__game-rating', function(e){
    e.preventDefault();
    
    const form = $(this)
    const gameId = parseInt($(this).attr('data-game-id'))
    const rating = parseInt($(this).val())
    $.ajax({
        type: "POST",
        url: "/h-project_php/public/game/rate_game", //ссылка на файл php
        data: {
            game_id: gameId,
            rating: rating
        },
        success: function() {
           console.log('success');
        }, error: function(e){
            throw e
        }
    }); 

   
}); 