<?php
include_once '../conexao.php';
if (isset($_GET['id'])) {
    $id_vindo = $_GET['id'];
    $nome_completo_login = $_POST['nome_completo_login'];
    $nome_loja = $_POST['nome_loja'];
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = $_POST['senha_usuario'];

    $editar = $conexao->prepare("UPDATE `login` SET nome_completo_login=:nome_completo_login, nome_loja=:nome_loja, email_usuario =:email_usuario, senha_usuario =:senha_usuario WHERE login.id_login = $id_vindo");
    $editar->execute(array(
        ':nome_completo_login' => $nome_completo_login,
        ':nome_loja' => $nome_loja,
        ':email_usuario' => $email_usuario,
        ':senha_usuario' => $senha_usuario
    ));
    if ($editar == TRUE) {
        // $_SESSION['msg'] = 'Edição feita com Sucesso!';
        echo "<script>alert('Edição feita com Sucesso!');</script>";
        echo "<script>window.location.href='../../../controle/controle.php';</script>";
    } else {
        // $_SESSION['erro'] = 'Não possivel editar, Verifique as informações!';
        echo "<script>alert('Não possivel editar, Verifique as informações!');</script>";
        echo "<script>window.location.href='../../../controle/controle.php';</script>";
    }
} else {
    echo "<script>alert('Não possivel editar, Verifique as informações!');</script>";
    echo "<script>window.location.href='../../../controle/controle.php';</script>";
}
