<?php
// Inicia sessões, para assim poder destruí-las
session_start();
ob_start();
if (isset($_SESSION["id_login"])) {
    unset($_SESSION['id_login']);
    header("Location:../../index.php");
} else if (isset($_SESSION["id_controle"])) {
    unset($_SESSION['id_controle']);
    header("Location:../../index.php");
}
