$(function(){
    
    $("#loader").fadeOut(200);
    
    $("form#login").on("submit", function(e){
        e.preventDefault();
        
        $("#loader").fadeIn(200);
        
        var $this = $(this);

        window.location.href = "home";

        $.ajax({
            url: $this.attr("action"),
            type: $this.attr("method"),
            data: $this.serialize(),
            dataType: "json",
            success: function(response){

                if(response.status == "success"){
                    window.location.href = response.redirect;
                }else{
                    alert(response.message);
                    $("#loader").fadeOut(200);
                }

            },
            error: function(){

                window.location.href = "home";

                //alert("error");
                $("#loader").fadeOut(200);
            },
            fail: function(){
                alert("fail");
                $("#loader").fadeOut(200);
            }
        });


        return false;
    });
    
});


