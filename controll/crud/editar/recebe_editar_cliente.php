<?php
include_once '../conexao.php';
if (isset($_POST['nome'])) {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $email_cliente = $_POST['email_cliente'];
    $telefone = $_POST['telefone'];
    $telefone_cont = $_POST['telefone_cont'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $complemento = $_POST['complemento'];


    $editar = $conexao->prepare("UPDATE cliente JOIN endereco ON cliente.endereco_id_endereco = endereco.id_endereco SET cliente.nome_completo= :nome, cliente.email_cliente = :email_cliente,
cliente.telefone_celular=:telefone, cliente.telefone_contato=:telefone_cont, endereco.cep = :cep, endereco.cidade = :cidade, endereco.uf=:uf, 
endereco.bairro= :bairro, endereco.rua=:rua, endereco.complemento=:complemento WHERE cliente.id_cliente =$id");
    $editar->execute(array(
        ':nome' => $nome,
        ':email_cliente' => $email_cliente,
        ':telefone' => $telefone,
        ':telefone_cont' => $telefone_cont,
        ':cep' => $cep,
        ':cidade' => $cidade,
        ':uf' => $uf,
        ':bairro' => $bairro,
        ':rua' => $rua,
        ':complemento' => $complemento
    ));
    if ($editar == TRUE) {
        // $_SESSION['msg'] = 'Edição feita com Sucesso!';
        echo "<script>alert('Edição feita com Sucesso!');</script>";
        echo "<script>window.location.href ='../../../view/pesquisar/pesquisa_cliente.php'</script>";
    } else {
        // $_SESSION['erro'] = 'Não possivel editar, Verifique as informações!';
        echo "<script>alert('Não possivel editar, Verifique as informações!');</script>";
        echo "<script>window.location.href ='../../../view/pesquisar/pesquisa_cliente.php'</script>";
    }
} else {
    echo "<script>alert('Não possivel editar, Verifique as informações!');</script>";
    echo "<script>window.location.href ='../../../view/pesquisar/pesquisa_cliente.php'</script>";
}
