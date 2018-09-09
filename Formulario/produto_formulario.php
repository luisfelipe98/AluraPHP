<?php
require_once("../Layout/cabecalho.php");
require_once("../Funcao/logica_usuario.php");

VerificaUsuario();

//Iniciando para não dar problemas
$categoria = new Categoria();
$categoria->setId(1);
$produto = new LivroFisico("", "", "", $categoria, "");

?>
  <form action="../Logica/adiciona_produto.php" method="POST">
    <?php require_once("../Layout/produto_formulario_base.php"); ?>
    <input type="submit" value="Cadastrar">
  </form>
<?php require_once("../Layout/rodape.php");?>
