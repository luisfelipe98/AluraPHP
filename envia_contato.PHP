<?php
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

require_once("OAuth.php");

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = true;
$mail->Username = "alura.php.e.mysql@gmail.com";
$mail->Password = 123456;

$mail->setFrom("alura.php.e.mysql@gmail.com", "Alura Curso PHP e MySQL");
$mail->setAddress("luisfelipe9834zika@gmail.com");
$mail->Subject = "Email de contato da loja";
$mail->msgHTML("<html>De: {$nome}<br>Email: {$email}<br>Mensagem: {$mensagem}</html>");
$mail->AltBody = "De:{$nome}\nPara:{$email}\nMensagem:{$mensagem}";

if($mail->send()) {
  $_SESSION['success'] = "Mensagem enviada com sucesso";
  header("Location: index.php");
}else{
  $_SESSION['danger'] = "Houve um erro ao enviar sua mensagem\n" . $mail->ErrorInfo;
  header("Location: contato.php");
}
die();
?>
