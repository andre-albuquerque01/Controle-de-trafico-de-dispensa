<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <?php
    include 'layout.php';
    ?>
</head>

<body>
    <?php
    include_once 'session.php';
    if (isset($_SESSION['msg']) != null) {
        echo "<script> Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: '" . $_SESSION['msg'] . "',
        showConfirmButton: false,
        timer: 1500
        }) </script>";
        $_SESSION['msg'] = null;
    } else if (isset($_SESSION['erro']) != null) {
        echo "<script> Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '" . $_SESSION['erro'] . "',
        }) </script>";
        $_SESSION['erro'] = null;
    }
    ?>
<!--
    <div id="items-wrapper">
        <div id="items">
            <div class="item"><img src="./imagens/logo.png" alt=""></div>
            <div class="item"><img src="./imagens/logo_man.jpg" alt=""></div>
            <div class="item"><img src="./imagens/mobile-phone-g5931122ff_1920.jpg" alt=""></div>
            <div class="item"><img src="" alt=""></div>
        </div>
    </div>
    <div class="gallery autoplay items-3">
        <div id="item-1" class="control-operator"></div>
        <div id="item-2" class="control-operator"></div>
        <div id="item-3" class="control-operator"></div>

        <figure class="item">
            <h1><img src="./imagens/logo.png" alt=""></h1>
        </figure>

        <figure class="item">
            <h1><img src="./imagens/logo_man.jpg" alt=""></h1>
        </figure>

        <figure class="item">
            <h1><img src="./imagens/mobile-phone-g5931122ff_1920.jpg" alt=""></h1>
        </figure>

        <div class="controls">
            <a href="#item-1" class="control-button">•</a>
            <a href="#item-2" class="control-button">•</a>
            <a href="#item-3" class="control-button">•</a>
        </div>
    </div>-->

    <a href="cliente.php">Cliente</a>
    <a href="eletronico.php">Eletronico</a>
    <a href="tecnico.php">Tecnico</a>
    <a href="reparo.php">Reparo</a>
    <a href="seleciona_cliente_reparo.php">Selecionar Cliente e reparo</a>
    <a href="seleciona_cliente.php">Selecionar Cliente</a>
    <a href="seleciona_eletronico.php">Seleciona Eletronico</a>
    <a href="seleciona_reparo.php">Selecionar Reparo</a>
    <a href="seleciona_tecnico.php">Selecionar Tecnico</a>
</body>

</html>