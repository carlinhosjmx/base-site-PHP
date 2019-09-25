 <div class="menu-bar">


    <div class="container">
    
        <div class="menu-mobile">
                  <a href="#" class="bt-menu"><i class="fa fa-bars"></i>Menu</a>
        </div><!--menu-mobile-->

          <div id="logo"><img src="<?= BASE ?>images/logo.png"></div>
 
        <nav  class="menu">

        <?php

     if( $Link->getLocal()[0] == 'index'):

             $class1 = 'active';
             $class2 = '';
             $class3 = '';
             $class4= '';
             $class5= '';
  
     elseif( $Link->getLocal()[0]  == 'servicos'):

              $class1 = '';
              $class2 = 'active';
              $class3 = '';
              $class4= '';
              $class5= '';

      elseif( $Link->getLocal()[0]  == 'links-uteis'):

              $class1 = '';
              $class2 = '';
              $class3 = 'active';
              $class4= '';
              $class5= '';

         elseif( $Link->getLocal()[0]  == 'formularios'):
              

              $class1 = '';
              $class2 = '';
              $class3 = '';
              $class4= 'active';
              $class5= '';

    

               elseif( $Link->getLocal()[0]  == 'contato'):
              

              $class1 = '';
              $class2 = '';
              $class3 = '';
              $class4= '';
              $class5= 'active';


          endif;

?>
        
           <ul>

             <li class='submenu <?= $class1 ?> '>  <a href=" <?= HOME; ?>/index"  > Inicio</a></li>
             <li class='submenu <?= $class2 ?>'>  <a href= "#"  >Serviços</a>
               
                <ul class='children'>

              <?php

                 use app\Conn\Read;
                  
                
                  $readSub = new Read;
                  $readSub->FullRead("SELECT * FROM jm_sub_category WHERE categorie_id = 5 ");  
                                           
                    if (!$readSub->getResult()):
                           
                      
                       
                    else:


                           
                         foreach ($readSub->getResult() as $ses):

                            if($ses['sub_category_name'] != 'servicos'):

                                        
                                                                         echo " <li >  <a href=' " . HOME . "/servicos/" . $ses['sub_category_name'] . " ' class=' ' >" . $ses['sub_category_tags']  . " </a></li>";


                             endif;                                          

                             endforeach;

                      
                  echo "";

               endif;
                        ?>
                        </ul></li>




      
          
              <li class='submenu <?= $class3 ?>'>  <a href= " <?= HOME; ?>/links-uteis"  >Onde Estamos</a></li>
             
              <li class='submenu <?= $class5 ?>'> <a href= " <?= HOME; ?>/contato"  >Contato</a></li>

              </ul>

             
            

          </nav><!--menu-->
          </div><!--container-->
  </div><!--menu-bar--> 



  
      


   