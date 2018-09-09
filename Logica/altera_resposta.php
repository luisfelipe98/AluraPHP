<?php
require_once("../Layout/cabecalho.php");
session_start(); //Começa a sessão

function PassaISO($palavra) {

    //Transforma em ISO para corrigir acentos e outros caracteres
    return utf8_decode($palavra);

}

function ConferePreco($price) {

    //Procura a , para substituir por .
    return str_replace(",", ".", $price);

}

$tipoProduto = $_POST['tipoProduto'];

//Instanciando a Factory
$factory = new ProdutoFactory();
//Criando o objeto de acordo com o seu tipo
$produto = $factory->CriaProduto($tipoProduto, $_POST);
//Setando características específicas de acordo com o objeto
$produto->atualizaBaseadoEm($_POST);

//tratamento contra a não marcação do checkbox
if (array_key_exists('usado', $_POST)){
  $produto->setUsado("1");
}else{
  $produto->setUsado("0");
}

$produto->setId($_POST['id']);
$produto->getCategoria()->setId($_POST['categoria']);

$produtoDAO = new ProdutoDAO($conexao); //Instanciando a classe ProdutoDAO

$resultado = $produtoDAO->AlteraProduto($produto);

if ($resultado) {
    $_SESSION["success"] = "Produto alterado com sucesso!!!";
    header("Location: ../Layout/produto_lista.php");
} else {
    $_SESSION["danger"] = "Houve um erro ao alterar o produto";
    header("Location: ../Layout/produto_lista.php");
 }

die();

?>
