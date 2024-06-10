<?php

$url = "";

if(isset($_GET["uurl"])){
    $url = explode("/", $_GET["uurl"]);
    if($url[0] == "onee" && isset( $url[1] )){
        if(file_exists("./api"."/".$url[1]."/".$url[2].".php")){
            require("./api"."/".$url[1]."/".$url[2].".php");
        }else {
            # code...
            echo "ereur1";
        }
    }else {
        # code...
        echo "ereur2";
    }
}else {
    # code...

    echo "ereur3";
}

/*
$password = 'tohouri1';

$test = sha1($password);
echo($test);
*/
