<div class="container-fluid box-home">
 

<div class="box-adm ">

    <article>

        

        <?php

         use app\Conn\Read;
         use models\AdminDocs;

         if(isset($_GET['cod'])):

         $cpf = $_GET['cod'];

        

         $bd = new Read;

         $bd->readDb("jm_clientes", "where cpf = :cpf", "cpf={$cpf}");

               if($bd->getResult()):

                $post = $bd->getResult()[0];

               

                $cpf = $bd->getResult()[0]['cpf'];

                $nome = $bd->getResult()[0]['nome_cli'];

                $id = $bd->getResult()[0]['id_cliente'];

               

              
               endif; 



          endif;

          ?>



         <header class="top-header">
            <h1>2 - Cadastrar Documentos de: <?php echo isset($nome)? $nome : ''; ?></h1>
        </header>
           
    
    


       <?php



        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

 
        if (isset($post) && isset($post['SendPostForm'])):



        	 $post['doc1'] = ( $_FILES['doc1']['tmp_name'] ? $_FILES['doc1'] : null );
        	 $post['doc2'] = ( $_FILES['doc2']['tmp_name'] ? $_FILES['doc2'] : null );
        	 $post['doc3'] = ( $_FILES['doc3']['tmp_name'] ? $_FILES['doc3'] : null );
        	 $post['doc4'] = ( $_FILES['doc4']['tmp_name'] ? $_FILES['doc4'] : null );
        	 $post['doc5'] = ( $_FILES['doc5']['tmp_name'] ? $_FILES['doc5'] : null );
        	 $post['doc6'] = ( $_FILES['doc6']['tmp_name'] ? $_FILES['doc6'] : null );
        	   

          

             unset($post['SendPostForm']);

              $cadastra = new AdminDocs;
              $cadastra->cadastrar($post);

            if ($cadastra->getResult()):

                if (!empty($_FILES['gallery_covers']['tmp_name'])):
                    $sendGallery = new AdminDocs;
                    $sendGallery->gbSend($_FILES['gallery_covers'], $cadastra->getResult());
                endif;

             
           
                ErroJMX($cadastra->getError()[0], $cadastra->getError()[1]);


             

            endif;





          //  $post['post_status'] = ($post['SendPostForm'] == 'Cadastrar' ? '0' : '1' );
          //  $post['post_link'] =  ( $post['post_link'] == '' ? 'nulo' : $post['post_link'] );
           /*$post['anexos'] = ( $_FILES['anexos[]']['tmp_name'] ? $_FILES['anexos'] : null );
            unset($post['SendPostForm']);

         echo "passou aqui!";

               if(is_array($_FILES))
          {
			    $output = '';

			    foreach ($_FILES['files']['name'] as $name => $value)
			    {
			        $file_name = explode(".", $_FILES['files']['name'][$name]);
			        $allowed_extension = array("jpg", "jpeg", "png", "gif");

			        if(in_array($file_name[1], $allowed_extension))
			        {
			            $new_name = md5(rand()) . '.' . $file_name[1];
			            $sourcePath = $_FILES['files']['tmp_name'][$name];
			            $targetPath = "foto/".$new_name;

			            if(move_uploaded_file($sourcePath, $targetPath))
			            {
			                $output .= '<img src="'.$targetPath.'" width="150px" height="180px" />';
			            }
			        }
			    }
			}


            var_dump($post);
      
      

          /*  
            $cadastra = new AdminDocs;
            $cadastra->cadastrar($post);

            if ($cadastra->getResult()):

                if (!empty($_FILES['gallery_covers']['tmp_name'])):
                    $sendGallery = new AdminDocs;
                    $sendGallery->gbSend($_FILES['gallery_covers'], $cadastra->getResult());
                endif;

             
           
                ErroJMX($cadastra->getError()[0], $cadastra->getError()[1]);


             

            endif;

            */



        endif;  
                   
   


      
        ?> 
    
       <div class="box-form "> 

        <form id="myForm" name="PostForm" action="" method="post" enctype="multipart/form-data">
      
     
         
           
        <div class="line-form">

              <label >
                    <span class="field">Categoria do serviço:</span>
                       
                     <select name="servico" class="form-control control-p">
                                        
                        <option  value="1"> Multas Variadas</option>
                        <option  value="2"> Multas de Altos Valores</option>
                        <option  value="3"> Suspenção da CNH</option>
                        <option  value="4"> Cassação da CNH</option>
                     </select>
                </label>

                  <label >
                <span class="field">Valor do serviço:</span>
                <input type="text" class="form-control control-m"  maxlength="77" name="valor" value="<?php if (isset($post['post_title'])) echo $post['post_title']; ?>" />
            </label>


              <label>
                    <span class="field">Data do cadastro:</span>
                    <input type="text" class="form-control control-p" class="formDate center" name="data" value="<?php
                    if (isset($post['post_date'])): echo $post['post_date'];
                    else: echo date('d/m/Y H:i:s');
                    endif;
                    ?>" />
                </label>
         
               </div><!-- line-form-->

               <div class="input-box">
                   <label class="inputs"><span>Anexar DOC 1</span><input type="file" class="form-controls" name="doc1" ></label>
                   <label class="inputs"><span>Anexar DOC 2</span><input type="file" class="form-controls" name="doc2"></label>
                   <label class="inputs"><span>Anexar DOC 3</span><input type="file" class="form-controls" name="doc3"></label>
                   <label class="inputs"><span>Anexar DOC 4</span><input type="file" class="form-controls" name="doc4"></label>
                   <label class="inputs"><span>Anexar DOC 5</span><input type="file" class="form-controls" name="doc5"></label>
                   <label class="inputs"><span>Anexar DOC 6</span><input type="file"  class="form-controls" name="doc6"></label>

           </div>

            
               
                <input type="hidden" class="form-control control-g "  maxlength="80" name="id_cliente" value="<?php echo isset($id)? $id : ''; ?>" />
           

           

             

    
   
      
               <div id="hidden"></div>
            
           
            
                     
            
   
           
            <input type="submit" class="form-control bt" value="Cadastrar" name="SendPostForm" />

        </form>





      


         </div>


    </article>





  

</div>
</div>

