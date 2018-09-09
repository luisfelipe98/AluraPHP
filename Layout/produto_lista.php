<?php

session_start();
require_once("cabecalho.php");
MostraAlerta("success");
MostraAlerta("danger");

$produtoDAO = new ProdutoDAO($conexao); //Instanciando a classe ProdutoDAO
$resultadoBanco = $produtoDAO->ListaProdutos();
$cont = 1; //Quantos produtos são ao todo ?>

<h1>Meus Produtos</h1>

<table>
  <tr>
    <th>Código</th>
    <th>Nome</th>
    <th>Preço</th>
    <th>Imposto</th>
    <th>Descrição</th>
    <th>Categoria</th>
    <th>Usado</th>
    <th>Tipo do Produto</th>
  </tr>
      <?php foreach($resultadoBanco as $produto): ?>
        <tr>
          <td><?php echo $cont++;?></td>
          <td><?php echo utf8_encode($produto->getNome());?></td>
          <td><?php echo "R$ " . $produto->getPreco();?></td>
          <td><?php echo "R$ " . $produto->CalculaImposto();?></td>
          <td><?php echo substr(utf8_encode($produto->getDescricao()), 0, 15);?></td>
          <td><?php echo utf8_encode($produto->getCategoria()->getNome());?></td>
          <td>
            <?php
                if ($produto->isUsado() == 0) {
                        echo "Não";
                } else {
                        echo "Sim";
                } ?>
          </td>
          <td><?php echo get_class($produto);?></td>
          <td><?php
                  if ($produto->temISBN()) {
                      echo "ISBN: ".$produto->getISBN();
                    } ?>
          </td>
            <form action="../Logica/remove_produto.php" method="POST">
              <input type="hidden" name="id" value="<?php echo $produto->getId();?>">
              <button>Remover</button>
            </form>
          </td>
          <td><a href="../Formulario/altera_produto.php?id=<?php echo $produto->getId();?>">Alterar</a></td>
        </tr>
      <?php endforeach; ?>
</table>

<?php
require_once("rodape.php");
?>
