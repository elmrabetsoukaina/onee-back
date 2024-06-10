<?php

    require './vendor/autoload.php';
    use Firebase\JWT\JWT;
    //use Firebase\JWT\Key;

    function encodeToken($payload){
        return JWT::encode($payload, TOKEN_KEY, 'HS256');
    }

?>