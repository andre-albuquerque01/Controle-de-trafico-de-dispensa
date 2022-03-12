<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <script>
        function calcular() {
            var valor1 = parseFloat(document.getElementById('mao_obra').value);
            var valor2 = parseFloat(document.getElementById('custoDaPeca').value);
            document.getElementById('valor_total').value = parseFloat(valor1) + parseFloat(valor2);
        }
    </script>
    <h1>Reparo</h1>
    <form action="processa_reparo.php" method="POST">
        <label>Data de entrada</label><br />
        <input type="date" name="data_recebimento" id="" class="" require><br />
        <label>Data de previsão</label><br />
        <input type="date" name="DataPrevisao" id="" class="" require><br />
        <label>Data de entrega</label><br />
        <input type="date" name="dataEntrega" id="" class="" require><br />
        <label>Observacao</label><br />
        <textarea name="observacao" type="text" id="uf" size="2"></textarea><br />
        <label>Mão de obra</label><br />
        <input type="number" step="0.01" name="mao_obra" id="mao_obra" class="mao_obra" onfocus="calcular()" require><br />
        <label>Custo da peça</label><br />
        <input type="number" step="0.01" name="custoDaPeca" id="custoDaPeca" class="custoDaPeca" onblur="calcular()" require><br />
        <label>Valor total</label><br />
        <input type="number" step="0.01" onblur="calcular()" class="valor_total" id="valor_total" require><br />


        <?php
        session_start();
        $id = $_SESSION['session_id'];
        // Revelar os dados do db
        include_once 'conexao.php';
        $pesquisa = $conexao->query("SELECT * FROM `reparo` INNER JOIN tecnico ON reparo.tecnico_id_tecnico = tecnico.id_tecnico 
        INNER JOIN statu on reparo.status_id_status = statu.id_status 
        INNER JOIN eletronico on reparo.eletronico_id_eletronico = eletronico.id_eletronico 
        INNER JOIN cliente_eletronico ON eletronico.id_eletronico = cliente_eletronico.eletronico_id_eletronico 
        INNER JOIN cliente ON cliente_eletronico.cliente_id_cliente = cliente.id_cliente WHERE $id");

        while ($linha = $pesquisa->fetch()) {
            $id_tecnico = $linha['id_tecnico'];
            $tecnico = $linha['nome_tecnico'];
            $modelo = $linha['modelo'];
            $id_eletronio = $linha['id_eletronico'];
            $nome_status = $linha['nome_status'];
            $id_status = $linha['id_status'];
        }

        ?>
        <p>Seleciona o tecnico</p>
        <select name="id_tecnico" id="">
            <?php
            $id_tecnico = $conexao->query("SELECT * FROM tecnico WHERE $id");
            while ($consulta1 = $id_tecnico->fetch()) { ?>
                <option value="<?= $consulta1['id_tecnico'] ?>"><?= $consulta1['nome_tecnico'] ?></option>
            <?php }    ?>

        </select><br>
        <p>Seleciona o modelo</p>
        <select name="eletronico" id="">
            <?php
            $eletronico = $conexao->query("SELECT * FROM eletronico WHERE $id");
            while ($consulta2 = $eletronico->fetch()) { ?>
                <option value="<?= $consulta2['id_eletronico'] ?>"><?= $consulta2['modelo'] ?></option>
            <?php }    ?>
        </select><br>
        <p>Seleciona o status</p>
        <select name="status" id="">
            <?php
            $status = $conexao->query("SELECT * FROM statu");
            while ($consulta = $status->fetch()) { ?>
                <option value="<?= $consulta['id_status'] ?>"><?= $consulta['nome_status'] ?></option>
            <?php }    ?>
        </select><br>
        <input type="submit" name="" id="bottom" class="bottom">
    </form>

</body>

</html>