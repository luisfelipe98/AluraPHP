<?php
require_once("../Layout/cabecalho.php");
require_once("../Funcao/logica_usuario.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = new Usuario(); //Instanciando a classe Usuario
$usuario->setEmail($email);
$usuario->setSenha($senha);

$usuariodao = new UsuarioDao($conexao); //Instanciando a classe UsuarioDAO
$resul = $usuariodao->BuscaUsuario($usuario->getEmail(), $usuario->getSenha());

if (!$resul) {
  $_SESSION["danger"] = "Usuário ou senha inválidos";
  header("Location: ../Layout/index.php");
} else {
  $_SESSION["success"] = "Usuário logado com sucesso!!!";
  LogaUsuario($usuario->getEmail());
  header("Location: ../Layout/index.php");
}
die();
?>
