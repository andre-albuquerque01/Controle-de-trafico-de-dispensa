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
            $pesquisa = $conexao->query("SELECT * FROM  eletronico WHERE $id_session");
            while ($resultado = $pesquisa->fetch()) {
                $modelo = $resultado['modelo'];
                $marca = $resultado['marca'];
                $numero = $resultado['numero'];
                $descricao = $resultado['descricao'];
                $id = $resultado['id_eletronico'];

            ?>

                <tr class="text-center">
                    <td><?= $modelo ?> </td>
                    <td><?= $marca ?> </td>
                    <td><?= $numero ?> </td>
                    <td><?= $descricao ?> </td>
                    <td><a href="editar_eletronico.php?id=<?= $id ?>" type="submit"><i class="bi bi-pencil-square"></i> Editar</a>

                    </td>
                </tr>
        </tbody>
    <?php
            }
    ?>
    </table>
</body>

</html>