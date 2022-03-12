<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');
include_once '../../../crud/conexao.php';
$email_usuario = $_POST['email_usuario'];
$nome_loja = $_POST['nome_loja'];
$assunto = $_POST['assunto'];
$descricao = $_POST['descricao'];
$today = date("d-m-Y");
date_default_timezone_set("America/Sao_Paulo");
$today2 = date("H:i:s");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'sistemadegereciamentos@gmail.com';
	$mail->Password = 'sistemasge2022';
	$mail->Port = 587;

	$mail->setFrom('sistemadegereciamentos@gmail.com');
	$mail->addAddress($email_usuario);

	$mail->isHTML(true);
	$mail->Subject = $assunto;
	$mail->Body = '<strong>' . $descricao . ' <i><u>' . $nome_loja . '</u></i>. Aguardamos a sua presença</strong><br>  <p> Chegou o email às' . $today . '</p><br> <h4>Não responda esse email</h4>';
	$mail->AltBody = 'Chegou o email no dia ' . $today . ' às '.$today2."\r\n".' <h4>Não responda esse email';

	if ($mail->send()) {
		echo 'Email enviado com sucesso';
	} else {
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}
