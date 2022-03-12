<?php
$user = "root";
$password = "";

try{
    $conexao = new PDO('mysql:host=localhost;dbname=sge3', $user, $password);
}catch(PDOException $e){
}