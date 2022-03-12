<?php
include_once '../conexao.php';
if (isset($_POST['modelo'])) {
    // Recebe o id do usuario
    $id_vindo = $_GET['id'];
    //Informações do eletronico
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $numero = $_POST['numero'];
    $descricao = $_POST['descricao'];

    $editar = $conexao->prepare("UPDATE `eletronico` SET modelo=:modelo,marca=:marca,
numero=:numero,descricao=:descricao WHERE eletronico.id_eletronico = $id_vindo");
    $editar->execute(array(
        ':modelo' => $modelo,
        ':marca' => $marca,
        ':numero' => $numero,
        ':descricao' => $descricao
    ));
    if ($editar == TRUE) {
        // $_SESSION['msg'] = 'Edição feita com Sucesso!';
        echo "<script>alert('Edição feita com Sucesso!');</script>";
        echo "<script>window.location.href='../../../view/pesquisar/pesquisa_aparelho.php';</script>";
    } else {
        // $_SESSION['erro'] = 'Não possivel editar, Verifique as informações!';
        echo "<script>alert('Não possivel editar, Verifique as informações!');</script>";
        echo "<script>window.location.href='../../../view/pesquisar/pesquisa_aparelho.php';</script>";
    }
} else {
    echo "<script>alert('Não possivel editar, Verifique as informações!');</script>";
    echo "<script>window.location.href='../../../view/pesquisar/pesquisa_aparelho.php';</script>";
}
