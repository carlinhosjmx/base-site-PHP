 <div class="menu-bar">


    <div class="container">
    
        <div class="menu-mobile">
                  <a href="#" class="bt-menu"><i class="fa fa-bars"></i>Menu</a>
        </div><!--menu-mobile-->

          <div id="logo"><img src="<?= BASE ?>images/logo.jpg"></div>
 
        <nav  class="menu">

        <?php


     if( $page == ''):

             $class1 = 'active';
             $class2 = '';
             $class3 = '';
             $class4= '';
             $class5= '';

       elseif( $page == 'inicio'):

             $class1 = 'active';
             $class2 = '';
             $class3 = '';
             $class4= '';
             $class5= '';
  
     elseif(  $page == 'page-1'):

              $class1 = '';
              $class2 = 'active';
              $class3 = '';
              $class4= '';
              $class5= '';

      elseif(  $page == 'page-2'):

              $class1 = '';
              $class2 = '';
              $class3 = 'active';
              $class4= '';
              $class5= '';

         elseif(  $page == 'page-3'):
              

              $class1 = '';
              $class2 = '';
              $class3 = '';
              $class4= 'active';
              $class5= '';

          elseif(  $page == 'page-4'):
              

              $class1 = '';
              $class2 = '';
              $class3 = '';
              $class4= 'active';
              $class5= '';


    

               elseif(  $page == 'contato'):
              

              $class1 = '';
              $class2 = '';
              $class3 = '';
              $class4= '';
              $class5= 'active';


          endif;

?>
        
           <ul>

            

              <?php

                 use app\Conn\Read;
                  
                
                  $readSub = new Read;
                  $readSub->FullRead("SELECT * FROM jm_categories WHERE category_menu = '1' ORDER BY category_order ");

                  


                                           
                    if (!$readSub->getResult()):


                       echo "houve um erro!";
                           
                      
                       
                    else:

                        $itens = count($readSub->getResult());

                        

                        for($i=0; $i<$itens; $i++):

                          
                            if( $readSub->getResult()[$i]['category_type'] == '0'):



                        	  echo "  <li class='submenu' ".$class3.">  <a href= '".HOME."/".$readSub->getResult()[$i]['category_name']."'>".$readSub->getResult()[$i]['category_title']."</a>";



                        	
                               
                              
                                $sub = [];

                        	  for($j=0; $j<$itens; $j++):


     

                                    if($readSub->getResult()[$j]['category_parent'] == $readSub->getResult()[$i]['category_id']):

                                    	  $sub[$j] =  "<li><a href='".HOME."/page-1/".$readSub->getResult()[$j]['category_name']."'>".$readSub->getResult()[$j]['category_title']."</a></li>";

                    

                        	       endif; //if geral

                                   	      


                        	 endfor; //submenu

                            

                               $itens_sub = count($sub);

                               if( $itens_sub > 0):

                               	echo "<ul class='children'>";

		                              foreach ($sub as $dados) {
		                              	
		                              	echo $dados;
		                              }

		                               echo "</ul>";

                               endif;

                        	 	echo "</li>";  

                          endif;


                        endfor;

                           
                    endif;

                    ?>

                </ul>

          </nav><!--menu-->
          </div><!--container-->
  </div><!--menu-bar--> 



  
      


   