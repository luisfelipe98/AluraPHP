<?php
require_once("../Funcao/logica_usuario.php");
Logout();
$_SESSION["success"] = "Deslogado com sucesso!!!";
header("Location: ../Layout/index.php");
die();
?>
