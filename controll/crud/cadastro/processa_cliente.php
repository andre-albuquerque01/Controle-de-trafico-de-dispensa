<?php
include_once '../conexao.php';
if (isset($_POST['nome_completo'])) {
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
        echo "<script>alert('Cadastro feito com Sucesso!');</script>";
        echo "<script>location.href ='../../../model/forms/cadastro_aparelho.php?id=$usuario' </script>";
    } else {
        $_SESSION['erro'] = 'Não possivel Cadastrar, Verifique as informaçõe!';
        echo "<script>location.href ='../../../model/index.php' </script>";
    }
} else {
    echo "<script>alert('Houve erro! Nome não mencionado.');</script>";
    echo "<script>location.href ='../../../model/index.php' </script>";
}
