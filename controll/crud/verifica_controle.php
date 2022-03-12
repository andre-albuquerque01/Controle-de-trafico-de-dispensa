<?php
if (!isset($_SESSION)) session_start();
if (isset($_SESSION['id_controle']) == null) {
    // $_SESSION['msg'] = "<p style='color: #ff0000'></p>";
    //echo "<script>window.alert ='Erro: Necessário realizar o login para acessar a página!'</script>";
    echo "<script>alert('Erro: Necessário realizar o login para acessar a página!');</script>";
    echo "<script>window.location.href ='../../index.php'</script>";
}