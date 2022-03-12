<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#2e8cc2">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="author" content="Marx JMoura">
    <meta name="copyright" content="Marx J. Moura">
    <meta name="description" content="Admin 4B is an open source and free admin template built on top of Bootstrap 4. Quickly customize with our Sass variables and mixins.">
    <title>Cliente</title>
    <link rel="icon" href="../../../images/ico/icone.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../../../dist/admin4b.min.css?v=2.1.0" rel="stylesheet">
    <link href="../../../dist/admin4b.min.css" rel="stylesheet" type="text/css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="app">
        <div class="app-sidebar">
            <div class="sidebar-header">
                <img src="../../../images/principal3.png" width="70px" alt="Imagem de entrada"><br>
                <div class="username"><span>Bem vindo <?php session_start();
                                                        echo $_SESSION['nome_completo']; ?>!</span> <small><?php echo $_SESSION['email_usuario']; ?></small></div>
            </div>
            <div id="sidebar-nav" class="sidebar-nav">
                <ul>
                    <li><a href="../../controle.php"><span class="sidebar-nav-icon fa fa-rocket"></span> <span class="sidebar-nav-text">Inicio</span></a></li>
                </ul>
                <hr><span class="sidebar-nav-header">Opções</span>
                <ul>
                    <li><a href="#forms" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-pencil-square-o"></span> <span class="sidebar-nav-text">Cadastrar</span></a>
                        <ul id="forms" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="../../model/forms/cadastro_usuario.php">Usuario</a></li>
                        </ul>
                    </li>
                    <li><a href="#search" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-search"></span> <span class="sidebar-nav-text">Pesquisar</span></a>
                        <ul id="search" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="../pesquisar/pesquisa_aparelho.php">Aparelho</a></li>
                            <li><a href="../pesquisar/pesquisa_cliente.php">Cliente</a></li>
                            <li><a href="../pesquisar/pesquisa_reparo.php">Reparo</a></li>
                            <li><a href="../pesquisar/pesquisa_tecnico.php">Tecnico</a></li>
                            <li><a href="../pesquisar/pesquisa_cliente_aparelho.php">Cliente e Aparelho</a></li>
                            <li><a href="../pesquisar/pesquisa_usuario.php">Usuario</a></li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <ul>
                    <li><a href="../../../controll/crud/sair.php"><span class="sidebar-nav-icon fa fa-power-off"></span> <span class="sidebar-nav-text">Log out</span></a></li>
                </ul>
                <hr>
                &nbsp;&nbsp;&nbsp;
                <small>Versão 1</small>
            </div>
        </div>
        <div class="app-content">
            <div class="content-header">
                <nav class="navbar navbar-expand navbar-light bg-white">
                    <div class="navbar-brand">
                        <?php
                        date_default_timezone_set("America/Sao_Paulo");
                        $date = date("H:i:s");
                        $hora_do_dia = date("H");
                        if (($hora_do_dia >= 00) && ($hora_do_dia <= 12)) {
                            echo "Bom dia, ";
                        } else if (($hora_do_dia >= 12) && ($hora_do_dia <= 18)) {
                            echo "Boa tarde, ";
                        } else {
                            echo "Boa noite, ";
                        }
                        echo $_SESSION['nome_completo'];
                        ?>!
                    </div>
                </nav>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Get started</li>
                        <span id="conteudo"></span>
                    </ol>
                </nav>
            </div>
            <div class="content-body">
                <div class="container">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <?php
                                include_once "../../../controll/crud/verifica_controle.php";
                                include_once '../../../controll/crud/conexao.php';
                                $id_vindo = $_GET['id'];
                                ?>
                                <form class="form-inline" method="POST" action="../../model/adiconar_forms/adicionar.php?id=<?= $id_vindo ?>">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Adicionar</button>
                                </form>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <form action="formulario_email.php?id=<?= $id_vindo ?>" method="POST">
                                    <div>
                                        <button type="submit" class="btn btn-warning"><i class="fa fa-paper-plane" aria-hidden="true"></i> Avisar</button>
                                    </div>
                                </form>
                            </div>
                        </div> <br>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <?php
                                $pesquisa = $conexao->query("SELECT * FROM `reparo` INNER JOIN statu ON reparo.status_id_status = statu.id_status 
                                INNER JOIN tecnico  ON reparo.tecnico_id_tecnico = tecnico.id_tecnico INNER JOIN eletronico ON reparo.eletronico_id_eletronico = eletronico.id_eletronico 
                                INNER JOIN endereco ON tecnico.endereco_id_endereco = endereco.id_endereco 
                                INNER JOIN cliente_eletronico ON cliente_eletronico.eletronico_id_eletronico = eletronico.id_eletronico WHERE cliente_eletronico.cliente_id_cliente =  $id_vindo");
                                while ($linha = $pesquisa->fetch()) {
                                    $id = $linha['id_reparo'];
                                }
                                ?>
                                <form class="form-inline" method="POST" action="../../model/editar/editar_aparelho_wreparo_data.php?id=<?= $id ?>">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-question" aria-hidden="true"></i> Entregue?</button>
                                </form>
                            </div>
                        </div>
                        <div class="align-items-center" style="margin-top: 2em;">
                            <div class="">
                                <p>Clientes e os aparelhos</p>
                                <table class="table table-bordered table-hover text-center">
                                    <tr class="bg bg-primary text-white text-center">
                                        <td>Nome</td>
                                        <td>Telefone</td>
                                        <td>Telefone Comercial</td>
                                        <td>Modelo</td>
                                        <td>Marca</td>
                                        <td>Numero</td>
                                        <td>Descricao</td>
                                        <td> # </td>
                                    </tr>

                                    <?php
                                    $pesquisa = $conexao->query("SELECT * FROM cliente_eletronico INNER JOIN cliente ON cliente.id_cliente = cliente_eletronico.cliente_id_cliente 
                                INNER JOIN eletronico ON eletronico.id_eletronico = cliente_eletronico.eletronico_id_eletronico INNER JOIN login ON cliente.login_id_login = login.id_login WHERE cliente.id_cliente = $id_vindo");
                                    while ($resultado = $pesquisa->fetch()) {
                                        $nome = $resultado['nome_completo'];
                                        $telefone = $resultado['telefone_celular'];
                                        $telefone2 = $resultado['telefone_contato'];
                                        $modelo = $resultado['modelo'];
                                        $marca = $resultado['marca'];
                                        $numero = $resultado['numero'];
                                        $descricao = $resultado['descricao'];
                                        $id_cliente = $resultado['cliente_id_cliente'];
                                        $id_eletronico = $resultado['eletronico_id_eletronico'];

                                    ?>

                                        <tr class="text-center">
                                            <td><?= $nome ?> </td>
                                            <td><?= $telefone ?> </td>
                                            <td><?= $telefone2 ?> </td>
                                            <td><?= $modelo ?> </td>
                                            <td><?= $marca ?> </td>
                                            <td><?= $numero ?> </td>
                                            <td><?= $descricao ?> </td>
                                            <td><a href="../../model/editar/editar_cliente.php?id=<?= $id_cliente ?>" type="submit"><i class="bi bi-pencil-square"></i>Editar cliente</a>
                                                <a href="../../model/editar/editar_aparelho.php?id=<?= $id_eletronico ?>" type="submit"><i class="bi bi-pencil-square"></i>Editar eletronico</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>

                            </div>
                        </div>

                        <div class="align-items-center">
                            <div class="" style="margin-top: 2em">
                                <p>Reparo</p>
                                <table class="table table-bordered table-hover text-center">
                                    <tr class="bg bg-primary text-white text-center">
                                        <th>Data Recebimento</th>
                                        <th>Data Entrega</th>
                                        <th>Observacao</th>
                                        <th>Valor Total</th>
                                        <th>Status</th>
                                        <th>Modelo</th>
                                        <th>Marca</th>
                                        <th>Numero</th>
                                        <th>#</th>
                                    </tr>
                                    <?php
                                    // Revelar os dados do db
                                    $pesquisa = $conexao->query("SELECT * FROM `reparo` INNER JOIN statu ON reparo.status_id_status = statu.id_status 
                                INNER JOIN tecnico  ON reparo.tecnico_id_tecnico = tecnico.id_tecnico INNER JOIN eletronico ON reparo.eletronico_id_eletronico = eletronico.id_eletronico 
                                INNER JOIN endereco ON tecnico.endereco_id_endereco = endereco.id_endereco 
                                INNER JOIN cliente_eletronico ON cliente_eletronico.eletronico_id_eletronico = eletronico.id_eletronico WHERE cliente_eletronico.cliente_id_cliente =  $id_vindo");
                                    while ($linha = $pesquisa->fetch()) {
                                        $id = $linha['id_reparo'];
                                        //Mudar para a data BR
                                        $data1 = $linha['data_recebimento'];
                                        $data_recebimento = date('d/m/Y', strtotime($data1));
                                        //Mudar para a data BR
                                        $data3 = $linha['data_entrega'];
                                        $data_entrega = date('d/m/Y', strtotime($data3));
                                        $observacao = $linha['observacao'];
                                        $valor_total = $linha['valor_total'];
                                        $nome = $linha['nome_tecnico'];

                                        $nome_status = $linha['nome_status'];
                                        $modelo = $linha['modelo'];
                                        $marca = $linha['marca'];
                                        $numero = $linha['numero'];
                                    ?>

                                        <tr class="text-center">
                                            <td>
                                                <?= $data_recebimento ?>
                                            </td>
                                            <td>
                                                <?= $data_entrega ?>
                                            </td>
                                            <td>
                                                <?= $observacao ?>
                                            </td>
                                            <td>
                                                <?= $valor_total ?>
                                            </td>
                                            <td>
                                                <?= $nome_status ?>
                                            </td>
                                            <td>
                                                <?= $modelo ?>
                                            </td>
                                            <td>
                                                <?= $marca ?>
                                            </td>
                                            <td>
                                                <?= $numero ?>
                                            </td>
                                            <td>
                                                <a href="../../model/editar/editar_aparelho_reparo.php?id=<?= ($id) ?>" type="submit"><i class="bi bi-pencil-square"></i>Editar</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
                <script src="../../../dist/admin4b.min.js" type="text/javascript"></script>
</body>

</html>