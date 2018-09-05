<?php

class UsuarioDAO {

  private $conexao;

  function __construct($conexao) {
    $this->conexao = $conexao;
  }

  public function BuscaUsuario($email, $senha) {

     $usuario = new Usuario(); //Instanciando a classe Usuario
     $usuario->setEmail($email);
     $usuario->setSenha($senha);

     $senhamd5 = md5($usuario->getSenha()); //Transforma em md5 a senha do usuario
     $email = mysqli_real_escape_string($this->conexao, $usuario->getEmail()); //Evitar SQL Injection

     $query = mysqli_query($this->conexao, "SELECT * FROM usuarios WHERE email = '{$email}' AND senha = '{$senhamd5}'");

     return mysqli_fetch_assoc($query);
  }

}

?>
