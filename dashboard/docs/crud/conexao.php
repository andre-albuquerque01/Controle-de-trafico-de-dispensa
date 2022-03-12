<?php
$user = "root";
$password = "";

try{
    $conexao = new PDO('mysql:host=localhost;dbname=sge2', $user, $password);
    //$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Saí fora, aqui não é lugar se mexer";
}catch(PDOException $e){
    //echo 'Erro'.$e->getMessage()."<br>";
    echo " Fica ai, pois deu erro!!!";
}