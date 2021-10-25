$("body").on("submit", "restore_form", function(e){
    e.preventDefault();
    const form = $(this)
    const password = $(this).find('.password').text()
    $.ajax({
        type: "POST",
        url: "/h-project_php/public/password", //ссылка на файл php
        data: {
            password: password
        },
        success: function() {
            console.log('success');
        }, error: function(e){
            throw e
        }
    }); 
}); 