<?php
require_once("mostra_alerta.php");
require_once("Db/conecta.php");
error_reporting(E_ALL ^ E_NOTICE); //Todos os "erros" NOTICE, ele não mostra para o usuário

// Função que adiciona as classes
function CarregaClasse($nomedaclasse) {
    require_once("Class/". $nomedaclasse . ".php");
}

spl_autoload_register("CarregaClasse"); //Registra a função para ser auto carregada
?>
<html>
<head>
  <title>Minha Loja</title>
</head>
<body>
  <header>
    <nav></nav>

  </header>
