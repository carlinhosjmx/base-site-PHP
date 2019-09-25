<?php
         $search = $Link->getLocal()[1];      
         $count = ($Link->getData()['count'] ? $Link->getData()['count'] : '0' );
            
  ?>

<!--HOME CONTENT-->
<div class="container-fluid">
<div class="container">


    <section class="box-pesquisa">
        <header>
            <h2>Pesquisa por: <?= $search; ?></h2>
           
            
            <p>Sua pesquisa por <?= $search ; ?> retornou <?= $count; ?> resultado!</p>
        </header>

        <?php 
          
           $getPage = (!empty($Link->getLocal()[2]) ? $Link->getLocal()[2]  : 1 );
           $Pager = new Pager( HOME . '/pesquisa/' . $search . '/');
           $Pager->ExePager($getPage, 12); //12 posts que será exibido por paginação
           $readArt = new Read();
           $readArt->readDb("jm_posts", "WHERE post_status = 1 AND (post_title LIKE '%' :link '%' OR post_content LIKE '%' :link '%') ORDER BY post_date DESC LIMIT :limit OFFSET :offset ", "link={$search}&limit={$Pager->getLimit()}&offset={$Pager->getOffset()}");
             if(!$readArt->getResult()):
               
                 $Pager->ReturnPage();
                 ErroJMX("Desculpe sua pesquisa não retornou resultados!", JMX_INFO);
                 
             else:
               
               $countCat = 0;
               $View = new View();
               $tpl_art = $View->Load('article_3_col');
               
               foreach ($readArt->getResult() as $art):
                   
                   $countCat++;
                   
                   $class = ( $countCat % 3 == 0 ? ' class="right"' : null);
               
                   echo " <span{$class}>";
                   
                      $art['post_title'] = Check::limitWords( $art['post_title'] , 9 );
                      $art['post_content'] = Check::limitWords($art['post_content'] , 9 );
                      $art['datetime'] = date("Y-m-d", strtotime( $art['post_date'])); 
                      $art['pubdate'] = date("d/m/Y H:i", strtotime( $art['post_date']));
                      $View->Show($art, $tpl_art);
                   
                   echo " </span>";
                   
                   
               
      
                endforeach;
            
             endif;
        
             echo '<nav class="paginator">';
           
            
             $Pager->ExePaginator("jm_posts","WHERE post_status = 1 AND (post_title LIKE '%' :link '%' OR post_content LIKE '%' :link '%')","link={$search}");
             echo $Pager->getPaginator();
             
             echo '</nav>';
             
        ?>

        
            
      

    </section>

    <div class="clear"></div>

</div>
</div>
