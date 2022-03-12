<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <table>
        <thead>
            <th></th>
        </thead>
        <tbody>
            <tr>
                <td>Nome</td>
                <td>Telefone</td>
                <td>CEP</td>
                <td>Cidade</td>
                <td>UF</td>
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
            $pesquisa = $conexao->query("SELECT * FROM tecnico INNER JOIN endereco ON endereco_id_endereco = id_endereco WHERE $id_session");
            while ($resultado = $pesquisa->fetch()) {
                $nome = $resultado['nome_tecnico'];
                $telefone = $resultado['telefone_tecnico'];
                $cep = $resultado['cep'];
                $cidade = $resultado['cidade'];
                $uf = $resultado['uf'];
                $bairro = $resultado['bairro'];
                $rua = $resultado['rua'];
                $complemento = $resultado['complemento'];
                $id = $resultado['id_tecnico'];

            ?>

                <tr class="text-center">
                    <td><?= $nome ?> </td>
                    <td><?= $telefone ?> </td>
                    <td><?= $cep ?> </td>
                    <td><?= $cidade ?> </td>
                    <td><?= $uf ?> </td>
                    <td><?= $bairro ?> </td>
                    <td><?= $rua ?> </td>
                    <td><?= $complemento ?> </td>
                    <td><a href="editar_tecnico.php?id=<?= $id ?>" type="submit"><i class="bi bi-pencil-square"></i> Editar</a>
                        <!--<a href="excluir_cliente.php?id=<?= $id ?>"><i class="bi bi-trash-fill"></i> Excluir</a>-->
                    </td>
                </tr>
        </tbody>
    <?php
            }
    ?>
    </table>
</body>

</html>