<?php

abstract class Produto {

    //Atributos
    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $usado;

    //Construtor
    function __construct($nome, $preco, $descricao, Categoria $categoria, $usado) {

        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usado = $usado;

    }

        //Métodos
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function isUsado() {
        return $this->usado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsado($usado) {
        $this->usado = $usado;
    }

    public function temISBN() {
        return $this instanceof Livro;
    }

    public function temTaxaImpressao() {
        return $this instanceof LivroFisico;
    }

    public function temWaterMark() {
        return $this instanceof Ebook;
    }

    public function CalculaImposto() {
        return $this->preco * 0.195;
    }

    abstract function atualizaBaseadoEm($params);

}

?>
