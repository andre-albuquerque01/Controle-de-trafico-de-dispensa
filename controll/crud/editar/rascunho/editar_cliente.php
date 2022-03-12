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
    $pesquisa = $conexao->query("SELECT * FROM cliente INNER JOIN endereco ON endereco_id_endereco = id_endereco WHERE cliente.id_cliente = $id_vindo");
    while ($tabela = $pesquisa->fetch()) {
        $nome = $tabela['nome_completo'];
        $telefone = $tabela['telefone_celular'];
        $telefone2 = $tabela['telefone_contato'];
        $cep = $tabela['cep'];
        $uf = $tabela['uf'];
        $cidade = $tabela['cidade'];
        $bairro = $tabela['bairro'];
        $rua = $tabela['rua'];
        $complemento = $tabela['complemento'];
        $id = $tabela['id_cliente'];

    ?>

        <form action="recebe_editar_cliente.php?id=<?= ($id) ?>" method="POST">
            <!-- Informações sobre o conserto -->
            <h4>Informações do cliente</h4>
            <label>Nome</label>
            <input type="text" name="nome" id="" class="" value="<?= $nome ?>" require><br />
            <label>Telefone celular</label>
            <input type="number" name="telefone" id="" class="" value="<?= $telefone ?>" require><br />
            <label>Telefone de comercial</label>
            <input type="number" name="telefone_cont" id="" class="" value="<?= $telefone2 ?>" require><br />
            <label>Cep:</label><br />
            <input name="cep" type="text" id="" size="20" maxlength="9" value="<?= $cep ?>" require><br />
            <label>UF:</label><br />
            <select name="uf">
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amapá</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="DF">Distrito Federal</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
            </select><br/>
            <label>Rua:</label><br/>
            <input name="rua" type="text" id="" size="20" value="<?= $rua ?>" require /><br/>
            <label>Bairro:</label><br />
            <input name="bairro" type="text" id="" size="20" value="<?= $bairro ?>" require /><br/>
            <label>Cidade:</label><br />
            <input name="cidade" type="text" id="" size="20" value="<?= $cidade ?>" require /><br/>
            <label>Complemento:</label><br />
            <input name="complemento" type="text" id="" size="20" value="<?= $complemento ?>" /><br/>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    <?php
    }
    ?>
</body>

</html>