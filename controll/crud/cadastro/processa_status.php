<?php
include_once '../conexao.php';
$momento = $_POST['momento'];


$cadastrar = $conexao->prepare("INSERT INTO `statu`(`nome_status`) VALUES (:momento)");

$cadastrar->execute(array(
    ':momento' => $momento
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
