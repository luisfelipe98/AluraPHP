<?php
require_once("../Layout/cabecalho.php");

$id = $_GET["id"];
$produtoDAO = new ProdutoDAO($conexao); //Instanciando a classe ProdutoDAO
$produto = $produtoDAO->BuscaProduto($id);
$selecao_usado = $produto->isUsado() ? "checked='checked'" : "";
$produto->setUsado($selecao_usado);

?>
  <form action="../Logica/altera_resposta.php" method="POST">
    <?php require_once("../Layout/produto_formulario_base.php"); ?>
    <input type="submit" value="Alterar">
  </form>
<?php require_once("../Layout/rodape.php");?>
