<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title></title>

    <!-- BOOSTRAP -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FONTES GOOGLE -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- JS-->
    <script src="/js/script.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="nav-link">
                    <img src="./imagens/logo.png" alt="logo">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Entrar</a>
                    </li>
                   <!-- <li class="nav-item">
                        <a href="#" class="nav-link">Cadastrar</a>
                    </li>
                    <li class="nav-item">
                    <?php
                    if(session_start() !== PHP_SESSION_ACTIVE){  ?>  
                    <form action="/" method="POST">
                            <a href="/" class="nav-link" onclick="event.preventDefault(); 
                            this.closest('form').submit();">
                                Sair
                            </a>
                        </form>
                        <?php   
                    }
                    ?>
                    </li>-->
                </ul>
            </div>
        </nav>
    </header>
    
    <footer>
        <p>&copy;SGE 2021</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>