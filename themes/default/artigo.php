<?php


 if($Link->getData()):
      
     extract($Link->getData());
 else:
     
     header('location :' . HOME . DIRECTORY_SEPARATOR . '404');

   $post_title = '';
   $post_cover = '';
   $post_order = '';
   $post_content = '';
   $gallery_image = '';
   $post_id = '';
   $post_category = '';
   $gb = '';
     
 endif;
 
 /*$contPost = new Insert();
 $arrPost = ['post_view_title' => $post_title, 'post_view_time' => date('d-m-Y H:i'), 'post_view_cont' => 1, 'post_view_page' => $post_cat_parent, 'post_id' => $post_id ];
 $contPost->insertDb("jm_post_view", $arrPost); */
 
 
 


?>
<!--HOME CONTENT-->
<div class="container-fluid line-title-artigo">
   <h1><?= $post_title ?></h1>
</div>
<div class="container-fluid">
   <div class="container box-artigo">
    <div class="line1-artigo">
    
       <div class="col-40">
         
           

            <header>
                <hgroup>
                 
                    <div class="img-capa">
                        <!--w = 578px  [ CRIAR THUMB ]-->
                       <?= Check::Image('uploads' . DIRECTORY_SEPARATOR . $post_cover, $post_title, 300); ?>
                    </div>
                   
                </hgroup>
            </header>

       </div> <!--col-40-->
       <div class="col-60"> 

<?php

           if( $Link->getData() == null):

           	echo "<h2 class='center'>Não há produtos cadastrado nesta seção ainda, aguarde!</h2>";

           else:
              
               echo "<h2 ><i class='fa fa-info-circle' aria-hidden='true'></i>
Informações do produto</h2>";

           endif;

?>
            <div class="content-artigo">
                <?= $post_content ; ?>
                
                </div><!--article-content -->
              
              </div>
        </div>
        </div>
        </div><!--container-fluid-->





        <div class="container-fluid">

        <?php

           $dados = new Read;

           $dados->readDb("jm_posts", "WHERE post_category = :post_category AND post_order <> :post_order", "post_category={$post_category}&post_order={$post_order}");

           if($dados->getResult()):

            foreach($dados->getResult() as $itens):



           

           


        ?>



          <div class="container box-mn">
             <h2>Manual de uso do <?= $itens['post_title'] ?></h2>      
            <div class="container content-mn"> <?= $itens['post_content'] ?>



            </div>

          


                <?php

                     endforeach;

                     endif;


                ?>
                

          </div>

        </div><!--container-fluid-->

               
                   
        
           
            
      