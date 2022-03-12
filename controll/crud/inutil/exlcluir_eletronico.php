<?php 
include_once 'conexao.php';
$id_excluir = $_GET["id"];
$excluir = $conexao->query("DELETE FROM `eletronico` WHERE `eletronico`.`id_eletronico` = $id_excluir");
if($excluir->rowCount() > 0){
    echo "<script>alert('Excluido com sucesso')</script>";
    header('Location:./');
}else{
    echo "<script>alert('Falha na tentativa de excluir')</script>";
    header('Location:./');
}