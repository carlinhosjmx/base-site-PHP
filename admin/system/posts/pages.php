<div class="container-fluid">
   <div class="container">


<div class="box-adm">

    <section>

        <h1 >Postagens a editar:</h1>

        <?php
         
         use app\Conn\Read;
         use app\Helpers\Pager;
         use admin\models\AdminPost;


        $empty = filter_input(INPUT_GET, 'empty', FILTER_VALIDATE_BOOLEAN);
        if ($empty):
            ErroJMX("Você tentou editar uma postagem que não existe no sistema!", JMX_INFO);
        endif;


        $action = filter_input(INPUT_GET, 'action', FILTER_DEFAULT);
        if ($action):
            require ('_models/AdminPost.class.php');

            $postAction = filter_input(INPUT_GET, 'post', FILTER_VALIDATE_INT);
            $postUpdate = new AdminPost;

            switch ($action):
                case 'active':
                    $postUpdate->ExeStatus($postAction, '1');
                    ErroJMX("O status do post foi atualizado para <b>ativo</b>. Post publicado!", JMX_ACCEPT);
                    break;

                case 'inative':
                    $postUpdate->ExeStatus($postAction, '0');
                    ErroJMX("O status do post foi atualizado para <b>inativo</b>. Post agora é um rascunho!", JMX_ALERT);
                    break;

                case 'delete':
                    $postUpdate->ExeDelete($postAction);
                    ErroJMX($postUpdate->getError()[0], $postUpdate->getError()[1]);
                    break;

                default :
                    ErroJMX("Ação não foi identifica pelo sistema, favor utilize os botões!", JMX_ALERT);
            endswitch;
        endif;


        $posti = 0;
        $getPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
        $Pager = new Pager('painel.php?exe=posts/index&page=');
        $Pager->ExePager($getPage, 10);

        $post_itens = new Read;
        $post_itens->readDb("jm_posts", "INNER JOIN jm_sub_category ON post_category = id_sub_category INNER JOIN jm_categories ON categorie_id = category_id ORDER BY category_title ASC, post_category DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");

        if ($post_itens->getResult()):

           


        
            foreach ($post_itens->getResult() as $post):
                
                $posti++;
                extract($post);
                $status = (!$post_status ? 'style="background: #fffed8"' : '');
                ?>
                <article<?php  echo ' class="box-post"'; ?> <?= $status; ?>>

                    <div class="box-thumbnail">
                      <?php

                             if(!$post_cover):

                                echo "<h4>Sem imagem publicada</h4>";
                             else:

                            echo "<img src='" . HOME ."/uploads/". $post_cover ."' />";

                             endif;

                            ?>
                    </div>

                    <?php



                         if($post_name == -1):

                       echo "<div class='content-adm-post'><h2><a target='_blank' href='../artigo/" . $post_content ." title='Ver Post'>" . Check::limitWords($post_content, 7). "</a></h2><p class='page-destak'><strong>Página : ".$category_title."</strong></p><p><strong>Subcategoria :</strong> " .$sub_category_tags ."</p>
                   <p><strong>ordem da postagem :</strong> " .$post_order ."</p></div>";

                         else:

                          echo  "<div class='content-adm-post'><h2><a target='_blank' href='../artigo/". $post_name ." title='Ver Post'>". Check::limitWords($post_title, 10). "</a></h2>
                       <p class='page-destak'><strong>Página : ".$category_title."</strong></p><p><strong>Subcategoria : </strong>" .$sub_category_tags ."</p><p><strong>ordem da postagem :</strong> " .$post_order ."</p></div>";


                        endif;


                    ?>

                   
                    <ul >
                       
                        <li class="btn-block-post"><a class="act_edit" target="_blank" href="../artigo/<?= $post_name; ?>" title="Ver no site">Ver no site</a></li>
                        <li class="btn-block-post"><a class="act_edit" href="painel.php?exe=posts/update&postid=<?= $post_id; ?>" title="Editar">Editar</a></li>

                       <li id="deletar" class="btn-block-post"><a class="act_delete" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=delete" onclick="return doConfirm(this.id);" title="Excluir">Deletar</a></li>
                    </ul>

                </article>
                <?php
            endforeach;

        else:
            $Pager->ReturnPage();
            ErroJMX("Desculpe, ainda não existem posts cadastrados!", JMX_INFO);
        endif;
        ?>

        <div class="clear"></div>
    </section>

    <?php
    $Pager->ExePaginator("jm_posts");
    echo $Pager->getPaginator();
    ?>

    <div class="clear"></div>
</div> <!-- content home -->
</div>
</div>