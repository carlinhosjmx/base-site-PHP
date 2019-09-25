<div class="container-fluid">
<div class="container">

<div class="box-home back">

   
        
        <h1 class="boxtitle">Estatísticas de Acesso :</h1>

        <?php

         use app\Conn\Read;
                               
                             
                            $read = new Read;

                              

                            $read->FullRead("SELECT  *  FROM  jm_pageview WHERE pageView_date = CURRENT_DATE() AND pageView_page IS NOT NULL  ORDER BY pageView_hora DESC ");
                      
                              $cont = $read->getRowCount();

                              echo "<h3>Hoje houve " . $cont .  " acessos ao site</h3>";
                              
                                 $contador = 0;
                                $contaDisp= 0;
                                  $contaDisp2= 0;

                               foreach (   $read->getResult() as $dados ):
                                          
                                   

               
                     
                                       if( $dados['pageView_estado'] == 'do Rio de janeiro' ):

                                           $contador =  $contador + 1;

                                  
                                    endif;

                                         if( $dados['pageView_disp'] == 'Computador' ):

                                            $contaDisp =   $contaDisp + 1;

                                                                        
                                      endif;

                                        if( $dados['pageView_disp'] == 'Celular Android' ):

                                            $contaDisp2=   $contaDisp2 + 1;

                                                                        
                                      endif;


                                       


                            endforeach;
                            echo "<div class='box-display'>";
                            echo "<div class='linha-estatis'><div class='num'>" . $contador . "</div><div class='desc'> do Rio de janeiro</div></div>" ;
                            echo "<div class='linha-estatis'><div class='num'>" .  $contaDisp . " </div><div class='desc'> Acessado pelo Computador</div></div>" ;
                            echo "<div class='linha-estatis'><div class='num'>" .  $contaDisp2 . "</div><div class='desc'>  Acessado pelo Celular</div></div>" ;
                            echo "</div>";

                  ?>


        <a href="painel.php?exe=statistics/rel" class="btn-block-rel" >Relatório Completo  <i class="fa fa-arrow-circle-right"></i></a>
   
       <div class="content">

        

        

        <section class="content-post">

            <h1 >Postagem mais vista:</h1>

            <?php
            
             $read = new Read;

            $read->readDb("jm_posts", "INNER JOIN jm_sub_category ON post_category = id_sub_category ORDER BY post_views DESC LIMIT 3");
            if ($read->getResult()):
                foreach ($read->getResult() as $re):
                    extract($re);
                    ?>
                    <article class="box-post">

                        <div class="box-thumbnail">
                             <?php

                             if(!$post_cover):

                                echo "<h4>Sem imagem publicada</h4>";
                             else:

                            echo "<img src='" . HOME ."/uploads/". $post_cover ."' />";

                             endif;

                            ?>
                        </div>

                        <h2><a target="_blank" href="../<?= $sub_category_name; ?>" title="Ver Post"><?= Check::limitWords($post_title, 10) ?></a></h2>
                        <p><?= $sub_category_tags; ?></p>
                       
                         <!-- <p class="data-post"><strong>Data:</strong>  date('d/m/Y H:i', strtotime($post_date)); ?>Hs</p>-->
                        
                        <ul >
                            
                            <li class="btn-block-post"><a class="act_edit" target="_blank" href="../<?= $sub_category_name; ?>" title="Ver no site">Ver no site</a></li>
                            <li class="btn-block-post"><a class="act_edit" href="painel.php?exe=posts/update&postid=<?= $post_id; ?>" title="Editar">Editar</a></li>

                           <!--   <?php //if (!$post_status): ?>
                                <li  class="btn-block-post"><a class="act_active" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=active" title="Ativar">Ativar</a></li>
                            <?php //else: ?>
                              <li  class="btn-block-post"><a class="act_inative" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=inative" title="Inativar">Inativar</a></li>
                            <?php //endif; ?>

                            <li  class="btn-block-post"><a class="act_delete" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=delete" title="Excluir">Deletar</a></li>-->
                        </ul>

                    </article>
                    <?php
                endforeach;
            endif;
            ?>

            <div class="clear"></div>
        </section>           

        <section class="content-statistic">

        <h1 >Publicações Recentes:</h1>
           

            <?php
            $read->readDb("jm_posts", "INNER JOIN jm_sub_category ON post_category = id_sub_category ORDER BY post_date DESC LIMIT 3");
            if ($read->getResult()):
                foreach ($read->getResult() as $re):
                    extract($re);
                    ?>
                    <article class="post-statis">

                        <div class="box-thumbnail">
                         <?php

                             if(!$post_cover):

                                echo "<h4>Sem imagem publicada</h4>";
                             else:

                            echo "<img src='" . HOME ."/uploads/". $post_cover ."' />";

                             endif;

                            ?>
                        </div>

                        <h2><a target="_blank" href="../<?= $sub_category_name; ?>" title="Ver Post"><?= Check::limitWords($post_title, 10) ?></a></h2>
                         <p><?= $sub_category_tags; ?></p>
                        
                        <!-- <p class="data-post"><strong>Data:</strong> ?= date('d/m/Y H:i', strtotime($post_date)); ?>Hs</p>-->
                        
                        <ul >
                            
                            <li  class="btn-block-statistic"><a class="act_edit" target="_blank" href="../<?= $sub_category_name; ?>" title="Ver no site">Ver no site</a></li>

                            <li  class="btn-block-statistic"><a class="act_edit" href="painel.php?exe=posts/update&postid=<?= $post_id; ?>" title="Editar">Editar</a></li>

                           <!-- <?php //if (!$post_status): ?>
                                <li  class="btn-block-statistic"><a class="act_active" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=active" title="Ativar">Ativar</a></li>
                                
                            <?php //else: ?>
                                <li  class="btn-block-statistic"><a class="act_inative" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=inative" title="Inativar">Inativar</a></li>
                            <?php// endif; ?>

                            <li class="btn-block-statistic"><a class="act_delete" href="painel.php?exe=posts/index&post=<?= $post_id; ?>&action=delete" title="Excluir">Deletar</a></li>-->
                        </ul>

                    </article>
                    <?php
                endforeach;
            endif;
            ?>

           <div class="clear"></div>

        </section>          


                

    </div> <!-- CONTENT -->


        <article >

            <h2 class="browser" >Visitas por Navegador:</h2>

            <?php
            //LE O TOTAL DE VISITAS DOS NAVEGADORES
            $read->FullRead("SELECT SUM(agent_views) AS TotalViews FROM jm_siteviews_agent");
            $TotalViews = $read->getResult()[0]['TotalViews'];

            $read->readDb("jm_siteviews_agent", "ORDER BY agent_views DESC LIMIT 3");
            if (!$read->getResult()):
                ErroJMX("Oppsss, Ainda não existem estatísticas de navegadores!", WS_INFOR);
            else:
                echo "<ul>";
                foreach ($read->getResult() as $nav):
                    extract($nav);

                    //REALIZA PORCENTAGEM DE VISITAS POR NAVEGADOR!
                    $percent = substr(( $agent_views / $TotalViews ) * 100, 0, 5);
                    ?>
                    <li>
                        <p><strong><?= $agent_name; ?>:</strong> <?= $percent; ?>%</p>
                        <span style="width: <?= $percent; ?>%"></span>
                        <p><?= $agent_views; ?> visitas</p>
                    </li>
                    <?php
                endforeach;
                echo "</ul>";
            endif;
            ?>

            <div class="clear"></div>
        </article>



    
    </div>



        </div>
        </div>
        