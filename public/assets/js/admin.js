$(".user").submit(function(e){
    e.preventDefault();
    
    const user = $(this)
    const url_address = $(this).find('.url_address').text()
    $.ajax({
        type: "POST",
        url: "/h-project_php/public/admin/make_admin", //ссылка на файл php
        data: {
          url_address: url_address
        },
        success: function() {
            console.log("success")
        }, error: function(e){
            throw e
        }
    }); 
}); 