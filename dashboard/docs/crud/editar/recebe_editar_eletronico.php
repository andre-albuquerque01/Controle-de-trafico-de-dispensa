<?php
include_once '../conexao.php';

// Recebe o id do usuario
$id_vindo = $_GET['id'];
//Informações do eletronico
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$numero = $_POST['numero'];
$descricao = $_POST['descricao'];

$editar = $conexao->prepare("UPDATE `eletronico` SET modelo=:modelo,marca=:marca,
numero=:numero,descricao=:descricao WHERE eletronico.id_eletronico = $id_vindo");
$editar->execute(array(
    ':modelo' => $modelo,
    ':marca' => $marca,
    ':numero' => $numero,
    ':descricao' => $descricao
));
if ($editar == TRUE) {
    $_SESSION['msg'] = 'Edição feita com Sucesso!';
    echo "<script>window.location.href='../../index.php';</script>";
    //header('location: ../../index.php');
    //header('Location:../../index.php');
} else {
    $_SESSION['erro'] = 'Não possivel editar, Verifique as informações!';
    header('Location:../../index.php');
}
