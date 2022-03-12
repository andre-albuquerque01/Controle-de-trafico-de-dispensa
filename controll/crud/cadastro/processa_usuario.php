<?php
include_once '../conexao.php';
if (isset($_POST['email_controle'])) {
    $email = $_POST['email_controle'];
    $nome_completo = $_POST['nome_completo'];
    $senha_usuario = $_POST['senha_usuario'];
    $cadastrar = $conexao->prepare("INSERT INTO `controle`(`nome_completo`, `email_controle`, `senha_controle`) 
VALUES (:nome_completo, :email_controle, :senha_controle)");

    $cadastrar->execute(array(
        ':nome_completo' => $nome_completo,
        ':email_usuario' => $email,
        ':senha_usuario' => $senha_usuario
    ));
    if ($cadastrar->rowCount() > 0) {
        // $_SESSION['msg'] = 'Cadastro feito com Sucesso!';
        echo "<script>alert('Cadastro feito com Sucesso!');</script>";
        echo "<script>location.href ='../../../controle/controle.php' </script>";
    } else {
        // $_SESSION['erro'] = 'Não possivel Cadastrar, Verifique as informaçõe!';
        echo "<script>alert('Não possivel Cadastrar, Verifique as informaçõe!');</script>";
        echo "<script>location.href ='../../../controle/controle.php' </script>";
    }
} else {
    echo "<script>alert('Não possivel Cadastrar, verifique as informaçõe!');</script>";
    echo "<script>location.href ='../../../controle/controle.php' </script>";
}
