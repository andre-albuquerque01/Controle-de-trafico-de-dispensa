<?php
$email_usuario = $_POST['email_usuario'];
$email_loja = $_POST['email_loja'];
$assunto = $_POST['assunto'];
$descricao = $_POST['descricao'];

$destino = $email_usuario;
$assunto = $assunto;
$mensagem = $descricao;
$headers = 'From: '.$email_loja . "\r\n" .
    'Reply-To: '.$email_loja . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($para, $assunto, $mensagem, $headers)){
    echo "Email enviado para ".$para;
}else{
    echo "Falha ao enviar";
}