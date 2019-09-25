<div class="container-fluid">
   <div class="container">

<div class="box-adm">

    <article>

        <header>
           
        

        <?php

         use app\Conn\Read;
         use admin\models\AdminPost;


        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $postid = filter_input(INPUT_GET, 'postid', FILTER_VALIDATE_INT);

                   
   


        if (isset($post) && $post['SendPostForm']):

        
            
         

            $post['post_status'] = ($post['SendPostForm'] == 'Atualizar' ? '1' : '0' );
            $post['post_cover'] = ( $_FILES['post_cover']['tmp_name'] ? $_FILES['post_cover'] : 'null' );
          
            unset($post['SendPostForm']);

            require('models/AdminPost.php');

            $cadastra = new AdminPost;
            $cadastra->updateDb($postid, $post);

            ErroJMX($cadastra->getError()[0], $cadastra->getError()[1]);

            if (!empty($_FILES['gallery_covers']['tmp_name'])):
               
                $sendGallery = new AdminPost;
                $sendGallery->gbSend($_FILES['gallery_covers'], $postid);

            endif;

        else:

            $read = new Read;
            $read->readDb("jm_posts", "INNER JOIN jm_categories ON category_id = post_category WHERE post_id = :id", "id={$postid}");

          

            if (!$read->getResult()):
                header('Location: painel.php?exe=posts/index&empty=true');

            else:

                $post = $read->getResult()[0];
                $post['post_date'] = date('d/m/Y H:i:s', strtotime($post['post_date']));
               

            endif;
        endif;

        $checkCreate = filter_input(INPUT_GET, 'create', FILTER_VALIDATE_BOOLEAN);
        if ($checkCreate && empty($cadastra)):
            ErroJMX("O post <b>{$post['post_title']}</b> foi cadastrado com sucesso no sistema!", JMX_ACCEPT);
        endif;
        ?>
        
             <h2>Atualizar Postagem Existente:</h2>

         </header>
         
         
        <form name="PostForm" action="" method="post" enctype="multipart/form-data">

         
            <label>
                <span>Mudar a  Imagem:</span>
                <input type="file" class="form-control" name="post_cover" />
            </label>
          
      
            <label>
                <span>Alterar o Título:</span>
                <input type="text"  class="form-control" name="post_title" value="<?php if (isset($post['post_title'])) echo $post['post_title']; ?>" />
            </label>

          
         
         
        
            <label>
                <span>Alterar o Conteúdo:</span>
                <textarea  class="form-control" name="post_content" rows="10"><?php if (isset($post['post_content'])) echo htmlspecialchars($post['post_content']); ?></textarea>
            </label>
     
           
           
            <label>

               
                    <span>Data:</span>
                    <input type="text"   class="form-control"  class="formDate center" name="post_date" value="<?php
                    if (isset($post['post_date'])): echo $post['post_date'];
                    else: echo date('d/m/Y H:i:s');
                    endif;
                    ?>" />


                </label>

                <label>
                    <span>Categoria: </span>

                    <input type="text"  class="form-control" name="" readonly="readonly" value="<?php if (isset($post['category_title'])) echo $post['category_title']; ?>" />

                      <input type="hidden"  class="form-control" name="post_category" readonly="readonly" value="<?php if (isset($post['post_category'])) echo $post['post_category']; ?>" />
               
               
                </label>

               


                   
                <label>
                    
                    <span class="field">Ordem da postagem na página:</span>
                       
                       <p> Os números abaixo já foram escolhidos: </p>
                       <p class="display"></p>
                 
                       
                 
                </label>

                 <label>
                  <input type="text" class="form-control control-p" name="post_order" value="<?php if (isset($post['post_order'])) echo $post['post_order']; ?>"  />
                </label>
           

              

  

           


           
            <input type="submit" class="form-control back1" value="Atualizar" name="SendPostForm" />
        
         
                       
           
            
            

        </form>

    </article>

    <div class="clear"></div>
</div> <!-- content home -->
</div>
</div>