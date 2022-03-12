<?php
include_once '../conexao.php';
/*
//login
$nome_completo = $_POST['nome_completo'];
$email_usuario = $_POST['email_usuario'];
$senha_usuario = $_POST['senha_usuario'];
$senha_usuario_verificaçao = $_POST['senha_usuario_verificaçao'];
if($senha_usuario == $senha_usuario_verificaçao){
$cadastrar = $conexao->prepare("INSERT INTO `login`(nome_completo, email_usuario, senha_usuario) 
VALUES (:nome_completo, :email_usuario, :senha_usuario);");
$cadastrar->execute(array(
    ':nome_completo' => $nome_completo,
    ':email_usuario' => $email_usuario,
    ':senha_usuario' => $senha_usuario
));*/

// id da Sessão
$id_login = $_GET['id'];


//$id_login = $conexao->lastInsertId();

// Endereço 
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$complemento = $_POST['complemento'];

$cadastrar = $conexao->prepare("INSERT INTO `endereco`(`cep`, `cidade`, `uf`, `bairro`, `rua`, `complemento`) 
VALUES (:cep, :cidade, :uf, :bairro, :rua, :complemento);");

$cadastrar->execute(array(
    ':cep' => $cep,
    ':cidade' => $cidade,
    ':uf' => $uf,
    ':bairro' => $bairro,
    ':rua' => $rua,
    ':complemento' => $complemento
));

// Cliente 
$nome_completo = $_POST['nome_completo'];
$email_cliente = $_POST['email_cliente'];
$telefone_celular = $_POST['telefone_celular'];
$telefone_contato = $_POST['telefone_contato'];
$id_endereco = $conexao->lastInsertId();
$cadastrar = $conexao->prepare("INSERT INTO `cliente`(`nome_completo`, `email_cliente`, `telefone_celular`, `telefone_contato`, `endereco_id_endereco`, `login_id_login`) 
VALUES (:nome_completo, :email_cliente, :telefone_celular, :telefone_contato, :endereco_id_endereco, :login_id_login)");

$cadastrar->execute(array(
    ':nome_completo' => $nome_completo,
    ':email_cliente' => $email_cliente,
    ':telefone_celular' => $telefone_celular,
    ':telefone_contato' => $telefone_contato,
    ':endereco_id_endereco' => $id_endereco,
    ':login_id_login' => $id_login
));

$usuario = $conexao->lastInsertId();



if ($cadastrar == true) {
    $_SESSION['msg'] = 'Cadastro feito com Sucesso!';
    //header("Location:../../pages/forms/cadastro_aparelho.php?id=$usuario");
    echo "<script>location.href ='../../pages/forms/cadastro_aparelho.php?id=$usuario' </script>";
    //header('Location:../../index.php');
} else {
    $_SESSION['erro'] = 'Não possivel Cadastrar, Verifique as informaçõe!';
    header('Location:../../index.php');
}
