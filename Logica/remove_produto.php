<?php
require_once("../Layout/cabecalho.php");
$id = $_POST['id'];
$produtoDAO = new ProdutoDAO($conexao); //Instanciando a classe ProdutoDAO
$produtoDAO->RemoveProduto($id);
session_start();
$_SESSION["success"] = "Produto removido com sucesso!!!";
header("Location: ../Layout/produto_lista.php");
die();

?>
