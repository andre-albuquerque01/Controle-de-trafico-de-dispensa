<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <table border=1>
        <tr>
            <td>Nome</td>
            <td>Telefone 1</td>
            <td>Telefone 2</td>
            <td>CEP</td>
            <td>UF</td>
            <td>Cidade</td>
            <td>Bairro</td>
            <td>Rua</td>
            <td>Complemento</td>
            <td> # </td>
        </tr>

        <?php
        // Revelar os dados do db
        include_once 'conexao.php';
        session_start();
        $id_session = $_SESSION['session_id'];
        $pesquisa = $conexao->query("SELECT * FROM cliente INNER JOIN endereco ON endereco_id_endereco = id_endereco WHERE $id_session");
        while ($tabela = $pesquisa->fetch()) {
            $nome = $tabela['nome_completo'];
            $telefone = $tabela['telefone_celular'];
            $telefone2 = $tabela['telefone_contato'];
            $cep = $tabela['cep'];
            $cidade = $tabela['cidade'];
            $uf = $tabela['uf'];
            $bairro = $tabela['bairro'];
            $rua = $tabela['rua'];
            $complemento = $tabela['complemento'];
            $id = $tabela['id_cliente'];

        ?>

            <tr class="text-center">
                <td><?= $nome ?> </td>
                <td><?= $telefone ?> </td>
                <td><?= $telefone2 ?> </td>
                <td><?= $cep ?> </td>
                <td><?= $cidade ?> </td>
                <td><?= $uf ?> </td>
                <td><?= $bairro ?> </td>
                <td><?= $rua ?> </td>
                <td><?= $complemento ?> </td>
                <td><a href="editar_cliente.php?id=<?= $id ?>" type="submit"><i class="bi bi-pencil-square"></i> Editar</a>
                    <!--<a href="excluir_cliente.php?id=<?= $id ?>"><i class="bi bi-trash-fill"></i> Excluir</a>-->
                </td>
          </tr>  
<?php
        }
?>

    </table>
</body>

</html>