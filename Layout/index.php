<?php require_once("cabecalho.php"); ?>
<?php require_once("logica_usuario.php"); ?>
<?php MostraAlerta("success");
MostraAlerta("danger"); ?>
<?php if(UsuarioEstaLogado()) { ?>
  <p>Você tá logado como <?php echo UsuarioLogado(); ?></p>
  <a href="logout.php">Deslogar</a>
<?php } else { ?>
  <h2>Login</h2>
  <form action="login.php" method="POST">
        Email
        <input type="email" name="email">
        Senha
        <input type="password" name="senha">
        <input type="submit" value="Entrar">
  </form>
<?php } ?>
<?php require_once("rodape.php"); ?>
