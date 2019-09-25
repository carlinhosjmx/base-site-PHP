

<div class="container-fluid">
   <div class="container">

    <div class="box-adm">

    <article>

        <header>
            <h1>Criar Categoria:</h1>
        </header>

        <?php

          use admin\models\AdminCategory;


        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($data['SendPostForm'])):
            unset($data['SendPostForm']);

        
     
            
            $cadastra = new AdminCategory;
            $cadastra->cadastraCat($data);

            if (!$cadastra->getResult()):
                ErroJMX($cadastra->getError()[0], $cadastra->getError()[1]);
            else:

                  ErroJMX("A categoria foi cadastrada com sucesso no sistema! ", JMX_ACCEPT); 

                
            endif;
        endif;
        ?>

        <form name="PostForm" action="" method="post" enctype="multipart/form-data">

    
            <label>
                <span class="field">Titulo:</span>
                <input type="text" name="category_title" class="form-control control-g" value="<?php if (isset($data)) echo $data['category_title']; ?>" />
            </label>

             <label>
               

                <input type="checkbox" name="category_menu" class="check"  value="1">Mostrar no menu principal</br>
            </label>


            <label>
                <span class="field">Posição no menu: ( Ex: 1, 2, 3 )</span>
                <input type="text" name="category_order" class="form-control control-g" value="<?php if (isset($data)) echo $data['category_order']; ?>" />
            </label>
      
      

            <label>
                <span class="field">Descrição da Categoria:</span>
                <textarea name="category_content"  class="form-control control-g" rows="5"><?php if (isset($data)) echo $data['category_content']; ?></textarea>
            </label>
        
      

                <label class="label_small">
                    <span>Data:</span>
                    <input type="text" class="form-control control-p"  name="category_date" value="<?= date('d/m/Y H:i:s'); ?>" />
                </label>

                <input type="hidden" name="category_type" value="0">
                <input type="hidden" name="category_parent" value="0">
                

             

              

    
           
            <div class="gbform"></div>

            <input type="submit" class="form-control control-p" value="Cadastrar Categoria" name="SendPostForm" />
          
        </form>

    </article>

    <div class="clear"></div>

  </div>
</div> 
</div>
