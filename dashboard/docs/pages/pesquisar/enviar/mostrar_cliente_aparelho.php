<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#2e8cc2">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="author" content="Marx JMoura">
    <meta name="copyright" content="Marx J. Moura">
    <meta name="description" content="Create more organized forms and making it even easier to navigate using tabs.">
    <title>Pesquisa cliente e aparelho</title>
    <link rel="icon" href="/docs/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../../../../../../dist/admin4b.min.css?v=2.1.0" rel="stylesheet">
    <link href="../../../docs/../assets/css/custom.css" rel="stylesheet">
    <link href="../../../assets/css/custom.css" rel="stylesheet">
    <link href="../../../../dist/admin4b.min.css" rel="stylesheet" type="text/css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="app">
        <div class="app-sidebar">
            <div class="sidebar-header"><svg class="avatar">
                    <use href="assets/img/faces.svg" />
                </svg>
                <div class="username"><span>Bem vindo <?php session_start();
                                                        echo $_SESSION['nome_completo_login']; ?>!</span> <small><?php echo $_SESSION['email_usuario']; ?></small></div>
            </div>
            <div id="sidebar-nav" class="sidebar-nav">
                <ul>
                    <li><a href="../../../index.php"><span class="sidebar-nav-icon fa fa-rocket"></span> <span class="sidebar-nav-text">Inicio</span></a></li>
                </ul>
                <hr><span class="sidebar-nav-header">Opções</span>
                <ul>
                    <li><a href="#forms" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-pencil-square-o"></span> <span class="sidebar-nav-text">Cadastrar</span></a>
                        <ul id="forms" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="../../forms/cadastro_cliente.php">Cliente</a></li>
                            <!--<li><a href="./pages/forms/cadastro_aparelho.html">Aparelho</a></li>
                            <li><a href="./pages/forms/cadastro_reparo.html">Reparo</a></li>-->
                            <li><a href="../../forms/cadastro_tecnico.php">Tecnico</a></li>
                        </ul>
                    </li>
                    <li><a href="#search" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-search"></span> <span class="sidebar-nav-text">Pesquisar</span></a>
                        <ul id="search" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="../pesquisa_cliente.php">Cliente</a></li>
                            <li><a href="../pesquisa_aparelho.php">Aparelho</a></li>
                            <li><a href="../pesquisa_reparo.php">Reparo</a></li>
                            <li><a href="../pesquisa_tecnico.php">Tecnico</a></li>
                            <li><a href="../pesquisa_cliente_aparelho.php">Cliente e Aparelho</a></li>
                        </ul>
                    </li>
                </ul>
                <hr><span class="sidebar-nav-header">Configuração</span>
                <ul>
                    <li><a href="../../editar/configuracao_geral.php "><span class="sidebar-nav-icon fa fa-cog"></span> <span class="sidebar-nav-text">Configuração</span></a>
                    </li>
                </ul>
                <hr>
                <ul>
                    <li><a href="../../../../crud/sair.php"><span class="sidebar-nav-icon fa fa-power-off"></span> <span class="sidebar-nav-text">Log out</span></a></li>
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
                        echo $_SESSION['nome_completo_login'];
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
                            <div class="col-sm-6 col-md-6">
                                <h1>Listar</h1>
                            </div>
                            <div class="col-sm-1 col-md-5">
                                <form class="form-inline" method="GET" action="">
                                    <div class="form-group">
                                        <input type="text" name="pesquisar" id="pesquisa" class="form-control" placeholder="Pesquise o cliente" style="margin-right: 10px;" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <a href="../pesquisa_cliente_aparelho.php"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="align-items-center">
                        <div class="">
                            <p>Cliente</p>
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
                                include_once "../../../crud/verifica_login.php";
                                include_once '../../../crud/conexao.php';
                                $id_session = $_SESSION['id_login'];
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
                                if (!isset($_GET['pesquisar'])) {
                                    echo "<script>location.href ='../pesquisa_cliente_aparelho.php'</script>";
                                } else {
                                    $valor_pesquisar = $_GET['pesquisar'];
                                }
                                $consulta = $conexao->query("SELECT * FROM cliente_eletronico INNER JOIN cliente ON cliente.id_cliente = cliente_eletronico.cliente_id_cliente 
                                        INNER JOIN eletronico ON eletronico.id_eletronico = cliente_eletronico.eletronico_id_eletronico INNER JOIN login ON cliente.login_id_login = login.id_login 
                                        WHERE cliente.login_id_login = $id_session AND cliente.nome_completo LIKE '%$valor_pesquisar%' OR eletronico.modelo LIKE '%$valor_pesquisar%'");
                                if ($consulta && $consulta->rowCount() != 0) {
                                    while ($resultado = $consulta->fetch(PDO::FETCH_ASSOC)) {
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
                                            <td>
                                                <a href="../../editar/editar_cliente.php?id=<?= $id_cliente ?>" type="submit"><i class="bi bi-pencil-square"></i>Editar cliente</a>
                                                <a href="../../editar/editar_aparelho.php?id=<?= $id_eletronico ?>" type="submit"><i class="bi bi-pencil-square"></i>Editar eletronico </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </table>
                        <?php
                                    $select = $conexao->query("SELECT COUNT(cliente_id_cliente) AS num_result FROM cliente_eletronico INNER JOIN cliente ON cliente.id_cliente = cliente_eletronico.cliente_id_cliente 
                                        INNER JOIN eletronico ON eletronico.id_eletronico = cliente_eletronico.eletronico_id_eletronico INNER JOIN login ON cliente.login_id_login = login.id_login WHERE cliente.login_id_login = $id_session AND cliente.nome_completo LIKE '%$valor_pesquisar%'");
                                    $row_pg = $select->fetch();
                                    //echo $row_pg['num_result'];
                                    //Quantidade de paginas 
                                    $quantidade_pg = ceil($row_pg['num_result'] / $qtd_pg);
                                    //Limitar os links antes e depois
                                    $max_links = 2;

                                    //echo "<a href='?pg=$qtd_pg' onclick='pesquisa_cliente'>Primeira</a> ";

                                    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
                                        if ($pag_ant >= 1) {
                                            echo " <a href='?pg=$pag_ant&pesquisar=$valor_pesquisar' onclick=''>$pag_ant </a> ";
                                        }
                                    }
                                    echo " $pagina ";
                                    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                                        if ($pag_dep <= $quantidade_pg) {
                                            echo " <a href='?pg=$pag_dep&pesquisar=$valor_pesquisar' onclick=''>$pag_dep</a> ";
                                        }
                                    }
                                    echo " <a href='?pg=$quantidade_pg&pesquisar=$valor_pesquisar' onclick=''>Última</a>";
                                } else {
                                    echo "<script>alert('Nenhum usuário encontrado!')</script>";
                                    echo "<script>location.href ='../pesquisa_cliente_aparelho.php'</script>";
                                }
                        ?>
                        </div>
                    </div>

                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
            <script src="../../../../dist/admin4b.min.js" type="text/javascript"></script>
            <script src="../../../assets/js/docs.js"></script>
</body>

</html>