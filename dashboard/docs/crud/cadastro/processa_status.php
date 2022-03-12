<?php
include_once '../conexao.php';
$momento = $_POST['momento'];


$cadastrar = $conexao->prepare("INSERT INTO `statu`(`nome_status`) VALUES (:momento)");

$cadastrar->execute(array(
    ':momento' => $momento
));
if ($cadastrar == TRUE) {
    $_SESSION['msg'] = 'Cadastro feito com Sucesso!';
    //echo "<script>alert( ". $_SESSION['msg']. " );</script>";
    echo "<script>location.href ='../../index.php' </script>";
    //header('Location:../../index.php');
} else {
    $_SESSION['erro'] = 'Não possivel Cadastrar, Verifique as informaçõe!';
    header('Location:../../index.php');
}
