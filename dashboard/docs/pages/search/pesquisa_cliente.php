<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#2e8cc2">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="author" content="Marx JMoura">
    <meta name="copyright" content="Marx J. Moura">
    <meta name="description" content="Create more organized forms and making it even easier to navigate using tabs.">
    <title>Admin 4B · Tabbed form</title>
    <link rel="icon" href="/docs/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../../../../../dist/admin4b.min.css?v=2.1.0" rel="stylesheet">
    <link href="../../../docs/assets/css/custom.css" rel="stylesheet">
    <link href="../../assets/css/custom.css" rel="stylesheet">
    <link href="../../../dist/admin4b.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="app">
        <div class="app-sidebar">
            <div class="sidebar-header"><svg class="avatar">
                    <use href="assets/img/faces.svg" />
                </svg>
                <div class="username"><span>John Doe</span> <small>john_doe@email.com</small></div>
            </div>
            <div id="sidebar-nav" class="sidebar-nav">

                <hr><span class="sidebar-nav-header">Guideline</span>
                <ul>
                    <li><a href="#forms" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-pencil-square-o"></span> <span class="sidebar-nav-text">Cadastrar</span></a>
                        <ul id="forms" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="./pages/forms/cadastro_cliente.php">Cliente</a></li>
                           <!--<li><a href="../forms/cadastro_aparelho.php">Aparelho</a></li>
                            <li><a href="../forms/cadastro_reparo.php">Reparo</a></li>-->
                            <li><a href="./pages/forms/cadastra_tecnico.php">Tecnico</a></li>
                        </ul>
                    </li>
                    <li><a href="#search" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-search"></span> <span class="sidebar-nav-text">Pesquisar</span></a>
                        <ul id="search" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="pesquisa_cliente.php">Cliente</a></li>
                            <li><a href="pesquisa_aparelho.php">Aparelho</a></li>
                            <li><a href="pesquisa_reparo.php">Reparo</a></li>
                            <li><a href="pesquisa_tecnico.php">Tecnico</a></li>
                            <li><a href="pesquisa_cliente_aparelho.php">Cliente e Aparelho</a></li>
                        </ul>
                    </li>
                    <!--
                    <li><a href="#input-controls" data-toggle="collapse"><span
                                class="sidebar-nav-icon fa fa-pencil"></span> <span
                                class="sidebar-nav-text">Editar</span></a>
                        <ul id="input-controls" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="../editar/editar_cliente.html" disabled="disabled">Editar cliente</a></li>
                            <li><a href="../editar/editar_tecnico.html">Editar técnico</a></li>
                            <li><a href="../editar/editar_aparelho.html">Editar aparelho</a></li>
                            <li><a href="../editar/editar_reparo.html">Editar aparelho</a></li>
                        </ul>
                    </li>-->
                    <li><a href="#layout" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-clone"></span> <span class="sidebar-nav-text">Layout</span></a>
                        <ul id="layout" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="pages/layout/sidebar.html">Sidebar</a></li>
                            <li><a href="pages/layout/spinner.html">Spinner</a></li>
                            <li><a href="pages/layout/table.html">Table</a></li>
                        </ul>
                    </li>

                </ul>
                <hr><span class="sidebar-nav-header">Configuração</span>
                <ul>
                    <li><a href="../editar/configuracao_geral.php  "><span class="sidebar-nav-icon fa fa-cog"></span> <span class="sidebar-nav-text">Configuração</span></a>
                    </li>
                </ul>
                <hr>
                <ul>
                    <li><a href="./crud/sair.php"><span class="sidebar-nav-icon fa fa-power-off"></span> <span class="sidebar-nav-text">Log out</span></a></li>
                </ul>
            </div>
        </div>
        <div class="app-content">
            <div class="content-header">
                <nav class="navbar navbar-expand navbar-light bg-white">
                    <div class="navbar-brand"><button type="button" class="btn btn-sidebar" data-toggle="sidebar"><i class="fa fa-bars"></i></button> <span class="pr-2">Admin 4B</span> <a href="https://github.com/marxjmoura/admin4b" class="text-dark decoration-none" data-toggle="tooltip" data-placement="right" title="Fork me on GitHub"><i class="fa fa-github"></i></a></div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="badge badge-pill badge-primary">3</span> <i class="fa fa-bell-o"></i></a>
                            <div class="dropdown-menu dropdown-menu-right"><a href="pages/content/notification.html" class="dropdown-item"><small class="dropdown-item-title">Lorem ipsum (today)</small><br>
                                    <div>Lorem ipsum dolor sit amet...</div>
                                </a>
                                <div class="dropdown-divider"></div><a href="pages/content/notification.html" class="dropdown-item"><small class="text-muted">Lorem ipsum (yesterday)</small><br>
                                    <div>Lorem ipsum dolor sit amet...</div>
                                </a>
                                <div class="dropdown-divider"></div><a href="pages/content/notification.html" class="dropdown-item"><small class="text-muted">Lorem ipsum (12/25/2017)</small><br>
                                    <div>Lorem ipsum dolor sit amet...</div>
                                </a>
                                <div class="dropdown-divider"></div><a href="pages/content/notifications.html" class="dropdown-item dropdown-link">See all notifications</a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Get started</li>
                    </ol>
                </nav>
            </div>

            <div class="content-body">
                <div class="container">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <h1>Listar</h1>
                            </div>
                        </div>
                        <div class="row">
                            <!--<div class="col-sm-6 col-md-6">
                                <form class="form-inline" method="POST" action="">
                                   <div class="form-group">
                                        Filtro &nbsp;
                                        <select name="filtro" id="" class="form-control" placeholder="FILTRO">
                                            <optgroup label="Filtro">s</optgroup>
                                            <option value="1">Modelo crescente</option>
                                            <option value="2">Modelo decrescente</option>
                                        </select>
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                                </form>
                            </div>-->
                            <div class="col-sm-1 col-md-5">
                                <form class="form-inline" method="GET" action="../pesquisar/pesquisa_cliente.php">
                                    <div class="form-group"> Pesquisa &nbsp;
                                        <input type="text" name="pesquisa" class="form-control" id="exampleInputName2" placeholder="Pesquise o cliente" style="margin-right: 10px;">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="align-items-center" style="margin-top: 2em;">
                        <div class="">
                            <p>Cliente</p>
                            <table class="table table-bordered table-hover text-center">
                                <tr class="bg bg-primary text-white text-center">
                                    <td>Nome</td>
                                    <td>Telefone</td>
                                    <td>CEP</td>
                                    <td>UF</td>
                                    <td>Cidade</td>
                                    <td>Bairro</td>
                                    <td>Rua</td>
                                    <td>Complemento</td>
                                    <td> # </td>
                                </tr>

                                <?php
                                include_once '../../crud/conexao.php';
                                //$id_session = $_SESSION['session_id'];
                                // Receber o numero da pagina  
                                //$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                                if (isset($_GET['pg']) && $_GET['pg'] != "") {
                                    $pagina_atual = $_GET["pg"];
                                } else {
                                    $pagina_atual = 1;
                                }
                                if (isset($pagina_atual)) {
                                    $pagina_atual = $pagina_atual;
                                } else {
                                    $pagina_atual = 1;
                                }
                                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                                //Setar a quantidade de itens da pagina
                                $qtd_pg = 20;
                                //Vizualização 
                                $inicio = ($qtd_pg * $pagina) - $qtd_pg;
                                /* if ($_POST['filtro'] == 2) {
                                    $pesquisa = $conexao->query("SELECT * FROM cliente INNER JOIN endereco ON endereco_id_endereco = id_endereco ORDER BY nome_completo DESC LIMIT $inicio, $qtd_pg");
                                    if ($pesquisa && $pesquisa->rowCount() != 0) {
                                        while ($tabela = $pesquisa->fetch()) {
                                            $nome = $tabela['nome_completo'];
                                            $telefone = $tabela['telefone_celular'];
                                            $cep = $tabela['cep'];
                                            $cidade = $tabela['cidade'];
                                            $uf = $tabela['uf'];
                                            $bairro = $tabela['bairro'];
                                            $rua = $tabela['rua'];
                                            $complemento = $tabela['complemento'];
                                            $id = $tabela['id_cliente'];

                            ?>

                                <tr class="text-center">
                                    <td>
                                        <?= $nome ?>
                                    </td>
                                    <td>
                                        <?= $telefone ?>
                                    </td>
                                    <td>
                                        <?= $cep ?>
                                    </td>
                                    <td>
                                        <?= $cidade ?>
                                    </td>
                                    <td>
                                        <?= $uf ?>
                                    </td>
                                    <td>
                                        <?= $bairro ?>
                                    </td>
                                    <td>
                                        <?= $rua ?>
                                    </td>
                                    <td>
                                        <?= $complemento ?>
                                    </td>
                                    <td><a href="../editar/editar_cliente.php?id=<?= $id ?>" type="submit"><i class="bi bi-pencil-square"></i>
                                            Editar</a>
                                        <a href="../see/ver.php?id=<?= $id ?>"><i class="bi bi-trash-fill"></i>Ver</a>
                                    </td>
                                </tr>
                            <?php
                                        }
                            ?>
                            </table>
                            <?php
                                        $select = $conexao->query("SELECT COUNT(id_cliente) AS num_result FROM cliente");
                                        $row_pg = $select->fetch();
                                        //echo $row_pg['num_result'];
                                        //Quantidade de paginas 
                                        $quantidade_pg = ceil($row_pg['num_result'] / $qtd_pg);
                                        //Limitar os links antes e depois
                                        // $max_links = 4;
                                        $max_links = 2;
                                        echo "<a href='?pg=$qtd_pg' onclick='pesquisa_cliente'>Primeira</a> ";
                                        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                                            if ($pag_ant >= 1) {
                                                echo " <a href='?pg=$pag_ant' onclick=''>$pag_ant </a> ";
                                            }
                                        }
                                        echo " $pagina ";
                                        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                                            if ($pag_dep <= $quantidade_pg) {
                                                echo " <a href='?pg=$pag_dep' onclick=''>$pag_dep</a> ";
                                            }
                                        }
                                        echo " <a href='?pg=$quantidade_pg' onclick=''>Última</a>";
                                    } else {
                                        echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
                                    }
                                } else {
                                    */
                                    $pesquisa = $conexao->query("SELECT * FROM cliente INNER JOIN endereco ON endereco_id_endereco = id_endereco ORDER BY nome_completo ASC LIMIT $inicio, $qtd_pg");
                                    if ($pesquisa && $pesquisa->rowCount() != 0) {
                                        while ($tabela = $pesquisa->fetch()) {
                                            $nome = $tabela['nome_completo'];
                                            $telefone = $tabela['telefone_celular'];
                                            $cep = $tabela['cep'];
                                            $cidade = $tabela['cidade'];
                                            $uf = $tabela['uf'];
                                            $bairro = $tabela['bairro'];
                                            $rua = $tabela['rua'];
                                            $complemento = $tabela['complemento'];
                                            $id = $tabela['id_cliente'];

                            ?>

                                <tr class="text-center">
                                    <td>
                                        <?= $nome ?>
                                    </td>
                                    <td>
                                        <?= $telefone ?>
                                    </td>
                                    <td>
                                        <?= $cep ?>
                                    </td>
                                    <td>
                                        <?= $cidade ?>
                                    </td>
                                    <td>
                                        <?= $uf ?>
                                    </td>
                                    <td>
                                        <?= $bairro ?>
                                    </td>
                                    <td>
                                        <?= $rua ?>
                                    </td>
                                    <td>
                                        <?= $complemento ?>
                                    </td>
                                    <td><a href="../editar/editar_cliente.php?id=<?= $id ?>" type="submit"><i class="bi bi-pencil-square"></i>
                                            Editar</a>
                                        <a href="../see/ver.php?id=<?= $id ?>"><i class="bi bi-trash-fill"></i>Ver</a>
                                    </td>
                                </tr>
                            <?php
                                        }

                            ?>
                            </table>
                    <?php
                                        $select = $conexao->query("SELECT COUNT(id_cliente) AS num_result FROM cliente");
                                        $row_pg = $select->fetch();
                                        //echo $row_pg['num_result'];
                                        //Quantidade de paginas 
                                        $quantidade_pg = ceil($row_pg['num_result'] / $qtd_pg);
                                        //Limitar os links antes e depois
                                        // $max_links = 4;
                                        $max_links = 2;
                                        
                                           //echo "<a href='?pg=$qtd_pg' onclick='pesquisa_cliente'>Primeira</a> ";
                                       
                                        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                                            if ($pag_ant >= 1) {
                                                echo " <a href='?pg=$pag_ant' onclick=''>$pag_ant </a> ";
                                            }
                                        }
                                        echo " $pagina ";
                                        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                                            if ($pag_dep <= $quantidade_pg) {
                                                echo " <a href='?pg=$pag_dep' onclick=''>$pag_dep</a> ";
                                            }
                                        }
                                        echo " <a href='?pg=$quantidade_pg' onclick=''>Última</a>";
                                    } else {
                                        echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
                                    }
                                
                    ?>
                        </div>
                    </div>

                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
            <script src="../../../dist/admin4b.min.js" type="text/javascript"></script>
            <script src="../../assets/js/docs.js"></script>
</body>

</html>