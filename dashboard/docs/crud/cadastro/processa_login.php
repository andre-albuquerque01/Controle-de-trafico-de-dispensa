<?php
session_start();
ob_start();
include_once '../conexao.php';
//include_once 'session.php';
$email = $_POST['email'];
$senha = $_POST['senha'];
$contador = 0;
if ($email == null || $senha == null) {
    $_SESSION['erro'] = 'Email ou senha invalida!';
    echo "<script> Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '" . $_SESSION['erro'] . "',
    }) </script>";
    $_SESSION['erro'] = null;
    echo "<script>window.location.href ='../../../../entrar.php' </script>";
}
$verifica = $conexao->query("SELECT * FROM login WHERE email_usuario = '$email' AND senha_usuario = $senha;");
$entrada = $verifica->fetch();
if ($entrada != null) {
    //session_start();
    $_SESSION['id_login'] = $entrada['id_login'];
    $_SESSION['nome_completo_login'] = $entrada['nome_completo_login'];
    $_SESSION['email_usuario'] = $entrada['email_usuario'];
    $_SESSION['senha_usuario'] = $entrada['senha_usuario'];

    $_SESSION['msg'] = null;
    echo "<script>window.location.href ='../../index.php' </script>";
} else {

    $_SESSION['erro'] = null;
    unset($_SESSION['erro']);
    //echo "<script>window.location.href ='../../../../entrar.php'</script>";
    //$_SESSION['erro'] = 'Informações erradas!';
    echo "<script>window.location.href ='../../../../entrar.php' </script>";
}
/*
$email = $_POST['email'];
$senha = $_POST['senha'];
$contador = 0;

if($email == null || $senha == null){
    $_SESSION['erro'] = 'Email ou senha invalida!';
    header('Location:../../../index.html');
}

$verifica = $conexao->query("SELECT * FROM `usuario` WHERE email_usuario = '$email' AND senha_usuario = '$senha'"); 
$entrada = $verifica->fetch();
if($entrada != null){
    //session_start();
    $_SESSION['session_id'] = $entrada['id_usuario'];
    $_SESSION['session_user'] = $entrada['email'];
    $_SESSION['session_pass'] = $entrada['senha'];

    echo "<script>alert('funcionou');</script>";
}else{
    echo "<script>alert('deu erro');</script>";
}
*/