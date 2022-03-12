<?php
include_once '../conexao.php';

// Recebe o id do usuario
$id_vindo = $_GET['id'];
$data_entrega = $_POST['data_entrega'];
$editar = $conexao->prepare("UPDATE `reparo` SET `data_entrega`=:data_entrega WHERE id_reparo = $id_vindo");
$editar->execute(array(
    ':data_entrega' => $data_entrega
));
if ($editar == TRUE) {
    // $_SESSION['msg'] = 'Edição feita com Sucesso!';
    echo "<script>alert('Edição feita com Sucesso!');</script>";
    echo "<script>window.location.href='../../../view/pesquisar/pesquisa_cliente.php';</script>";
} else {
    // $_SESSION['erro'] = 'Não possivel editar, Verifique as informações!';
    echo "<script>alert('Não possivel editar, Verifique as informações!');</script>";
    echo "<script>window.location.href='../../../view/pesquisar/pesquisa_cliente.php';</script>";
}
