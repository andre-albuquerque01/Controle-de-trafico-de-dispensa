<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    $_SESSION['session_id'];
}
/*
session_start();
$_SESSION['cadastrado'] = "Cadastrado com sucesso";
$_SESSION['erro'] = "Houve erro na execução";
$_SESSION['alterar'] = "Aleterado com sucesso";*/