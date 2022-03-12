<?php
include_once '../conexao.php';

// login
$nome_completo = $_POST['nome_completo'];
$email_usuario = $_POST['email_usuario'];
$senha_usuario = $_POST['senha_usuario'];
$senha_usuario_verificaçao = $_POST['senha_usuario_verificaçao'];
if($senha_usuario == $senha_usuario_verificaçao){
$cadastrar = $conexao->prepare("INSERT INTO `login`(nome_completo, email_usuario, senha_usuario) 
VALUES (:nome_completo, :email_usuario, :senha_usuario);");
$cadastrar->execute(array(
    ':nome_completo' => $nome_completo,
    ':email_usuario' => $email_usuario,
    ':senha_usuario' => $senha_usuario
));

$id_login = $conexao->lastInsertId();

// Endereço 
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

// Cliente 
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$telefone_cont = $_POST['telefone_cont'];
$id_endereco = $conexao->lastInsertId();
$cadastrar = $conexao->prepare("INSERT INTO `cliente`(`nome_completo`, `telefone_celular`, `telefone_contato`, `endereco_id_endereco`, `login_id_login`) 
VALUES (:nome, :telefone, :telefone_cont, :endereco_id_endereco, :login_id_login)");

$cadastrar->execute(array(
    ':nome' => $nome,
    ':telefone' => $telefone,
    ':telefone_cont' => $telefone_cont,
    ':endereco_id_endereco' => $id_endereco,
    ':login_id_login' => $id_login
));

$id_cliente = $conexao->lastInsertId();

// Eletronico
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$numero = $_POST['numero'];
$descricao = $_POST['descricao'];
$cadastrar = $conexao->prepare("INSERT INTO `eletronico`(`modelo`, `marca`, `numero`, `descricao`) 
VALUES (:modelo, :marca, :numero, :descricao)");

$cadastrar->execute(array(
    ':modelo' => $modelo,
    ':marca' => $marca,
    ':numero' => $numero,
    ':descricao' => $descricao
));
$eletronico = $conexao->lastInsertId();

// Cliente e eletronico
$cadastrar = $conexao->prepare("INSERT INTO `cliente_eletronico`(cliente_id_cliente, eletronico_id_eletronico) VALUES (:cliente_id_cliente, :eletronico_id_eletronico)");
$cadastrar->execute(array(
    ':cliente_id_cliente' => $id_cliente,
    ':eletronico_id_eletronico' => $eletronico
));

// Reparo
$data_recebimento = $_POST['data_recebimento'];
$data_previsao = $_POST['DataPrevisao'];
$data_entrega = $_POST['dataEntrega'];
$observacao = $_POST['observacao'];
$mao_obra = $_POST['mao_obra'];
$custo_peca = $_POST['custo_peca'];
$valor_total = $mao_obra + $custo_peca;
//Status
$status = $_POST['status'];
//Tecnico
$tecnico = $_POST['id_tecnico'];

/* Fazendo o INSERT */
$cadastrar = $conexao->prepare("INSERT INTO `reparo`(`data_recebimento`, `data_previsao`, `data_entrega`, `observacao`, `mao_obra`, `custo_peca`,
 `valor_total`, `status_id_status`, `tecnico_id_tecnico`, `eletronico_id_eletronico`)  
VALUES (:data_recebimento, :data_previsao, :data_entrega, :observacao, :mao_obra, :custo_peca, :valor_total, :status_id_status, :tecnico_id_tecnico, :eletronico_id_eletronico);");

$cadastrar->execute(array(
    ':data_recebimento' => $data_recebimento,
    ':data_previsao' => $data_previsao,
    ':data_entrega' => $data_entrega,
    ':observacao' => $observacao,
    ':mao_obra' => $mao_obra,
    ':custo_peca' => $custo_peca,
    ':valor_total' => $valor_total,
    ':status_id_status' => $status,
    ':tecnico_id_tecnico' => $tecnico,
    ':eletronico_id_eletronico' => $eletronico
));

if ($cadastrar == true) {
    $_SESSION['msg'] = 'Cadastro feito com Sucesso!';
    echo "<script>alert( " . $_SESSION['msg'] . " );</script>";
    header("Location:../index.php");
} else {
    $_SESSION['erro'] = 'Não possivel Cadastrar, Verifique as informaçõe!';
    header('Location:../index.php');
}
}
else{
    echo "<script>alert('A senha não estão iguais')</script>";
}