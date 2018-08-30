<?php

class ProdutoDAO {

    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function InsereProduto(Produto $produto){

        $isbn = '';
        if ($produto->temISBN()){
          $isbn = $produto->getISBN();
        }

        $taxaImpressao = '';
        if ($produto->temTaxaImpressao()){
          $taxaImpressao = $produto->getTaxaImpressao();
        }

        $waterMark = '';
        if ($produto->temWaterMark()){
          $waterMark = $produto->getWaterMark();
        }

        $tipoProduto = get_class($produto);

        $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado, isbn, tipo_produto, taxa_impressao, water_mark)
                  VALUES (
                          '{$produto->getNome()}',
                           {$produto->getPreco()},
                          '{$produto->getDescricao()}',
                           {$produto->getCategoria()->getId()},
                           {$produto->isUsado()},
                          '{$isbn}',
                          '{$tipoProduto}',
                          '{$taxaImpressao}',
                          '{$waterMark}')";

        return mysqli_query($this->conexao, $query);

    }

    function ListaProdutos() {

      $produtos = array();
      $query = mysqli_query($this->conexao, "SELECT produtos.*, categoria.nome as categoria_nome FROM produtos
                              JOIN categoria ON categoria.id = produtos.categoria_id");

          while($resultado = mysqli_fetch_assoc($query)) {

              $tipoProduto = $resultado["tipo_produto"];
              //Criando a Factory
              $factory = new ProdutoFactory();
              $produto = $factory->CriaProduto($tipoProduto, $resultado);
              $produto->atualizaBaseadoEm($resultado);

              $produto->getCategoria()->setNome($resultado["categoria_nome"]);
              $produto->setId($resultado["id"]);

              array_push($produtos, $produto);
          }

      return $produtos;

    }

    function RemoveProduto($id) {

      return mysqli_query($this->conexao, "DELETE FROM produtos WHERE id = " . $id);

    }

    function BuscaProduto($id) {

      $query = mysqli_query($this->conexao, "SELECT * FROM produtos WHERE id = {$id}");

      $resultado = mysqli_fetch_assoc($query);

          $tipoProduto = $resultado["tipo_produto"];

          //Criando a factory
          $factory = new ProdutoFactory();
          $produto = $factory->CriaProduto($tipoProduto, $resultado);
          $produto->atualizaBaseadoEm($resultado);

          $produto->getCategoria()->setId($resultado["categoria_id"]);
          $produto->setId($resultado["id"]);

      return $produto;

    }

    function AlteraProduto(Produto $produto) {

      $isbn = '';
      if ($produto->temISBN()){
        $isbn = $produto->getISBN();
      }

      $taxaImpressao = '';
      if ($produto->temTaxaImpressao()){
        $taxaImpressao = $produto->getTaxaImpressao();
      }

      $waterMark = '';
      if ($produto->temWaterMark()){
        $waterMark = $produto->getWaterMark();
      }

      $tipoProduto = get_class($produto);

      $query = mysqli_query($this->conexao, "UPDATE produtos SET nome = '{$produto->getNome()}',
                                                                 preco = {$produto->getPreco()},
                                                                 descricao = '{$produto->getDescricao()}',
                                                                 categoria_id = {$produto->getCategoria()->getId()},
                                                                 usado = {$produto->isUsado()},
                                                                 isbn = '{$isbn}',
                                                                 tipo_produto = '{$tipoProduto}',
                                                                 taxa_impressao = '{$taxaImpressao}',
                                                                 water_mark = '{$waterMark}'
                                                                 WHERE id = {$produto->getId()}");
      return $query;

    }

}

 ?>
