<?php


	  
	     $cat = Check::SubCatByName('pagina-inicial');



           
               echo    "<h2></h2>";
      
           $getPage = (!empty($Link->getLocal()[2]) ? $Link->getLocal()[2]  : 1 );
     //      $Pager = new Pager( HOME . '/pesquisa/' . $search . '/');
      //     $Pager->ExePager($getPage, 12); //12 posts que será exibido por paginação
           $readArt = new Read();
           $readArt->readDb("jm_posts", "WHERE post_status = 1 AND ( post_cat_parent = :cat OR post_category = :cat) ORDER BY post_order ASC ", "cat={$cat}");
           
             if(!$readArt->getResult()):
               
            //     $Pager->ReturnPage();
                 ErroJMX("Desculpe sua pesquisa não retornou resultados!", JMX_INFO);

                 
             else:
               
               $countCat = 0;
               $View = new View();
               $tpl_art = $View->Load('inicio1');

               
               
               foreach ($readArt->getResult() as $art):
                   
                   $countCat++;
                   
                  $class = ( $countCat % 3 == 0 ? ' class="left"' : null);
               
              /*   echo " <span{$class}>";
                   
                      $art['post_title'] = Check::limitWords( $art['post_title'] , 9 );
                      $art['post_content'] = Check::limitWords($art['post_content'] , 10);
                     
                      $View->Show($art, $tpl_art);
                   
                  echo " </span>"; */

                   echo " <span{$class}>";
                   
                      $art['post_title'] ;
                      $art['post_content'] ;
                     
                      $View->Show($art, $tpl_art);
                   
                  echo " </span>"; 
                   
                   
                   
               
      
                endforeach;
            
             endif;

             echo '<div class="clear"></div>';
        
      //       echo '<nav class="paginator">';
           
            
        //     $Pager->ExePaginator("jm_posts","WHERE post_status = 1 AND ( post_cat_parent = :cat OR post_category = :cat) ORDER BY post_date DESC ", "cat={$cat}&limit={$Pager->getLimit()}");
         //    echo $Pager->getPaginator();
             
             echo '</nav>';
			 
			 ?>