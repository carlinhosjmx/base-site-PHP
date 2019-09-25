<?php

    $View = (!empty($View) ? $View : $View = new View());
    $post_id= (!empty($post_id) ?  $post_id : null);

    $Side = new Read();
    $tpl_p = $View->Load('article_p');


?>

<aside class="sidebar">
 
  <!--  <article class="ads">
        <header>
            <h1>Anúncio Patrocinado:</h1>
            <a href="http://www.jmxrio.com.br" title="jmxrio criação de site">
                <img src="?= INCLUDE_PATH; ?>/" alt="jmxrio" title="jmxrio" />
            </a>
        </header>
    </article> -->

    <section class="thumb-side">
        <h2 class="thumb_title"><span class="oliva">Confira também:</span></h2>
        <?php  
        
           $ul = 0;
           $Side->readDb("jm_posts", "WHERE post_status = 1 AND post_id != :side ORDER BY post_date DESC LIMIT 3", "side={$post_id}");
           if($Side->getResult()):
               
              foreach($Side->getResult() as $last):

                   $last['post_content'] = Check::limitWords(  $last['post_content'] , 8);
                 
                  //  $last['datetime'] = date("Y-m-d", strtotime($last['post_date'])); 
                 // $last['pubdate'] = date("d/m/Y H:i", strtotime($last['post_date']));

                $View->Show($last, $tpl_p);
       
             endforeach;
          
         endif;
        
        
        ?>
    </section>

 <!--   <section class="thumb-side">
        <h2 class="line_title"><span class="vermelho">Destaques:</span></h2>
         ?php  
        
          
           $Side->readDb("jm_posts", "WHERE post_status = 1 AND post_id != :side ORDER BY post_views DESC LIMIT 3", "side={$post_id}");
           if($Side->getResult()):
               
              foreach($Side->getResult() as $most):
                 
                $most['post_content'] = Check::limitWords(  $most['post_content'] , 8);
             //   $most['datetime'] = date("Y-m-d", strtotime($most['post_date'])); 
            //    $most['pubdate'] = date("d/m/Y H:i", strtotime($most['post_date']));

                $View->Show($most, $tpl_p);
       
             endforeach;
          
         endif;
        
        
        ?>
    </section>-->
</aside>