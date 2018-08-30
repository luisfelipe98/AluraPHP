<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "loja";

$conexao = mysqli_connect($host, $user, $pass, $db);

if (!$conexao) {

    $msg = mysqli_error($conexao);
    echo "Houve um erro ao conectar com o Banco de Dados " . $msg;

}

?>
