


<div class="box-estatistica">


            <section class="content-rel">
          
            <h1>Relatório de Acesso ao Site</h1>
         
          <div class="box-1">
            <?php

               use app\Conn\Read;
               use app\Helpers\Pager;
            
                               
                                //OBJETO READ
                            $read = new Read;
                            $cont = new Read;


                             $getPage = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);

                          
                             $Pager = new Pager('painel.php?exe=statistics/rel&page=');
                             $Pager->ExePager($getPage, 10);

                              //SELECT  *  FROM  jm_pageview WHERE pageView_date = CURRENT_DATE()  ORDER BY pageView_hora DESC

                              $cont->readDb("jm_pageview" ,"Where pageView_date = CURRENT_DATE() and pageView_page IS NOT NULL  ORDER BY pageView_hora DESC");

                            $read->readDb("jm_pageview" ,"Where pageView_date = CURRENT_DATE() AND   pageView_page IS NOT NULL ORDER BY pageView_hora DESC LIMIT :limit OFFSET :offset", "limit={$Pager->getLimit()}&offset={$Pager->getOffset()} ");

                      
                              $contador = $cont->getRowCount();

                              echo "<h2>Hoje houve " . $contador . "  acessos ao site</h2>";
                              
                              echo " <div class='box-rel'>";

                               foreach (   $read->getResult() as $dados ):

                                  


                                 
                                 
                                         $data = $dados['pageView_date'];

                                         echo "<p> Dia " . date('d/m/Y', strtotime($data)) . " as {$dados['pageView_hora']} do  ip : {$dados['pageView_ip']}  {$dados['pageView_estado']}  acessou a  página {$dados['pageView_page']}  pelo {$dados['pageView_disp']}  </p>" ;
                                       
                                      

                            endforeach;
                            echo "  </div>";

                  ?>



              </div>

            </section>

     <?php
   
    $Pager->ExePaginator("jm_pageview", "Where pageView_date = CURRENT_DATE() ");
    $Paginar =  $Pager->getPaginator();

    ?>

       <div class="paginar">
    <?php echo $Paginar; ?>

    </div>
            

    </div> <!-- Estatísticas -->



    <div class="clear"></div>

    

        
        