<?php
include_once '../conexao.php';
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$numero = $_POST['numero'];
$descricao = $_POST['descricao'];
$cadastrar = $conexao->prepare("INSERT INTO `eletronico`(`modelo`, `marca`, `numero`, `descricao`) 
VALUES (:modelo, :marca, :numero, :descricao)");

$cadastrar->execute(array(
    ':modelo' => $modelo,
    ':marca' => $marca,
    ':numero' => $numero,
    ':descricao' => $descricao
));
$eletronico = $conexao->lastInsertId();
$id = $_GET['id'];
$cadastrar = $conexao->prepare("INSERT INTO `cliente_eletronico`(cliente_id_cliente, eletronico_id_eletronico) VALUES (:cliente_id_cliente, :eletronico_id_eletronico)");
$cadastrar->execute(array(
    ':cliente_id_cliente' => $id,
    ':eletronico_id_eletronico' => $eletronico
));

if ($cadastrar->rowCount() > 0) {
    $_SESSION['msg'] = 'Cadastro feito com Sucesso!';
    echo "<script>alert( ". $_SESSION['msg']. " );</script>";
    header("Location:../../pages/forms/cadastro_reparo.php?id=$eletronico");
} else {
    $_SESSION['erro'] = 'Não possivel Cadastrar, Verifique as informaçõe!';
    header('Location:../../index.php');
}

