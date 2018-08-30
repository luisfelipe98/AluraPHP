<?php require_once("cabecalho.php"); ?>
<form action="envia_contato.php" method="POST">
Nome
<input type="text" name="nome">
Email
<input type="email" name="email">
Mensagem
<textarea name="mensagem"></textarea>
<input type="submit" value="Enviar">
</form>
<?php require_once("rodape.php"); ?>
