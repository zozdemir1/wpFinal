<?php
function pdo_connect_mysql(){
    $Servername='localhost';
    $User='root';
    $Password='';
    $Name='tmrs';

    try{
        return new PDO('mysql:host='. $Servername .'; dbname=' . $Name .'; charset=utf8', $User,$Password);
    } catch(PDOException $exception){
        exit('Failed to connect to database...');
    }
}
?>
