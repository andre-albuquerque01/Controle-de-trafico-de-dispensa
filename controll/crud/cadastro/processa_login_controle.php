<?php
session_start();
include_once '../conexao.php';
$email = $_POST['email'];
$senha = $_POST['senha'];
$contador = 0;
if ($email == null || $senha == null) {
    // $_SESSION['erro'] = 'Email ou senha invalida!';
    // $_SESSION['erro'] = null;
    echo "<script>alert('Email ou senha invalida!');</script>";
    echo "<script>window.location.href ='../../../controle/index.php' </script>";
}
$verifica = $conexao->query("SELECT * FROM controle WHERE email_controle = '$email' AND senha_controle = $senha;");
$entrada = $verifica->fetch();
if ($entrada != null) {
    $_SESSION['id_controle'] = $entrada['id_controle'];
    $_SESSION['nome_completo'] = $entrada['nome_completo'];
    $_SESSION['email_usuario'] = $entrada['email_controle'];
    $_SESSION['senha_usuario'] = $entrada['senha_controle'];
    
    $_SESSION['msg'] = null;
    echo "<script>alert('Login valido!');</script>";
    echo "<script>window.location.href ='../../../controle/controle.php' </script>";
} else {
    
    $_SESSION['erro'] = null;
    unset($_SESSION['erro']);
    echo "<script>alert('Login invalido!');</script>";
    echo "<script>window.location.href ='../../../controle/index.php' </script>";
}
