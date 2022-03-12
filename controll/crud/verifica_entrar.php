<?php
// if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['id_login']) == null) {
    // echo "<script>window.location.href ='../../model/index.php'</script>";  
    echo "<script>alert('Necessário realizar o login para acessar a página!');</script>";
}