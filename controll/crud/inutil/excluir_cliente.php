<?php
include_once 'conexao.php';

$id = $_GET["id"];
    $consulta = $conexao->query('SELECT * FROM cliente WHERE id_cliente = '.$id);
    $id_endereco = $consulta->fetch(PDO::FETCH_ASSOC);
    $excluir_cliente = $conexao->prepare("DELETE FROM cliente WHERE cliente.id_cliente = :id_cliente");
    $excluir_cliente->execute(array(
        ':id_cliente'=> $id
    ));
    $excluir_endereco  = $conexao->prepare("DELETE FROM cliente WHERE endereco.id_endereco = :id_endereco");
    $excluir_endereco->execute(array(
        ':id_endereco'=> $id_endereco['endereco_id_endereco']
    ));
  
  
    if ($excluir == true) {
        echo "<script>alert('Excluido com sucesso')</script>";
        //header('Location:./');
    } /*else {
        echo "<script>alert('Falha na tentativa de excluir')</script>";
        header('Location:./');
    }*/
 
    echo "<script>alert('Falha na tentativa de excluir')</script>";

