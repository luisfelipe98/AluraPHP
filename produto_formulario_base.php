<input type="hidden" name="id" value="<?php echo $produto->getId();?>">
Nome
<input type="text" name="nome" value="<?php echo utf8_encode($produto->getNome());?>">
Preço
<input type="text" name="preco" value="<?php echo utf8_encode($produto->getPreco());?>">
Descrição
<textarea name="descricao"><?php echo utf8_encode($produto->getDescricao());?></textarea>
Categoria
<select name="categoria">
<?php

     $categoriaDAO = new CategoriaDAO($conexao); //Instanciando a classe CategoriaDAO
     $mycategory = $categoriaDAO->ListaCategoria();

        foreach ($mycategory as $categoria) :

            //Verificar se é a categoria já selecionada no banco de dados
            if ($produto->getCategoria()->getId() == $categoria->getId()) {
                $selecionado = "selected = 'selected'";
            }else{
                $selecionado = "";
            } ?>

          <option value="<?php echo $categoria->getId();?>" <?php echo $selecionado;?>>
          <?php echo utf8_encode($categoria->getNome()); ?> </option>

        <?php endforeach; ?>
</select>
  <input type="checkbox" name="usado" <?php echo $produto->isUsado();?>>Usado
Tipo do Produto
<select name="tipoProduto">
  <optgroup label = "Livros">
<?php
    $tipos = array("Livro Fisico", "Ebook");
        foreach ($tipos as $tipo) :
            $tipoSemEspaco = str_replace(" ", "", $tipo);
            //Verificar se a instância tem o mesmo nome no array $tipos
            if (get_class($produto) == $tipoSemEspaco) {
                $selecionado = "selected = 'selected'";
            }else{
                $selecionado = "";
            } ?>
            <option value="<?php echo $tipoSemEspaco;?>" <?php echo $selecionado;?>>
              <?php echo utf8_encode($tipo); ?>
            </option>
        <?php endforeach; ?>
        </optgroup>
</select>
ISBN (caso seja um livro)
<input type="text" name="isbn" value="<?php if ($produto->temISBN()) { echo $produto->getISBN();} ?>">
Taxa de Impressão (caso seja um livro físico)
<input type="text" name="taxaImpressao" value="<?php if ($produto->temTaxaImpressao()) { echo $produto->getTaxaImpressao();} ?>">
Marca D'água (caso seja um ebook)
<input type="text" name="waterMark" value="<?php if ($produto->temWaterMark()) { echo $produto->getWaterMark();} ?>">
