<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reparo</title>
</head>

<body>
    <?php
    $id_vindo = $_GET['id'];

    // Revelar os dados do db
    include_once 'conexao.php';
    $pesquisa = $conexao->query("SELECT * FROM tecnico INNER JOIN endereco ON tecnico.endereco_id_endereco = endereco.id_endereco WHERE tecnico.id_tecnico = $id_vindo");
    while ($tabela = $pesquisa->fetch()) {
        $nome = $tabela['nome_tecnico'];
        $telefone = $tabela['telefone_tecnico'];
        $cep = $tabela['cep'];
        $cidade = $tabela['cidade'];
        $uf = $tabela['uf'];
        $bairro = $tabela['bairro'];
        $rua = $tabela['rua'];
        $complemento = $tabela['complemento'];
        $id = $tabela['id_tecnico'];

    ?>

        <form action="recebe_editar_tecnico.php?id=<?= $id ?>" method="POST">
            <!-- Informações sobre o conserto -->
            <h4>Informações do tecnico</h4>
            <label>Nome</label><br />
            <input type="text" name="nome" id="name" class="name" value="<?= $nome ?>" require><br />
            <label>Telefone celular</label><br />
            <input type="number" name="telefone" id="telefone" class="telefone" value="<?= $telefone ?>" require><br />
            <label>Cep:</label><br />
            <input name="cep" type="text" id="cep" size="20" maxlength="9" value="<?= $cep ?>" require><br />
            <label>Rua:</label><br />
            <input name="rua" type="text" id="rua" size="20" value="<?= $rua ?>" require /><br />
            <label>Bairro:</label><br />
            <input name="bairro" type="text" id="bairro" size="20" value="<?= $bairro ?>" require /><br />
            <label>Cidade:</label><br />
            <input name="cidade" type="text" id="cidade" size="20" value="<?= $cidade ?>" require /><br />
            <label>Complemento:</label><br />
            <input name="complemento" type="text" id="uf" size="20" value="<?= $complemento ?>"><br />

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    <?php
    }
    ?>
</body>

</html>