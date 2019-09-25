<div class="container-fluid">
   <div class="container">


<div class="box-adm">

    <section>

        <h1 >Escolha a categoria que deseja editar:</h1>

        <?php

        use app\Conn\Read;
        use app\Helpers\Pager;





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
        $post_itens->readDb("jm_categories", "ORDER BY category_title");

        if ($post_itens->getResult()):

           
         
             
             echo "<ul>";
        
            foreach ($post_itens->getResult() as $post):
                
                $posti++;
                extract($post);
          



                        

                       echo '<li class="list"><i class="fa fa-caret-square-o-right" aria-hidden="true"></i><a class="listar" href="painel.php?exe=posts/edit&postid='. $category_id .'">'.$category_title .'</a></li>';
                  


            endforeach;

            echo "</ul>";

            endif;

      
        ?>

        <div class="clear"></div>
    </section>

 

    <div class="clear"></div>
</div> <!-- content home -->
</div>
</div>
