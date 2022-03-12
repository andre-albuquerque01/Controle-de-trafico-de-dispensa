<?php
include_once '../conexao.php';

$nome = $_POST['nome'];
if(isset($nome)!= null){
$verificar = $conexao->query("SELECT * FROM cliente INNER JOIN endereco ON endereco_id_endereco = id_endereco WHERE nome_completo =".$nome);

if($verificar->rowCount() > 0){
    header('Location:seleciona_cliente.php');
}
else{
    echo "<script>alert 'Não foi possível'</script>";
}
}