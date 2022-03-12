<?php
include_once 'conexao.php';
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$bairro = $_POST['bairro'];
$rua = $_POST['rua'];
$complemento = $_POST['complemento'];

$cadastrar = $conexao->prepare("INSERT INTO `endereco`(`cep`, `cidade`, `uf`, `bairro`, `rua`, `complemento`) 
VALUES (:cep, :cidade, :uf, :bairro, :rua, :complemento);");

$cadastrar->execute(array(
    ':cep' => $cep,
    ':cidade' => $cidade,
    ':uf' => $uf,
    ':bairro' => $bairro,
    ':rua' => $rua,
    ':complemento' => $complemento
));
if ($cadastrar == TRUE) {
    $_SESSION['msg'] = 'Cadastro feito com Sucesso!';
    //echo "<script>alert( ". $_SESSION['msg']. " );</script>";
    echo "<script>location.href ='../../../model/index.php' </script>";
    //header('Location:../../index.php');
} else {
    $_SESSION['erro'] = 'Não possivel Cadastrar, Verifique as informaçõe!';
    header('Location:../../../model/index.php');
}


/*
public function insert($endereco, $for=array($this->cep, ))
{
    $table_coluna = implode(`id_endereco`, `cep`, `cidade`, `uf`, `bairro`, `rua`, `complemento`, array_keys($for));
    $table_value = implode("'0, 1, 2, 3, 4, 5'", $for);

    $sql="INSERT INTO $endereco( $table_coluna) VALUES('$table_value')";

    if($sql == true){
        echo 'sucesso';
    }
}

    $cadastrar = $pdo->prepare("INSERT INTO `endereco`(`id_endereco`, `cep`, `cidade`, `uf`, `bairro`, `rua`, `complemento`) 
VALUES (:cep, :cidade, :uf, :bairro, :rua, :cpt)");

$cadastrar->execute(array(
    `:cep` => $cep,
    `:cidade` => $cidade,
    `:uf` => $uf,
    `:bairro` => $bairro,
    `:rua` => $rua,
    `:cpt` => $cpt
));
if ($cadastrar == true) {
    echo 'sucesso';
    header('Location:./');
}else{
    echo 'Erro';
}*/