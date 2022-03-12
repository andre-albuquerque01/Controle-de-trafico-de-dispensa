<?php
include_once '../conexao.php';
// Endereço 
if (isset($_POST['nome'])) {
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

    // Tecnico
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $id_endereco = $conexao->lastInsertId();
    $login_id_login = $_GET['id'];
    $cadastrar = $conexao->prepare("INSERT INTO `tecnico`( `nome_tecnico`, `telefone_tecnico`, `endereco_id_endereco`, `login_id_login`) 
VALUES (:nome,:telefone ,:endereco_id_endereco, :login_id_login)");

    $cadastrar->execute(array(
        ':nome' => $nome,
        ':telefone' => $telefone,
        ':endereco_id_endereco' => $id_endereco,
        ':login_id_login' => $login_id_login
    ));
    if ($cadastrar == TRUE) {
        // $_SESSION['msg'] = 'Cadastro feito com Sucesso!';
        echo "<script>alert('Cadastro feito com Sucesso!');</script>";
        echo "<script>location.href ='../../../model/index.php' </script>";
    } else {
        // $_SESSION['erro'] = 'Não possivel Cadastrar, Verifique as informaçõe!';
        echo "<script>alert('Não possivel Cadastrar, Verifique as informaçõe!');</script>";
        echo "<script>location.href ='../../../model/index.php' </script>";
    }
} else {
    echo "<script>alert('Não possivel Cadastrar, pois não foi mencionado o nome do tecnico');</script>";
    echo "<script>location.href ='../../../model/index.php' </script>";
}
