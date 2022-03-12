<!DOCTYPE html>
<html lang="pt-br">

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
                <td>Telefone 1</td>
                <td>Telefone 2</td>
                <td>Modelo</td>
                <td>Marca</td>
                <td>Numero</td>
                <td>Descricao</td>
                <td> # </td>
            </tr>

            <?php
            // Revelar os dados do db
            include_once 'conexao.php';
            session_start();
            $id_session = $_SESSION['session_id'];
            $pesquisa = $conexao->query("SELECT * FROM cliente_eletronico INNER JOIN cliente ON cliente.id_cliente = cliente_eletronico.cliente_id_cliente 
            INNER JOIN eletronico ON eletronico.id_eletronico = cliente_eletronico.eletronico_id_eletronico WHERE $id_session");
            while ($resultado = $pesquisa->fetch()) {
                $nome = $resultado['nome_completo'];
                $telefone = $resultado['telefone_celular'];
                $telefone2 = $resultado['telefone_contato'];
                $modelo = $resultado['modelo'];
                $marca = $resultado['marca'];
                $numero = $resultado['numero'];
                $descricao = $resultado['descricao'];
                $id = $resultado['cliente_id_cliente'];

            ?>

                <tr class="text-center">
                    <td><?= $nome ?> </td>
                    <td><?= $telefone ?> </td>
                    <td><?= $telefone2 ?> </td>
                    <td><?= $modelo ?> </td>
                    <td><?= $marca ?> </td>
                    <td><?= $numero ?> </td>
                    <td><?= $descricao ?> </td>
                    <td><a href="editar_eletronico.php?id=<?= ($id) ?>" type="submit"><i class="bi bi-pencil-square"></i>Editar eletronico</a>
                        <a href="editar_cliente.php?id=<?= ($id) ?>" type="submit"><i class="bi bi-pencil-square"></i>Editar cliente</a>

                    </td>
                </tr>
        </tbody>
    <?php
            }
    ?>
    </table>
</body>

</html>