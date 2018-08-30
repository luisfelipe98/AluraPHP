<?php

abstract class Livro extends Produto {

  //Atributos
  private $isbn;

  //Métodos
  public function getISBN() {
      return $this->isbn;
  }

  public function setISBN($isbn) {
      $this->isbn = $isbn;
  }

  public function CalculaImposto() {
      return $this->getPreco() * 0.065;
  }

}

 ?>
