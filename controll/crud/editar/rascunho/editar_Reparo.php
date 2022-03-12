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
    include_once 'conexao.php';
    $id = $_GET['id'];
    // Revelar os dados do db
    $pesquisa = $conexao->query("SELECT * FROM `reparo` INNER JOIN tecnico ON reparo.tecnico_id_tecnico = tecnico.id_tecnico 
    INNER JOIN statu on reparo.status_id_status = statu.id_status 
    INNER JOIN eletronico on reparo.eletronico_id_eletronico = eletronico.id_eletronico 
    INNER JOIN cliente_eletronico ON eletronico.id_eletronico = cliente_eletronico.eletronico_id_eletronico 
    INNER JOIN cliente ON cliente_eletronico.cliente_id_cliente = cliente.id_cliente 
    WHERE  id_reparo = " . $id);

    while ($linha = $pesquisa->fetch()) {
        //Mudar para a data BR
        $data1 = $linha['data_recebimento'];
        $data_converse1 = date('d/m/Y', strtotime($data1));
        //Mudar para a data BR
        $data2 = $linha['data_previsao'];
        $data_converse2 = date('d/m/Y', strtotime($data2));
        //Mudar para a data BR
        $data3 = $linha['data_entrega'];
        $data_converse3 = date('d/m/Y', strtotime($data3));
        $observacao = $linha['observacao'];
        $mao_obra = $linha['mao_obra'];
        $custo_peca = $linha['custo_peca'];
        $valor_total = $linha['valor_total'];


        $id_tecnico = $linha['id_tecnico'];
        $tecnico = $linha['nome_tecnico'];
        $modelo = $linha['modelo'];
        $id_eletronio = $linha['id_eletronico'];
        $nome_status = $linha['nome_status'];
        $id_status = $linha['id_status'];

    ?>
        <form action="recebe_editar_reparo.php?id=<?= ($id) ?>" method="POST">
            <!-- Informações sobre o conserto -->
            <h4>Informações sobre o conserto</h4>
            <label>Data de recibimento</label><br>
            <input class="form-control" type="date" name="data_recebimento" placeholder="Data de recibimento" value="<?= $data_converse1 ?>" aria-label require><br>
            <label>Data de previsão</label><br>
            <input class="form-control" type="date" name="data_previsao" placeholder="Data de previsão" value="<?= $data_converse2 ?>" aria-label require><br>
            <label>Data de entrega</label><br>
            <input class="form-control" type="date" name="data_entrega" placeholder="Data de entrega" value="<?= $data_converse3 ?>" aria-label require><br>
            <label>Observação</label><br>
            <input class="form-control" type="text" name="observacao" placeholder="Observação" value="<?= $observacao ?>" aria-label require><br>
            <label>Mão de obra</label><br>
            <input class="form-control" type="number" step="0.01" name="mao_obra" placeholder="Mão de obra" value="<?= $mao_obra ?>" aria-label require><br>
            <label>Custo da peça</label><br>
            <input class="form-control" type="number" step="0.01" name="custo_peca" placeholder="Custo da peça" value="<?= $custo_peca ?>" aria-label require><br>

            <p>Seleciona o tecnico</p>
            <select name="id_tecnico" id="">
                <?php
                $id_tecnico = $conexao->query("SELECT * FROM tecnico");
                while ($consulta1 = $id_tecnico->fetch()) { ?>
                    <option value="<?= $consulta1['id_tecnico'] ?>"><?= $consulta1['nome_tecnico'] ?></option>
                <?php }    ?>
            </select><br>
            <p>Seleciona o modelo</p>
            <select name="eletronico" id="">
                <?php
                $eletronico = $conexao->query("SELECT * FROM eletronico");
                while ($consulta2 = $eletronico->fetch()) { ?>
                    <option value="<?= $consulta2['id_eletronico'] ?>"><?= $consulta2['modelo'] ?></option>
                <?php }    ?>
                <option value="<?= $id_eletronio ?>"><?= $modelo ?></option>
            </select><br>
            <p>Seleciona o status</p>
            <select name="status" id="">
                <?php
                $status = $conexao->query("SELECT * FROM statu");
                while ($consulta = $status->fetch()) { ?>
                    <option value="<?= $consulta['id_status'] ?>"><?= $consulta['nome_status'] ?></option>
                <?php }    ?>
                <!--<option value="<?= 1 ?>">Concluido</option>
                <option value="<?= 2 ?>">Em processo</option>-->
            </select><br>
        <?php
    }
        ?>
        <button type="submit" class="btn btn-primary">Editar</button>
        </form>
</body>

</html>