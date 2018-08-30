<?php
require_once("cabecalho.php");

$id = $_GET["id"];
$produtoDAO = new ProdutoDAO($conexao); //Instanciando a classe ProdutoDAO
$produto = $produtoDAO->BuscaProduto($id);
$selecao_usado = $produto->isUsado() ? "checked='checked'" : "";
$produto->setUsado($selecao_usado);

?>
  <form action="altera_resposta.php" method="POST">
    <?php include("produto_formulario_base.php"); ?>
    <input type="submit" value="Alterar">
  </form>
<?php include("rodape.php");?>
