<?php

//    include_once("./login.html");

    if(isset($_GET['url']) && $_GET['url'] == "login"){
        include_once("./login.html");
        exit();
    }


    include_once("./header.html");
    
    if(isset($_GET['url']) && $_GET['url'] != "home"){
        include_once($_GET['url'].".html");
    }
    
    include_once("./footer.html");

?>