<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <?php
    $id_vindo = $_GET['id'];
    // Revelar os dados do db
    include_once 'conexao.php';
    $pesquisa = $conexao->query("SELECT * FROM `eletronico` WHERE eletronico.id_eletronico = $id_vindo");
    while ($resultado = $pesquisa->fetch()) {
        $id = $resultado['id_eletronico'];
        $modelo = $resultado['modelo'];
        $marca = $resultado['marca'];
        $numero = $resultado['numero'];
        $descricao = $resultado['descricao'];

    ?>
        <h1>Alterar Eletronico</h1>
        <form action="recebe_editar_eletronico.php?id=<?= $id ?>" method="POST">
            <label>Modelo</label><br>
            <input type="text" name="modelo" id="" class="" value="<?= $modelo ?>" require><br>
            <label>Marca</label><br>
            <input type="text" name="marca" id="" class="" value="<?= $marca ?>" require><br>
            <label for="">Numero</label><br>
            <input type="number" name="numero" id="" class="" value="<?= $numero ?>" require><br>
            <label for="">Descrição</label><br>
            <input name="descricao" type="tex" id="uf" size="20" value="<?= $descricao ?>" ><br>
            <input type="submit" name="" id="bottom" class="bottom">
        </form>
    <?php
    }
    ?>
</body>

</html>