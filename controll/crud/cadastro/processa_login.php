<?php
session_start();
ob_start();
include_once '../conexao.php';
//include_once 'session.php';
$email = $_POST['email'];
$senha = $_POST['senha'];
$contador = 0;
if ($email == null || $senha == null) {
    // $_SESSION['erro'] = 'Email ou senha invalida!';
    echo "<script>alert('Email ou senha invalida!');</script>";
    echo "<script>window.location.href ='../../../entrar.php' </script>";
}
$verifica = $conexao->query("SELECT * FROM login WHERE email_usuario = '$email' AND senha_usuario = $senha;");
$entrada = $verifica->fetch();
if ($entrada != null) {
    //session_start();
    $_SESSION['id_login'] = $entrada['id_login'];
    $_SESSION['nome_completo_login'] = $entrada['nome_completo_login'];
    $_SESSION['email_usuario'] = $entrada['email_usuario'];
    $_SESSION['senha_usuario'] = $entrada['senha_usuario'];
    
    // $_SESSION['msg'] = null;
    echo "<script>alert('Informações validas!');</script>";
    echo "<script>window.location.href ='../../../model/index.php' </script>";
} else {
    
    $_SESSION['erro'] = null;
    unset($_SESSION['erro']);
    //echo "<script>window.location.href ='../../../../entrar.php'</script>";
    echo "<script>alert('Informações invalidas!');</script>";
    echo "<script>window.location.href ='../../../entrar.php' </script>";
}