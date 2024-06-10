<?php

header('Content-Type: application/json; charset=utf8');
header("Access-Control-Allow-origin: *");
header('Access-Control-Allow-Headers: *'); 
$headRequest = apache_request_headers();
$letoken = "";
require_once 'database.php';

$obj = json_decode(file_get_contents('php://input')); //revoir


$resultat = [
    "is_auth"=>false,
    "result" =>false,
    "infos" =>"Une erreur est survenue",
    "data"=>[],
    "php"=>$obj,
    "x"=>$_POST,
    "url"=>$url,
    "time"=>time(),
];

if (isset($headRequest['auth']))
  if (decodeToken($headRequest['auth'])['result']) {
    $letoken = $headRequest['auth'];
    $resultat['is_auth'] = true;
    $userData = decodeToken($headRequest['auth'])['data'];
    var_dump($userData);
    $userData = (array) $userData;
    $resultat['user'] = $userData;
  }



?>