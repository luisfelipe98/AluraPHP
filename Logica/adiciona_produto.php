<?php

function PassaISO($palavra) {

    //Transforma em ISO para corrigir acentos e outros caracteres
    return utf8_decode($palavra);

}
function ConferePreco($price) {

    //Procura a , para substituir por .
    return str_replace(",", ".", $price);

}

session_start(); //Começa a sessão
require_once("../Layout/cabecalho.php");
require_once("../Funcao/logica_usuario.php");

VerificaUsuario();

$tipoProduto = $_POST['tipoProduto'];

//Método para criar o objeto de sua respectiva classe
$factory = new ProdutoFactory();
$produto = $factory->CriaProduto($tipoProduto, $_POST);
//Método que cria propriedades específicas de acordo com o objeto
$produto->atualizaBaseadoEm($_POST);

$produto->getCategoria()->setId($_POST['categoria']);

//tratamento contra a não marcação do checkbox
if (array_key_exists("usado", $_POST)){
  $produto->setUsado("1");
}else{
  $produto->setUsado("0");
}

$produtoDAO = new ProdutoDAO($conexao); //Instanciando a classe ProdutoDAO

$resultado = $produtoDAO->InsereProduto($produto);

if ($resultado) {
   $_SESSION["success"] = "Produto adicionado com sucesso!!!";
   header("Location: ../Layout/produto_lista.php");
} else {
   $_SESSION["success"] = "Houve um erro ao adicionar o produto";
   header("Location: ../Layout/produto_lista.php");
}

die();

?>
