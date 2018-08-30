<?php
session_start(); //Começa a Sessão
function UsuarioEstaLogado () {
  return isset($_SESSION["usuario_logado"]);
}

function VerificaUsuario () {

  //Checka se NÃO existe um usuario logado antes de cadastrar o produto
  if (!UsuarioEstaLogado()) {
    $_SESSION["danger"] = "Você não tem acesso a essa funcionalidade.";
    header ("Location: index.php");
    die();
  }

}

function UsuarioLogado () {
  return $_SESSION["usuario_logado"];
}

function LogaUsuario ($email) {
 $_SESSION["usuario_logado"] = $email;

}

function Logout () {
  session_destroy();
  session_start();
}

?>
