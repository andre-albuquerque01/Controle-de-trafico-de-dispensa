<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#2e8cc2">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="author" content="Marx JMoura">
    <meta name="copyright" content="Marx J. Moura">
    <meta name="description" content="Create more organized forms and making it even easier to navigate using tabs.">
    <title>Send email</title>
    <link rel="icon" href="../../images/ico/icone.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../../dist/admin4b.min.css?v=2.1.0" rel="stylesheet">
    <link href="../../dist/admin4b.min.css" rel="stylesheet" type="text/css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="app">
        <div class="app-sidebar">
            <div class="sidebar-header">
                <img src="../../images/principal3.png" width="70px" alt="Imagem de entrada"><br>
                <div class="username"><span>Bem vindo <?php session_start();
                                                        echo $_SESSION['nome_completo_login']; ?>!</span> <small><?php echo $_SESSION['email_usuario']; ?></small></div>
            </div>
            <div id="sidebar-nav" class="sidebar-nav">
                <ul>
                    <li><a href="../../model/index.php"><span class="sidebar-nav-icon fa fa-rocket"></span> <span class="sidebar-nav-text">Inicio</span></a></li>
                </ul>
                <hr><span class="sidebar-nav-header">Opções</span>
                <ul>
                    <li><a href="#forms" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-pencil-square-o"></span> <span class="sidebar-nav-text">Cadastrar</span></a>
                        <ul id="forms" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="../../model/forms/cadastro_cliente.php">Cliente</a></li>
                            <li><a href="../../model/forms/cadastro_tecnico.php">Tecnico</a></li>
                        </ul>
                    </li>
                    <li><a href="#search" data-toggle="collapse"><span class="sidebar-nav-icon fa fa-search"></span> <span class="sidebar-nav-text">Pesquisar</span></a>
                        <ul id="search" class="collapse" data-parent="#sidebar-nav">
                            <li><a href="../pesquisar/pesquisa_aparelho.php">Aparelho</a></li>
                            <li><a href="../pesquisar/pesquisa_cliente.php">Cliente</a></li>
                            <li><a href="../pesquisar/pesquisa_reparo.php">Reparo</a></li>
                            <li><a href="../pesquisar/pesquisa_tecnico.php">Tecnico</a></li>
                            <li><a href="../pesquisar/pesquisa_cliente_aparelho.php">Cliente e Aparelho</a></li>
                        </ul>
                    </li>
                </ul>
                <hr><span class="sidebar-nav-header">Configuração</span>
                <ul>
                    <li><a href="../../model/editar/configuracao_geral.php  "><span class="sidebar-nav-icon fa fa-cog"></span> <span class="sidebar-nav-text">Configuração</span></a>
                    </li>
                </ul>
                <hr>
                <ul>
                    <li><a href="../../controll/crud/sair.php"><span class="sidebar-nav-icon fa fa-power-off"></span> <span class="sidebar-nav-text">Log out</span></a></li>
                </ul>
                <hr>
                &nbsp;&nbsp;&nbsp;
                <small>Versão 1</small>
            </div>
        </div>
        <div class="app-content">

            <div class="content-body">
                <div class="container">
                    <a href="https://getbootstrap.com/docs/4.1/components/navs/#tabs"></a>
                    <a href="https://getbootstrap.com/docs/4.1/components/navs/#tabs"></a>
                    <a href="https://getbootstrap.com/docs/4.1/components/collapse/"></a>

                    <?php
                    include_once "../../controll/crud/verifica_login.php";
                    include_once '../../controll/crud/conexao.php';
                    $id_login = $_GET['id'];
                    $listar = $conexao->query("SELECT * FROM `cliente_eletronico` INNER JOIN cliente ON cliente.id_cliente = cliente_eletronico.cliente_id_cliente 
                    INNER JOIN login ON login.id_login = cliente.login_id_login WHERE cliente_eletronico.cliente_id_cliente = $id_login");
                    while ($revelar = $listar->fetch()) {
                        $nome_loja = $revelar['nome_loja'];
                        $email_usuario = $revelar['email_usuario'];
                        $email_cliente = $revelar['email_cliente'];
                    }
                    ?>
                    <div class="nav-tabs-responsive">
                        <div class="card">
                            <form action="../../controll/email/processa_email.php" method="POST">
                                <div id="tabContent" class="tab-content">
                                    <div id="account" class="tab-pane show active"><a href="#account-collapse" class="nav-link-collapse" data-toggle="collapse"><i class="fa fa-lock mr-2"></i> Account</a>
                                        <div id="account-collapse" class="collapse show" data-parent="#tabContent">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group"><label>Nome da loja</label> <input type="text" class="form-control" name="nome_loja" value="<?= $nome_loja ?>" required></div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group"><label>Email do cliente</label> <input type="text" class="form-control" name="email_cliente" value="<?= $email_cliente ?>" required></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group"><label>Assunto</label> <input type="text" class="form-control" name="assunto" value="Serviço concluído" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group"><label>Descrição</label>
                                                            <textarea class="form-control" name="descricao" required>O aparelho está disponível para retirada, já foi realizado o concerto.</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-lg-6">
                                                        <div class="form-group"><input type="hidden" class="form-control" name="email_usuario" value="<?= $email_usuario ?>" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="form-group"><button type="submit" class="btn btn-primary mr-1">Salvar</button> <button type="reset" class="btn btn-secondary">Cancelar</button></div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="../../dist/admin4b.min.js" type="text/javascript"></script>
</body>

</html>