<?php
require_once("cabecalho.php");
require_once("logica_usuario.php");

VerificaUsuario();

//Iniciando para não dar problemas
$categoria = new Categoria();
$categoria->setId(1);
$produto = new LivroFisico("", "", "", $categoria, "");

?>
  <form action="adiciona_produto.php" method="POST">
    <?php include("produto_formulario_base.php"); ?>
    <input type="submit" value="Cadastrar">
  </form>
<?php include("rodape.php");?>
