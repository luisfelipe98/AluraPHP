<?php

class ProdutoFactory {

  private $classes = array("LivroFisico", "Ebook");

  public function CriaProduto($tipoProduto, $params) {

    $nome = $params["nome"];
    $preco = $params["preco"];
    $descricao = $params["descricao"];
    $categoria = new Categoria();
    $usado = $params["usado"];

    if (in_array($tipoProduto, $this->classes)) {
        return new $tipoProduto($nome, $preco, $descricao, $categoria, $usado);
    }

  }

}

 ?>
