<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#2e8cc2">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="author" content="Marx JMoura">
    <meta name="copyright" content="Marx J. Moura">
    <meta name="description" content="Create more organized forms and making it even easier to navigate using tabs.">
    <title>Cadastro aparelho</title>
    <link rel="icon" href="/docs/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../../../../../dist/admin4b.min.css?v=2.1.0" rel="stylesheet">
    <link href="../../../docs/assets/css/custom.css" rel="stylesheet">
    <link href="../../assets/css/custom.css" rel="stylesheet">
    <link href="../../../dist/admin4b.min.css" rel="stylesheet" type="text/css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="app">
        <div class="app-sidebar">
            <div class="sidebar-header"><svg class="avatar">
                    <use href="/docs/assets/img/faces.svg#john" />
                </svg>
                <div class="username"><span>Bem vindo <?php session_start();
                                                        echo $_SESSION['nome_completo_login']; ?>!</span> <small><?php echo $_SESSION['email_usuario']; ?></small></div>
            </div>
            <div id="sidebar-nav" class="sidebar-nav">
                <ul>
                    <li><a href="../../index.php"><span class="sidebar-nav-icon fa fa-rocket"></span> <span class="sidebar-nav-text">Inicio</span></a></li>
                </ul>
                <hr><span class="sidebar-nav-header">Opções</span>
                <ul>
                    <li><a href="#forms" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-pencil-square-o"></span> <span class="sidebar-nav-text">Cadastrar</span></a>
                        <ul id="forms" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="cadastro_cliente.php">Cliente</a></li>
                            <!-- <li><a href="cadastro_aparelho.php">Aparelho</a></li>
                            <li><a href="cadastro_reparo.php">Reparo</a></li>-->
                            <li><a href="cadastro_tecnico.php">Tecnico</a></li>
                        </ul>
                    </li>
                    <li><a href="#search" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-search"></span> <span class="sidebar-nav-text">Pesquisar</span></a>
                        <ul id="search" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="../pesquisar/pesquisa_cliente.php">Cliente</a></li>
                            <li><a href="../pesquisar/pesquisa_aparelho.php">Aparelho</a></li>
                            <li><a href="../pesquisar/pesquisa_reparo.php">Reparo</a></li>
                            <li><a href="../pesquisar/pesquisa_tecnico.php">Tecnico</a></li>
                            <li><a href="../pesquisar/pesquisa_cliente_aparelho.php">Cliente e Aparelho</a></li>
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
                    <li><a href="../../crud/sair.php"><span class="sidebar-nav-icon fa fa-power-off"></span>
                            <span class="sidebar-nav-text">Log out</span></a></li>
                </ul>
                <hr>
                &nbsp;&nbsp;&nbsp;
                <small>Versão 1</small>
            </div>
        </div>
        <div class="app-content">
            <div class="content-header">

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Forms</li>
                        <li class="breadcrumb-item">Cadastro eletrônico</li>
                    </ol>
                </nav>
            </div>
            <div class="content-body">
                <div class="container">
                    <a href="https://getbootstrap.com/docs/4.1/components/navs/#tabs"></a>
                    <a href="https://getbootstrap.com/docs/4.1/components/navs/#tabs"></a>
                    <a href="https://getbootstrap.com/docs/4.1/components/collapse/"></a>

                    <div class="nav-tabs-responsive">
                        <div class="card">
                            <?php
                            include_once "../../crud/verifica_login.php";
                            $id = $_GET['id'];
                            ?>
                            <form action="../../crud/cadastro/processa_eletronico.php?id=<?= $id ?>" method="post">
                                <div id="tabContent" class="tab-content">
                                    <div id="account" class="tab-pane show active"><a href="#account-collapse" class="nav-link-collapse" data-toggle="collapse"><i class="fa fa-lock mr-2"></i> Account</a>
                                        <div id="account-collapse" class="collapse show" data-parent="#tabContent">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group"><label>Modelo</label> <input type="text" class="form-control" name="modelo" required></div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group"><label>Marca</label> <input type="text" class="form-control" name="marca" required></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group"><label>Numero</label> <input type="text" class="form-control" name="numero" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group"><label>Descrição</label> <input type="text" class="form-control" name="descricao"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="form-group"><button type="submit" class="btn btn-primary mr-1">PROXIMO</button> <button type="reset" class="btn btn-secondary">Cancelar</button></div>

                </div>
            </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="../../../dist/admin4b.min.js" type="text/javascript"></script>
    <script src="../../assets/js/docs.js"></script>
</body>

</html>