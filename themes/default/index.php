<?php

   use app\Helpers\Template;


   $template = new Template;
   
   $tpl_g = $template->Load('article_g');
   $tpl_m = $template->Load('article_m');
   $tpl_p = $template->Load('article_p');
   $tpl_2_box = $template->Load('article_3_col');
   $tpl_empresa = $template->Load('empresa_p');
   $tpl_inicio = $template->Load('inicio-fixo');


 if($Link->getData()):

        
     extract($Link->getData());

         $cat = $id_sub_category;


 else:

  if(isset($id)):

                 $cat = $id;

  endif;

   
     
     
 endif;


?>  


  <section class="slide container-fluid">
               
                <div class="slide_controll">
                    <div class="slide_nav back"><</div>
                    <div class="slide_nav go">></div>
                </div>

                <article class="slide_item first">
                    <a href="#ver" title="Para Fortaleza">
                        <picture alt="Para Fortaleza">      
                            <source data-src="1600" media="(min-width: 1600px)" srcset="../../tim.php?src=<?= HOME; ?>/images/slide/01.jpg&w=2000&h=600"/>
                            <source media="(min-width: 1366px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/01.jpg&w=1600&h=600"/>
                            <source media="(min-width: 1280px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/01.jpg&w=1366&h=400"/>
                            <source media="(min-width: 960px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/01.jpg&w=1280&h=600"/>
                            <source media="(min-width: 768px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/01.jpg&w=960&h=260"/>
                            <source media="(min-width: 480px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/01.jpg&w=800&h=300"/>
                            <source media="(min-width: 1px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/01.jpg&w=480&h=380"/>                   
                            <img src=" <?= HOME; ?>/images/slide/01.jpg" alt="Para Fortaleza" title="Para Fortaleza"/>
                        </picture>
                    </a>
                    <div class="slide_item_desc">
                        <h1><a href="#ver" title="Para Fortaleza">Que tal uma linda viajem por fortaleza para curtir e recordar? conheça o melhor daqui!</a></h1>
                        <p class="tagline">diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    </div>
                </article>

                <article class="slide_item">
                    <a href="#ver" title="Para Punta Cana">
                        <picture alt="Para Fortaleza">      
                            <source data-src="1600" media="(min-width: 1600px)" srcset="../../tim.php?src=<?= HOME; ?>/images/slide/02.jpg&w=2000&h=600"/>
                            <source media="(min-width: 1366px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/02.jpg&w=1600&h=600"/>
                            <source media="(min-width: 1280px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/02.jpg&w=1366&h=400"/>
                            <source media="(min-width: 960px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/02.jpg&w=1280&h=600"/>
                            <source media="(min-width: 768px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/02.jpg&w=960&h=260"/>
                            <source media="(min-width: 480px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/02.jpg&w=800&h=300"/>
                            <source media="(min-width: 1px)" srcset="../../tim.php?src= <?= HOME; ?>/images/slide/02.jpg&w=480&h=380"/>                   
                            <img src=" <?= HOME; ?>/images/slide/02.jpg" alt="Para Fortaleza" title="Para Fortaleza"/>
                        </picture>        
                    </a>
                    <div class="slide_item_desc">
                        <h1><a href="#ver" title="Para Punta Cana">Quer descansar e curtir? Um lindo hotel em punta cana é uma ótima opção para você!</a></h1>
                        <p class="tagline">diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    </div>
                </article>

                
            </section> <!-- FECHA SLIDE -->



  




<div class="container-fluid ">
<div class="container page-init ">

<?php

        
          use app\Conn\Read;
          use app\Helpers\View;

           $post = new Read;

           $cat = '21';

           $view = new View;

           $template = $view->Load('article_4_col');

           $post->readDb("jm_posts", "WHERE post_category = :cat ORDER BY post_order ", "cat={$cat}");

           if(!$post->getResult()):


            echo "deu ruim!";


           else:

            echo "<h1>Confira nossas promoções:</h1>";

                $countCat = 0;
                  

             echo "<div class='box-init'>";
              
                 
                foreach($post->getResult() as $itens):

                $view->Show($itens, $template);
                   
                endforeach;

               echo "</div>";
             endif;

      


   





?>



   


    <div class="clear"></div>

</div><!--container-->

    <div class="clear"></div>


</div><!--container-fluid-->

