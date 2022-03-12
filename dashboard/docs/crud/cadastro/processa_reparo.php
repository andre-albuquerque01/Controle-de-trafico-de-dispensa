<?php
include_once '../conexao.php';
$data_recebimento = $_POST['data_recebimento'];
$data_previsao = $_POST['DataPrevisao'];
$data_entrega = $_POST['dataEntrega'];
$observacao = $_POST['observacao'];
$mao_obra = $_POST['mao_obra'];
$custo_peca = $_POST['custo_peca'];
$valor_total = $_POST['valor_total'];
//Status
$status = $_POST['status'];
//Tecnico
$tecnico = $_POST['id_tecnico'];
//Modelo
$id = $_GET['id'];
//$eletronico = $_POST['eletronico'];

/* Fazendo o INSERT */
$cadastrar = $conexao->prepare("INSERT INTO `reparo`(`data_recebimento`, `data_previsao`, `data_entrega`, `observacao`, `mao_obra`, `custo_peca`,
 `valor_total`, `status_id_status`, `tecnico_id_tecnico`, `eletronico_id_eletronico`)  
VALUES (:data_recebimento, :data_previsao, :data_entrega, :observacao, :mao_obra, :custo_peca, :valor_total, :status_id_status, :tecnico_id_tecnico, :eletronico_id_eletronico);");

$cadastrar->execute(array(
    ':data_recebimento' => $data_recebimento,
    ':data_previsao' => $data_previsao,
    ':data_entrega' => $data_entrega,
    ':observacao' => $observacao,
    ':mao_obra' => $mao_obra,
    ':custo_peca' => $custo_peca,
    ':valor_total' => $valor_total,
    ':status_id_status' => $status,
    ':tecnico_id_tecnico' => $tecnico,
    ':eletronico_id_eletronico' => $id
));
if ($cadastrar == TRUE) {
    $_SESSION['msg'] = 'Cadastro feito com Sucesso!';
    //echo "<script>alert( ". $_SESSION['msg']. " );</script>";
    echo "<script>location.href ='../../index.php' </script>";
    //header('Location:../../index.php');
} else {
    $_SESSION['erro'] = 'Não possivel Cadastrar, Verifique as informaçõe!';
    header('Location:../../index.php');
}
