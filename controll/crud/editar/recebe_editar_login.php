<?php
include_once '../conexao.php';
if (isset($_POST['nome_completo_login'])) {
    $id_vindo = $_GET['id'];
    $nome_completo_login = $_POST['nome_completo_login'];
    $nome_loja = $_POST['nome_loja'];
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
    $senha = $_POST['senha_atual'];
    $verifica = $conexao->query("SELECT * FROM login WHERE `senha_usuario` = $senha;");
    $entrada = $verifica->fetch();
    if ($entrada != null) {

        $editar = $conexao->prepare("UPDATE `login` SET nome_completo_login=:nome_completo_login, nome_loja=:nome_loja, email_usuario =:email_usuario, senha_usuario =:senha_usuario WHERE login.id_login = $id_vindo");
        $editar->execute(array(
            ':nome_completo_login' => $nome_completo_login,
            ':nome_loja' => $nome_loja,
            ':email_usuario' => $email_usuario,
            ':senha_usuario' => $senha_usuario
        ));
        if ($editar == TRUE) {
            // $_SESSION['msg'] = 'Edição feita com Sucesso!';
            echo "<script>alert('Edição feita com sucesso!');</script>";
            echo "<script>window.location.href='../../../model/index.php';</script>";
        }
    } else {
        // $_SESSION['erro'] = 'Não possivel editar, Verifique as informações!';
        echo "<script>alert('Não possivel editar, Verifique as informações!');</script>";
        echo "<script>window.location.href='../../../model/index.php';</script>";
    }
} else {
    echo "<script>alert('Não possivel editar, Verifique as informações!');</script>";
    echo "<script>window.location.href='../../../model/index.php';</script>";
}
