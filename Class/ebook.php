<?php

class Ebook extends Livro {

  //Atributos
  private $waterMark;

  //Métodos
  public function getWaterMark() {
      return $this->waterMark;
  }

  public function setWaterMark($waterMark) {
      $this->waterMark = $waterMark;
  }

  public function atualizaBaseadoEm($params) {
      $this->setISBN($params["isbn"]);
      $this->setWaterMark($params["waterMark"]);
  }

}

?>
