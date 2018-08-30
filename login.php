<?php
require_once("banco_usuario.php");
require_once("logica_usuario.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = BuscaUsuario($conexao, $email, $senha);

if (!$usuario) {
  $_SESSION["danger"] = "Usuário ou senha inválidos";
  header("Location: index.php");
} else {
  $_SESSION["success"] = "Usuário logado com sucesso!!!";
  LogaUsuario($usuario["email"]);
  header("Location: index.php");
}
die();
?>
