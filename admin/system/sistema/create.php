<div class="container-fluid">
   <div class="container">
<div class="box-adm">

    <article>

        <header>
            <h1>Cadastrar um cliente:</h1>
        </header>

        <?php

        use app\Conn\Read;
        use admin\models\AdminPost;




        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

 
        if (isset($post) && $post['SendPostForm']):
            $post['post_status'] = ($post['SendPostForm'] == 'Cadastrar' ? '0' : '1' );
          //  $post['post_link'] =  ( $post['post_link'] == '' ? 'nulo' : $post['post_link'] );
            $post['post_cover'] = ( $_FILES['post_cover']['tmp_name'] ? $_FILES['post_cover'] : null );
            unset($post['SendPostForm']);
			
		  

            
            $cadastra = new AdminPost;
            $cadastra->cadastraPost($post);

            if ($cadastra->getResult()):

                if (!empty($_FILES['gallery_covers']['tmp_name'])):
                    $sendGallery = new AdminPost;
                    $sendGallery->gbSend($_FILES['gallery_covers'], $cadastra->getResult());
                endif;

             
           
                ErroJMX($cadastra->getError()[0], $cadastra->getError()[1]);
            endif;
        endif;
        ?>


        <form name="PostForm" action="" method="post" enctype="multipart/form-data">
      
     
          <!--  <label>
                <span>Anexar imagem do documento</span>
                <input  type="file" class="form-control control-g" name="post_cover" />
            </label>-->

        
            <label >
                <span class="field">Nome do cliente:</span>
                <input type="text" class="form-control control-g"  maxlength="77" name="post_title" value="<?php if (isset($post['post_title'])) echo $post['post_title']; ?>" />
            </label>

             <label >
                <span class="field">CPF:</span>
                <input type="text" class="form-control control-g"  maxlength="77" name="post_title" value="<?php if (isset($post['post_title'])) echo $post['post_title']; ?>" />
            </label>
             <label >
                <span class="field">Telefone 1:</span>
                <input type="text" class="form-control control-g"  maxlength="77" name="post_title" value="<?php if (isset($post['post_title'])) echo $post['post_title']; ?>" />
            </label>

                <label >
                <span class="field">Telefone 2:</span>
                <input type="text" class="form-control control-g"  maxlength="77" name="post_title" value="<?php if (isset($post['post_title'])) echo $post['post_title']; ?>" />
            </label>

              <label >
                <span class="field">E-mail:</span>
                <input type="text" class="form-control control-g"  maxlength="77" name="post_title" value="<?php if (isset($post['post_title'])) echo $post['post_title']; ?>" />
            </label>

            <label >
                <span class="field">Endereço:</span>
                <input type="text" class="form-control control-g"  maxlength="77" name="post_title" value="<?php if (isset($post['post_title'])) echo $post['post_title']; ?>" />
            </label>
            
            
            
           
                   
        

         <!--   <label >
                <span class="field">Digite o conteúdo da postagem:</span>
                <textarea  class="form-control control-g" name="post_content" rows="10"><?php //if (isset($post['post_content'])) echo htmlspecialchars($post['post_content']); ?> </textarea>
         </label> -->
          
     
        
      
        
         
        
                <label>
                    <span class="field">Data da postagem:</span>
                    <input type="text" class="form-control control-p" class="formDate center" name="post_date" value="<?php
                    if (isset($post['post_date'])): echo $post['post_date'];
                    else: echo date('d/m/Y H:i:s');
                    endif;
                    ?>" />
                </label>
         

   
              <!--  <label >
                    <span class="field">Categoria:</span>
                       
                     <select name="post_category" onchange="fetch_select(this.value);" class="form-control control-p">
                        <option value=""> Selecione a SubCategoria: </option>                        
                   <?php
                        $readSes//= new Read;
                      //  $readSes->//readDb("jm_sub_category", "WHERE sub_category_name IS NOT NULL ORDER BY sub_category_name ASC");

                       
                     //   if ($readSes->getRowCount() >= 1):

                      //      foreach ($readSes->getResult() as $ses):
                              
                        //       echo "<option  value=\"{$ses['id_sub_category']}\"> {$ses['sub_category_tags']} </option>";
                                                             

                        //    endforeach;

                         
                      //  endif; 
                        ?> 

                    </select>
                </label>-->

                               
      
                           
       
                  
           
           
              
            
   
            <!--<input type="submit" class="form-control back1" value="Cadastrar" name="SendPostForm" />-->
            <input type="submit" class="form-control back2" value="Cadastrar & Publicar" name="SendPostForm" />

        </form>

    </article>

    <div class="clear"></div>
</div> <!-- content home -->
</div>
</div>
