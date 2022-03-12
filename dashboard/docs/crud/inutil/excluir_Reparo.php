<?php 
include_once 'conexao.php';
$id_excluir = $_GET["id"];
if($id != null){
$excluir = $conexao->query("DELETE FROM `reparo` WHERE `reparo`.`id_reparo`  = $id_excluir");
if($excluir->rowCount() > 0){
    echo "<script>alert('Excluido com sucesso')</script>";
    header('Location:./');
}else{
    echo "<script>alert('Falha na tentativa de excluir')</script>";
    header('Location:./');
}}else{
    header('Location:./');
}