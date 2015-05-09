$(function () {

    $("#loader").fadeOut(200);

    $("form#login").on("submit", function (e) {
        e.preventDefault();

        $("#loader").fadeIn(200);

        var $this = $(this);


        $.ajax({
            async: false,
            url: $this.attr("action"),
            type: $this.attr("method"),
            data: $this.serialize(),
            dataType: "json",
            success: function (response) {

                if (response.status === "success") {

                    window.location.href = "index/home";

                } else {
                    alert(response.message);
                    $("#loader").fadeOut(200);
                }

            },
            error: function () {

                //window.location.href = "index";
                $("#loader").fadeOut(200);
                return false;
            },
            fail: function () {
                alert("fail");
                $("#loader").fadeOut(200);
                return false;
            }
        });


        return false;
    });

});


