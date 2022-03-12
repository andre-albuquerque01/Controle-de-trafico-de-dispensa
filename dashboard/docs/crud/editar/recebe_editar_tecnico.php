<?php
include_once '../conexao.php';
$id = $_GET['id'];
$nome = $_POST['nome'];
$telefone_tecnico = $_POST['telefone'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$complemento = $_POST['complemento'];
/*
$editar = $conexao->prepare("UPDATE cliente JOIN endereco ON cliente.id_cliente = endereco.id_endereco SET cliente.nome_completo= :nome, cliente.email_cliente = :email_cliente,
cliente.telefone_celular=:telefone, cliente.telefone_contato=:telefone_cont, endereco.cep = :cep, endereco.cidade = :cidade, endereco.uf=:uf, 
endereco.bairro= :bairro, endereco.rua=:rua, endereco.complemento=:complemento WHERE cliente.id_cliente =$id");
*/
$editar = $conexao->prepare("UPDATE `tecnico` JOIN endereco ON tecnico.endereco_id_endereco = endereco.id_endereco SET tecnico.nome_tecnico=:nome,
tecnico.telefone_tecnico=:telefone_tecnico, endereco.cep = :cep, endereco.cidade = :cidade, endereco.uf=:uf, 
endereco.bairro= :bairro, endereco.rua=:rua, endereco.complemento=:complemento WHERE tecnico.id_tecnico = $id");
$editar->execute(array(
    ':nome' => $nome,
    ':telefone_tecnico' => $telefone_tecnico,
    ':cep' => $cep,
    ':cidade' => $cidade,
    ':uf' => $uf,
    ':bairro' => $bairro,
    ':rua' => $rua,
    ':complemento' => $complemento
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
