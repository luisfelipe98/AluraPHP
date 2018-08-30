<?php

class CategoriaDAO {

    private $conexao;

    function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function ListaCategoria() {

        $query = mysqli_query($this->conexao, "SELECT id, nome FROM categoria");

        $categorias = array();
        while($resultado = mysqli_fetch_assoc($query)) {

          $categoria = new Categoria(); // Instanciando a classe Categoria

          $categoria->setId($resultado["id"]);
          $categoria->setNome($resultado["nome"]);

          array_push($categorias, $categoria);

        }

        return $categorias;
    }

}

 ?>
