<?php
include_once '../conexao.php';
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
    $_SESSION['msg'] = 'Edição feita com Sucesso!';
    echo "<script>window.location.href='../../index.php';</script>";
    //header('location: ../../index.php');
    //header('Location:../../index.php');
} else {
    $_SESSION['erro'] = 'Não possivel editar, Verifique as informações!';
    header('Location:../../index.php');
}
