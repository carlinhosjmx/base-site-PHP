

<div class="container-fluid">
   <div class="container">

    <div class="box-adm">

    <article>

        <header>
            <h1>Criar uma SubCategoria:</h1>
        </header>

        <?php

          use app\Conn\Read;
          use admin\models\AdminSubCategory;


        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);


        if (!empty($data['SendPostForm'])):

             unset($data['SendPostForm']);

      

              


           $cadastra = new AdminSubCategory;
            $cadastra->cadastraCat($data);

          

            if (!$cadastra->getResult()):
             
                ErroJMX($cadastra->getError()[0], $cadastra->getError()[1]);
            else:
  
                 ErroJMX("A subcategoria foi cadastrada com sucesso no sistema! Continue atualizando a mesma!", JMX_ACCEPT); 
                //header('Location: painel.php?exe=categories/index&empty=true&catid=' . $cadastra->getResult());
            endif;
        endif;
        ?>

        <form name="PostForm" action="" method="post" enctype="multipart/form-data">

    
            <label>
                <span class="field">Titulo:</span>
                <input type="text" name="category_name" class="form-control control-g" value="<?php if (isset($data)) echo $data['category_name']; ?>" />
            </label>

             
      

            <label>
                <span class="field">Descrição da subcategoria:</span>
                <textarea name="category_content"  class="form-control control-g" rows="5"><?php if (isset($data)) echo $data['category_content']; ?></textarea>
            </label>
        
      

             

               

                 <input type="hidden" name="category_type" value="1">

                

             

              
             <label>
                    <span>Pertencente a categoria:</span>
                    <select name="categorie_id" class="form-control control-p ">
                        <option class="select" value="null"> Selecione a categoria pai: </option>
                        <?php
                        $readSes = new Read;
                        $readSes->readDb("jm_categories", "WHERE category_name IS NOT NULL AND category_parent = 0 ORDER BY category_title ASC");
                      
                        if (!$readSes->getResult()):
                          
                            echo '<option disabled="disabled" value="null"> Cadastre antes uma categoria! </option>';

                        else:
                            foreach ($readSes->getResult() as $ses):

                              
                                echo "<option value=\"{$ses['category_id']}\" ";

                                echo "> {$ses['category_title']} </option>";

                            endforeach;
                        endif;
                        ?>
                    </select>

                     <input type="hidden" name="category_menu" value="<?php echo $ses['category_menu']; ?>">
                </label>

                  <label>
                <span class="field">Ordem da subcategoria: ( Ex: 1, 2, 3 )</span>
                <input type="text" name="category_order" class="form-control control-g" value="<?php if (isset($data)) echo $data['category_order']; ?>" />
            </label>
      

                   <label class="label_small">
                    <span>Data:</span>
                    <input type="text" class="form-control control-p"  name="category_date" value="<?= date('d/m/Y H:i:s'); ?>" />
                </label>
    
           
            <div class="gbform"></div>

            <input type="submit" class="form-control control-p" value="Cadastrar Categoria" name="SendPostForm" />
          
        </form>

    </article>

    <div class="clear"></div>

  </div>
</div> 
</div>
