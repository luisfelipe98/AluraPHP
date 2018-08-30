<?php
require_once("conecta.php");

function BuscaUsuario($conexao, $email, $senha) {
   $senhamd5 = md5($senha); //Transforma em md5 a senha do usuario
   //var_dump($senhamd5);
   $email = mysqli_real_escape_string($conexao, $email); //Evitar SQL Injection
   $query = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '{$email}' AND senha = '{$senhamd5}'");
   return mysqli_fetch_assoc($query);

}

 ?>
