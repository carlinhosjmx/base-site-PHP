<div class="container-fluid">
<div class="container">

<div class="box-adm">

    <section>

        <h1>SubCategorias Existentes:</h1>


        <?php

          use app\Conn\Read;
          use admin\models\AdminSubCategory;

   
        $empty = filter_input(INPUT_GET, 'empty', FILTER_VALIDATE_BOOLEAN);
        if ($empty):
            ErroJMX("Você tentou editar uma SubCategoria que não existe no sistema!", JMX_INFO);
        endif;

        $delCat = filter_input(INPUT_GET, 'delete', FILTER_VALIDATE_INT);
        if ($delCat):
            require ('_models/AdminSubCategory.class.php');
            $deletar = new AdminSubCategory;
            $deletar->catDelete($delCat);
            
            ErroJMX($deletar->getError()[0], $deletar->getError()[1]);

        endif;


        $readSes = new Read;
        $readSes->readDb("jm_sub_category", "WHERE sub_category_name IS NOT NULL ORDER BY sub_category_tags ASC");
        if (!$readSes->getResult()):

        else:
            foreach ($readSes->getResult() as $ses):
                extract($ses);

                $readPosts = new Read;
                $readPosts->readDb("jm_posts", "WHERE post_category = :parent", "parent={$id_sub_category}");

            //   $readCats = new Read;
         //   $readCats->readDb("jm_categories", "WHERE category_parent = :parent", "parent={$categorie_id}");

                $countSesPosts = $readPosts->getRowCount();
              // $countSesCats = $readCats->getRowCount();
                ?>



                <section  class="update_cat">

                    <header>
                        <h1><?= $sub_category_tags; ?>  <span>( <?= $countSesPosts; ?> postagem ) </span></h1>
                       

                        <ul>


                             <li><a class="act_view" href="painel.php?exe=categories/updateSub&catid=<?= $id_sub_category; ?>" title="Editar">Editar</a></li>
                            <li><a class="act_view" target="_blank" href="../categoria/<?= $sub_category_name; ?>" title="Ver no site">Ver no site</a></li>
                            <li><a class="act_view" href="painel.php?exe=categories/indexSub&delete=<?=$id_sub_category; ?>" title="Excluir">Deletar</a></li>
                        </ul>
                    </header>

              

              </section> 
                <?php
            endforeach;
        endif;
        ?> 

        

        <dv class="clear"></div>
   
    </section>

    <div class="clear"> 
    </div>

</div> <!-- content home -->
</div>
</div>
