<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Load Roboto font -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Load css styles -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/pluton.css" />
    <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
    <link rel="stylesheet" type="text/css" href="../css/jquery.cslider.css" />
    <link rel="stylesheet" type="text/css" href="../css/jquery.bxslider.css" />
    <link rel="stylesheet" type="text/css" href="../css/animate.css" />
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../images/ico/icone.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../images/ico/icone.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../images/ico/icone.png">
    <link rel="apple-touch-icon-precomposed" href="../images/ico/icone.png">
    <link rel="shortcut icon" href="../images/ico/icone.png">
</head>

<body>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a href="../index.php" class="brand">
                    <img src="../images/principal.png" width="120" height="40" alt="Logo" />
                    <!-- This is website logo -->
                </a>
                <!-- Navigation button, visible on small resolution -->
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <i class="icon-menu"></i>
                </button>
                <!-- Main navigation -->
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav" id="top-navigation">
                        <li class="active"><a href="../index.php">Home</a></li>
                        <li><a href="../index.php?#service">Serviços</a></li>
                        <!--<li><a href="#portfolio">Portfolio</a></li>-->
                        <li><a href="../index.php?#portfolio">Lojas</a></li>
                        <li><a href="../index.php?#clients">Clientes</a></li>
                        <!--<li><a href="#price">Price</a></li>-->
                        <li><a href="../index.php?#contact">Contatos</a></li>
                    </ul>
                </div>
                <!-- End main navigation -->
            </div>
        </div>
    </div>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #363636;
        }

        form {
            padding: 30px;
            margin: 0;
        }

        footer p {
            background-color: #000000;
            padding: 0;
            text-align: center;
            float: center;
        }
    </style>
    <form action="../controll/crud/cadastro/processa_login_controle.php" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1" style="color:#FFD700; font-size: large;">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Insira email" style="height: 30px; width: 250px;" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" style="color:#FFD700; font-size: large;">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Insira a senha" style="height: 30px; width: 250px;" required>
        </div>
        <button type="submit" class="btn btn-warning" name="SendLogin">Submit</button>
    </form>
    <footer>
        <div class="footer">
            <p>&copy;SGE 2022</p>
        </div>
    </footer>
</body>

</html>