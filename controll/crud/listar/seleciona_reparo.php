<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reparo</title>
</head>

<body>
    <table border=1>
        <tbody>
            <tr class="text-center">
                <th>Data Recebimento</th>
                <th>Data Previsao</th>
                <th>Data Entrega</th>
                <th>Observacao</th>
                <th>Mao Obra</th>
                <th>Custo da Peça</th>
                <th>Valor Total</th>
            </tr>
            <?php
            include_once 'conexao.php';
            session_start();
            $id_session = $_SESSION['session_id'];
            //Está com a palavra diferente do original   (status) e estar como statu                                   
            // Revelar os dados do db
            $pesquisa = $conexao->query("SELECT * FROM `reparo` 
            INNER JOIN statu ON reparo.status_id_status = statu.id_status 
            INNER JOIN tecnico  ON reparo.tecnico_id_tecnico = tecnico.id_tecnico 
            INNER JOIN eletronico ON reparo.eletronico_id_eletronico = eletronico.id_eletronico 
            INNER JOIN endereco ON tecnico.endereco_id_endereco = endereco.id_endereco WHERE $id_session");
            while ($linha = $pesquisa->fetch()) {
                $id = $linha['id_reparo'];
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
                $nome = $linha['nome_tecnico'];
                $telefone = $linha['telefone_tecnico'];

                $cep = $linha['cep'];
                $cidade = $linha['cidade'];
                $uf = $linha['uf'];
                $bairro = $linha['bairro'];
                $rua = $linha['rua'];
                $complemento = $linha['complemento'];
                $nome_status = $linha['nome_status'];
                $modelo = $linha['modelo'];
                $marca = $linha['marca'];
                $numero = $linha['numero'];
                $descricao = $linha['descricao'];

            ?>



                <tr class="text-center">
                    <td><?= $data_converse1 ?> </td>
                    <td><?= $data_converse2 ?> </td>
                    <td><?= $data_converse3 ?> </td>
                    <td><?= $observacao ?> </td>
                    <td><?= $mao_obra ?> </td>
                    <td><?= $custo_peca ?> </td>
                    <td><?= $valor_total ?> </td>
                </tr>


                <tr class="text-center">
                    <th>Telefone</th>
                    <th>CEP</th>
                    <th>UF</th>
                    <th>Bairro</th>
                    <th>Rua</th>
                    <th>Complemento</th>
                    <th>Status</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Numero</th>
                    <th>Descricao</th>
                    <th> # </th>
                </tr>
                <tr class="text-center">
                    <td><?= $telefone ?> </td>
                    <td><?= $cep ?> </td>
                    <td><?= $uf ?> </td>
                    <td><?= $bairro ?> </td>
                    <td><?= $rua ?> </td>
                    <td><?= $complemento ?> </td>
                    <td><?= $nome_status ?> </td>
                    <td><?= $modelo ?> </td>
                    <td><?= $marca ?> </td>
                    <td><?= $numero ?> </td>
                    <td><?= $descricao ?> </td>
                    <td><a href="editar_Reparo.php?id=<?= ($id) ?>" type="submit"><i class="bi bi-pencil-square"></i> Editar</a>
                        <!--<a href="excluir_cliente.php?id=<?= $id ?>"><i class="bi bi-trash-fill"></i> Excluir</a>-->
                    </td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>