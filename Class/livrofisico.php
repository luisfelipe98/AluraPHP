<?php

class LivroFisico extends Livro {

  //Atributos
  private $taxaImpressao;

  //Métodos
  public function getTaxaImpressao() {
      return $this->taxaImpressao;
  }

  public function setTaxaImpressao($taxaImpressao) {
      $this->taxaImpressao = $taxaImpressao;
  }

  public function atualizaBaseadoEm($params) {
      $this->setISBN($params["isbn"]);
      $this->setTaxaImpressao($params["taxaImpressao"]);
  }
  
}

 ?>
