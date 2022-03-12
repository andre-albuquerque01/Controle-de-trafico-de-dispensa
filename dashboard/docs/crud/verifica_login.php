<?php
if (!isset($_SESSION)) session_start();
if (isset($_SESSION['id_login']) == null) {
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    //echo "<script>window.alert ='Erro: Necessário realizar o login para acessar a página!'</script>";
    echo "<script>window.location.href ='../../entrar.php'</script>";
}
/*
ob_start();
if((!isset($_SESSION['id_login']) == null) AND (!isset($_SESSION['email_usuario']) == null)){
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: ../index.php");
}
/*
if (!isset($_SESSION["id_login"]) != null || !isset($_SESSION["email_usuario"]) != null || !isset($_SESSION["nome_completo_login"]) !== PHP_SESSION_ACTIVE) {
    $_SESSION['erro'] = 'Erro: Necessário realizar o login para acessar a página!';
    echo "<script>alert('" . $_SESSION['erro'] . "');</script>";
    //    echo "<script>location.href ='../index.php' </script>";
    //header("Location:../../../entrar.php");
    header("Location: ../../../index.php");
} else if(isset($_SESSION["id_login"]) != null) {
    header("Location: ../index.a");
}
/*
if (!isset($_SESSION["id_login"]) || !isset($_SESSION["email_usuario"]) !== PHP_SESSION_ACTIVE) {
    $_SESSION['session_id'];
    //$entrada = $_GET['user'];
    //header("Location:../index.php?user=$entrada");
    //header("Location:../index.php");
    //echo "<script>window.location.href ='index.php'</script>";
}
/*if (!isset($_SESSION["id_usuario"]) || !isset($_SESSION["email_usuario"])) {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
        $_SESSION['id_usuario'];
        header("Location: ../index.php");
    } else {
        echo "<script>alert('Não foi possível')</script>";
    }
}
*/