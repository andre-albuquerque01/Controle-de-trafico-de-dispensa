<?php
include_once '../conexao.php';
if (isset($_GET['aparelho'])) {
    // Recebe o id do usuario
    $id_vindo = $_GET['id'];
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

    $status = $_POST['status'];

    $editar = $conexao->prepare("UPDATE `reparo` SET `data_recebimento`=:data_recebimento,
`data_previsao`=:data_previsao,`data_entrega`=:data_entrega,`observacao`=:observacao,`mao_obra`=:mao_obra,
`custo_peca`=:custo_peca,`valor_total`=:valor_total,`status_id_status`=:statu,`tecnico_id_tecnico`=:id_tecnico,
`eletronico_id_eletronico`=:eletronico WHERE id_reparo = $id_vindo");
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
        // $_SESSION['msg'] = 'Edição feita com Sucesso!';
        echo "<script>alert('Edição feita com Sucesso!');</script>";
        echo "<script>window.location.href='../../../view/pesquisar/pesquisa_reparo.php';</script>";
    } else {
        // $_SESSION['erro'] = 'Não possivel editar, Verifique as informações!';
        echo "<script>alert('Não possivel editar, Verifique as informações!');</script>";
        echo "<script>window.location.href='../../../view/pesquisar/pesquisa_reparo.php';</script>";
    }
} else {
    echo "<script>alert('Não possivel editar, Verifique as informações!');</script>";
    echo "<script>window.location.href='../../../view/pesquisar/pesquisa_reparo.php';</script>";
}
