<?php
define("TOKEN_KEY", '_c_OLI/AM');
try {
    //code...
    $pdo = new PDO("mysql:host=localhost;dbname=onee_bd", 'root', '');
    $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
} catch (Exception $e) {
    //throw $th;
    die('Erreur : ' . $e->getMessage());
}

