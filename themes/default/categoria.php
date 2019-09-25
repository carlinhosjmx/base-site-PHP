<?php





 if($Link->getData()):



      
     extract($Link->getData());

         $cat = $category_id;


 else:

                 $cat = "";


     
     header('location :' . HOME . DIRECTORY_SEPARATOR . '404');
     
 endif;



     


?>

      <div class="container-fluid categoria">
      
      <div class="container-fluid">
        
         <div class="line-title-categoria">
           <div class="title-categoria">
  
                <h1><img src="<?= HOME; ?>/images/car-1.png">Produtos</h1>
          </div>
         </div>
      </div>


 <div class="container">




        
      <?php

       
         


            

                 echo '<div class="box-cat">';

                     echo "<h1>  " . $category_title . "</h1>";
                     echo "<p>Clique sobre o produto abaixo para ter mais informações. </p>";



           $readCat = new Read();
            $readCat->readDb("jm_sub_category", "INNER JOIN jm_categories ON category_id = categorie_id WHERE categorie_id = :cat ORDER BY sub_category_name ASC ", "cat={$cat}");
             
             if(!$readCat->getResult()):
               
                
                 ErroJMX("<p class='erro'>Desculpe, mas ainda não há produtos cadastrados!</p>", JMX_INFO);
                 
             else:

              $quant = count($readCat->getResult());

               
               $i = 0;
               $View = new View();
               $tpl_art = $View->Load('article_2_col');

               
               $cont = $quant;


            

               $dados = $readCat->getResult();

                 
               echo "<div class='box-desc-menu'>";

              echo $dados[0]['category_content'];

               echo "</div>"; 
            
               echo "<div class='menu-lateral'>";
            

                 
               
               for ($i; $i < $cont; $i++):

                     
                                
                   //   $art['post_title'] = Check::limitWords( $art['post_title'] , 12 );
                    //  $art['post_content'] = Check::limitWords($art['post_content'] , 17);
                    
                      if( $dados[$i]['sub_category_name'] != ''):


                     
                             
                      echo '<a href="'.HOME.'/produtos/'.$dados[$i]['sub_category_name'] .'"><article class="box-2">

  
       <div class="img-box2">
        <img alt="logo da verptro" title="logo da verptro" class="expand"  src="'.HOME.'/images/logo-icon.png" />
        </div>
       <div class="title-box2">
                 <h4 >'.$dados[$i]['sub_category_tags'].' </h4>
      </div>
   
        
  
      
</article></a>';



                     endif;

                   
                          
      
                endfor;


             



            
             endif;

        
          
            
            
             
             
       
       ?>
   
       </div> 
        <div class="clear"></div>





</div>
</div>