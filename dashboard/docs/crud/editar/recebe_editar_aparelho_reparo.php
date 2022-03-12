<?php
include_once '../conexao.php';

// Recebe o id do usuario
$aparelho = $_GET['aparelho'];
//Informações do eletronico
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$numero = $_POST['numero'];
$descricao = $_POST['descricao'];

$editar = $conexao->prepare("UPDATE `eletronico` SET modelo=:modelo,marca=:marca,
numero=:numero,descricao=:descricao WHERE eletronico.id_eletronico = $aparelho");
$editar->execute(array(
    ':modelo' => $modelo,
    ':marca' => $marca,
    ':numero' => $numero,
    ':descricao' => $descricao
));

// Recebe o id do usuario
$reparo = $_GET['reparo'];
$id_eletronico = $_GET['aparelho'];
//Informações sobre o concerto
$data_recebimento = $_POST['data_recebimento'];
$data_previsao = $_POST['data_previsao'];
$data_entrega = $_POST['data_entrega'];
$observacao = $_POST['observacao'];
$mao_obra = $_POST['mao_obra'];
$custo_peca = $_POST['custo_peca'];
$valor_total = $mao_obra + $custo_peca;

//Tecnico
$tecnico = $_POST['id_tecnico'];

//Modelo
//$id_eletronico = $_POST['eletronico'];
//Status
$status = $_POST['status'];

$editar = $conexao->prepare("UPDATE `reparo` SET `data_recebimento`=:data_recebimento,
`data_previsao`=:data_previsao,`data_entrega`=:data_entrega,`observacao`=:observacao,`mao_obra`=:mao_obra,
`custo_peca`=:custo_peca,`valor_total`=:valor_total,`status_id_status`=:statu,`tecnico_id_tecnico`=:id_tecnico,
`eletronico_id_eletronico`=:eletronico WHERE id_reparo = $reparo");
$editar->execute(array(
    ':data_recebimento' => $data_recebimento,
    ':data_previsao' => $data_previsao,
    ':data_entrega' => $data_entrega,
    ':observacao' => $observacao,
    ':mao_obra' => $mao_obra,
    ':custo_peca' => $custo_peca,
    ':valor_total' => $valor_total,
    ':statu' => $status,
    ':id_tecnico' => $tecnico,
    ':eletronico' => $id_eletronico
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