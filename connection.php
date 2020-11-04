<?php
$server="localhost";
$username="root";
$password="";
$baza="flowerphp1";

try {
    $connection = new PDO("mysql:host=$server;dbname=$baza",$username,$password);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
}
catch(PDOException $e){
    echo $e->getMessage();
    
}