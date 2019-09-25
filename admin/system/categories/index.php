<div class="container-fluid">
<div class="container">

<div class="box-adm">

    <section>

        <h1>Categorias Existentes:</h1>


        <?php


       use app\Conn\Read;
       use admin\models\AdminCategory;
       
   
        $empty = filter_input(INPUT_GET, 'empty', FILTER_VALIDATE_BOOLEAN);

        if ($empty):
            ErroJMX("Você tentou editar uma categoria que não existe no sistema!", JMX_INFO);
        endif;

        $delCat = filter_input(INPUT_GET, 'delete', FILTER_VALIDATE_INT);

        if ($delCat):
        
           

            $deletar = new AdminCategory;
            $deletar->catDelete($delCat);
            
            ErroJMX($deletar->getError()[0], $deletar->getError()[1]);

        else:

 


            endif;


        $readSes = new Read;
        $readSes->readDb("jm_categories", "WHERE category_name IS NOT NULL ORDER BY category_title ASC");
        if (!$readSes->getResult()):

        else:
            foreach ($readSes->getResult() as $ses):
                extract($ses);

                $readPosts = new Read;
                $readPosts->readDb("jm_sub_category", "WHERE categorie_id = :parent", "parent={$category_id}");

          
                $countSesPosts = $readPosts->getRowCount();
               
                ?>



                <section>

                    <header class="update_cat">
                        <h1><?= $category_title; ?>  <span>( <?= $countSesPosts; ?> Subcategorias ) </span></h1>
                      

                        <ul class="post_actions">
                           
                            <li><a class="act_view" target="_blank" href="../categoria/<?= $category_name; ?>" title="Ver no site">Ver no site</a></li>
                            <li><a class="act_view" href="painel.php?exe=categories/update&catid=<?= $category_id; ?>" title="Editar">Editar</a></li>
                            <li><a class="act_view" href="painel.php?exe=categories/index&delete=<?= $category_id; ?>" title="Excluir">Deletar</a></li>
                        </ul>
                    </header>

                   

                    <?php
                    $readSub = new Read;
                    $readSub->readDb("jm_categories", "WHERE category_parent = :subparent", "subparent={$category_id}");
                    if (!$readSub->getResult()):

                    else:
                        $a = 0;
                        foreach ($readSub->getResult() as $sub):
                            $a++;

                            $readCatPosts = new Read;
                            $readCatPosts->readDb("jm_posts", "WHERE post_category = :categoryid", "categoryid={$sub['category_id']}");
                            ?>
                            <article<?php if ($a % 3 == 0) echo ' class="right"'; ?>>
                                <h1><a target="_blank" href="../categoria/<?= $sub['category_name']; ?>" title="Ver Categoria"><?= $sub['category_title']; ?></a>  ( <?= $readCatPosts->getRowCount(); ?> posts )</h1>

                                <ul class="post_actions">
                                    <li><strong>Data:</strong> <?= date('d/m/Y H:i', strtotime($sub['category_date'])); ?>Hs</li>
                                    <li><a class="act_view" target="_blank" href="../categoria/<?= $sub['category_name']; ?>" title="Ver no site">Ver no site</a></li>
                                    <li><a class="act_view" href="painel.php?exe=categories/update&catid=<?= $sub['category_id']; ?>" title="Editar">Editar</a></li>
                                    <li><a class="act_view" href="painel.php?exe=categories/index&delete=<?= $sub['category_id']; ?>" title="Excluir">Deletar</a></li>
                                </ul>
                            </article>
                            <?php
                        endforeach;
                    endif;
                    ?>

                </section>
                <?php
            endforeach;
        endif;
        ?>

        <div class="clear"></div>
   
    </section>

    <div class="clear"> 
    </div>

</div> <!-- content home -->
</div>
</div>
