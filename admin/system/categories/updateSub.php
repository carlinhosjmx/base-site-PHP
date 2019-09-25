<?php
if (!class_exists('Login')) :
    header('Location: ../../painel.php');
    die;
endif;
?>

<div class="container-fluid">
   <div class="container">

<div class="box-adm">

    <article>

        <header>
            <h1>Atualizar SubCategoria:</h1>
        </header>

        <?php

          use app\Conn\Read;
          use admin\models\AdminSubCategory;


        $data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $catid = filter_input(INPUT_GET, 'catid', FILTER_VALIDATE_INT);


    


        if (!empty($data['SendPostForm'])):
            unset($data['SendPostForm']);

          

            require('_models/AdminSubCategory.class.php');
            $cadastra = new AdminSubCategory;
            $cadastra->updateDb($catid, $data);

            ErroJMX($cadastra->getError()[0], $cadastra->getError()[1]);
        else:

            $read = new Read;
            $read->readDb("jm_sub_category", "WHERE id_sub_category = :id", "id={$catid}");
            

            if (!$read->getResult()):

     
             // header('Location: painel.php?exe=categories/index&empty=true');
            else:
                $data = $read->getResult()[0];
            endif;
        endif;
        
        $checkCreate = filter_input(INPUT_GET, 'create', FILTER_VALIDATE_BOOLEAN);
        if($checkCreate && empty($cadastra)):
            $tipo = ( empty($data['category_parent']) ? 'seção' : 'categoria');
            ErroJMX("A {$tipo} <b>{$data['sub_category_tags']}</b> foi cadastrada com sucesso no sistema! Continue atualizando a mesma!", JMX_ACCEPT);
        endif;
        
        ?>

        <form name="PostForm" action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label>
                <span>Nome da subcategoria:</span>
                <input type="text" name="sub_category_tags" class="form-control control-g" value="<?php if (isset($data)) echo $data['sub_category_tags']; ?>" />
            </label>
         </div>

      
                <input type="hidden" name="categorie_id" value="<?php if (isset($data)) echo $data['categorie_id']; ?>" />
         

             
          
             <div class="form-group">

                <label>
                    <span>Data:</span>
                    <input type="text" class="form-control control-p" name="sub_category_date" value="<?= date('d/m/Y H:i:s'); ?>" />
                </label>
             </div>
          
          <div class="form-group">
            <div class="gbform"></div>

            <input type="submit" class="form-control control-p" value="Atualizar Categoria" name="SendPostForm" />
            
            </div>
        </form>

    </article>

    <div class="clear"></div>
</div> <!-- content home -->
</div>
</div>