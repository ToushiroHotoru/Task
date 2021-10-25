$("body").on("submit", "restore_form", function(e){
    e.preventDefault();
    const form = $(this)
    const email = $(this).find('.email').text()
    $.ajax({
        type: "POST",
        url: "/h-project_php/public/restore", //ссылка на файл php
        data: {
            email: email
        },
        success: function() {
            console.log('success');
        }, error: function(e){
            throw e
        }
    }); 
}); 