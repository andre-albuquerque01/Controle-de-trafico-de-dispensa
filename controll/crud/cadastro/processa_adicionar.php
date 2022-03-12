<?php
include_once '../conexao.php';
if (isset($_POST['modelo'])) {
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

    $data_recebimento = $_POST['data_recebimento'];
    $data_previsao = $_POST['DataPrevisao'];
    $data_entrega = $_POST['dataEntrega'];
    $observacao = $_POST['observacao'];
    $mao_obra = $_POST['mao_obra'];
    $custo_peca = $_POST['custo_peca'];
    $valor_total = $mao_obra + $custo_peca;
    //Status
    $status = $_POST['status'];
    //Tecnico
    $tecnico = $_POST['id_tecnico'];

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
        ':eletronico_id_eletronico' => $eletronico
    ));

    if ($cadastrar->rowCount() > 0) {
        // $_SESSION['msg'] = 'Cadastro feito com Sucesso!';
        echo "<script>alert('Cadastro feito com Sucesso!');</script>";
        echo "<script>location.href ='../../../model/index.php' </script>";
        //header("Location:../../index.php");
    } else {
        // $_SESSION['erro'] = 'Não possivel Cadastrar, Verifique as informaçõe!';
        echo "<script>alert('Houve erro!');</script>";
        echo "<script>location.href ='../../../model/index.php' </script>";
    }
} else {
    echo "<script>alert('Modelo não mencionado!');</script>";
    echo "<script>location.href ='../../../model/index.php' </script>";
}
