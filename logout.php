<?php
require_once("logica_usuario.php");
Logout();
$_SESSION["success"] = "Deslogado com sucesso!!!";
header("Location: index.php");
die();
?>
