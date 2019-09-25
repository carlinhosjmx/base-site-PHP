<div class="container-fluid">
   <div class="container">


<div class="box-adm">

    <section>



        <?php


        use app\Conn\Read;
        use app\Helpers\Pager;
        use app\Helpers\Check;


   
   


        $posti = 0;

        if(isset($_GET['postid']) ):
        $postid = $_GET['postid'];

      

        endif;

         $getPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);

         

        $Pager = new Pager("painel.php?exe=posts/edit&postid=14&page=");
        $Pager->ExePager($getPage, 10);

        $post_itens = new Read;

        $post_total = new Read;
    

         $post_itens->readDb("jm_posts", "INNER JOIN jm_categories ON category_id = :postid ORDER BY post_title ASC LIMIT :limit OFFSET :offset", "postid={$postid}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");

       
         

       

        if ($post_itens->getResult()):

           
              $var = $post_itens->getResult()[0]['category_id'];



        	$post_total->readDb("jm_posts","INNER JOIN jm_categories ON category_id = post_category  where post_category = :id ", "id={$postid}");


            $contador =  $post_total->getRowCount();


           

               echo "<h1 class='show-post'>Postagens da categoria  <span>". $post_itens->getResult()[0]['category_title'] . "</span></h1>";
               echo "<h2 class='show-post2'>Esta categoria possui um total de  " .$contador. " postagens</h2>";

               for($i = 0; $i < $contador; $i++):
        
           // foreach ($post_itens->getResult() as $post):
                
              //  $posti++;
              //  extract($post);

             


                $status = (!$post_itens->getResult()[$i]['post_status'] ? 'style="background: #fffed8"' : '');
                ?>
                <article<?php  echo ' class="box-post"'; ?> <?= $status; ?>>

                    <div class="box-thumbnail">
                      <?php

                             if(!$post_itens->getResult()[$i]['post_cover']):

                                echo "<h4>Sem imagem publicada</h4>";
                             else:

                            echo "<img src='" . HOME ."/uploads/".  $post_itens->getResult()[$i]['post_cover'] ."' />";

                             endif;

                            ?>
                    </div>

                    <?php



                         if( $post_itens->getResult()[$i]['post_name'] == -1):

                       echo "<div class='content-adm-post'><h2><a target='_blank' href='../artigo/" .  $post_itens->getResult()[$i]['post_content'] ." title='Ver Post'>" . Check::limitWords($post_itens->getResult()[$i]['post_content'], 7). "</a></h2><p><strong>Página :</strong> ".$post_itens->getResult()[$i]['category_title']."</p><p><strong>Subcategoria :</strong> " .$post_itens->getResult()[$i]['category_title'] ."</p>
                   <p><strong>ordem da postagem :</strong> " .$post_itens->getResult()[$i]['post_order'] ."</p></div>";

                         else:

                          echo  "<div class='content-adm-post'><h2><a target='_blank' href='../artigo/". $post_itens->getResult()[$i]['post_name'] ." title='Ver Post'>". Check::limitWords($post_itens->getResult()[$i]['post_title'], 10). "</a></h2>
                       <p><strong>Página : </strong>".$post_itens->getResult()[$i]['category_title']."</p><p><strong>Subcategoria : </strong>" .$post_itens->getResult()[$i]['category_title'] ."</p><p><strong>ordem da postagem :</strong> " .$post_itens->getResult()[$i]['post_order'] ."</p></div>";


                        endif;


                    ?>

                   
                    <ul >
                       
                        <li class="btn-block-post"><a class="act_edit" target="_blank" href="../artigo/<?= $post_itens->getResult()[$i]['post_name']; ?>" title="Ver no site">Ver no site</a></li>
                        <li class="btn-block-post"><a class="act_edit" href="painel.php?exe=posts/update&postid=<?= $post_itens->getResult()[$i]['post_id']; ?>" title="Editar">Editar</a></li>

                       <li id="deletar" class="btn-block-post"><a class="act_delete" href="painel.php?exe=posts/index&post=<?= $post_itens->getResult()[$i]['post_id']; ?>&action=delete" onclick="return doConfirm(this.id);" title="Excluir">Deletar</a></li>
                    </ul>

                </article>
                <?php
            //endforeach;

            endfor;

               else:
            $Pager->ReturnPage();
            ErroJMX("Desculpe, ainda não existem posts cadastrados!", JMX_INFO);


             
        endif;
        ?>

        <div class="clear"></div>
    </section>

    <?php

       $Pager->ExePaginator("jm_posts","where post_category = :id ", "id={$postid}");
    echo $Pager->getPaginator();

     
    

    ?>

    <div class="clear"></div>
</div> <!-- content home -->
</div>
</div>