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
    $_SESSION['msg'] = 'Edição feita com Sucesso!';
    echo "<script>window.location.href='../../pages/pesquisar/pesquisa_cliente.php';</script>";
    echo "<script>alert('Alterado com sucesso!')</script>";
    //header('location: ../../index.php');
    //header('Location:../../index.php');
} else {
    $_SESSION['erro'] = 'Não possivel editar, Verifique as informações!';
    header('Location:../../pages/pesquisar/pesquisa_cliente.php');
}
