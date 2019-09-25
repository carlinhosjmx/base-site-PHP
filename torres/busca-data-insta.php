



<div class="container-fluid box-home">
   
<div class="box-busca">

     <header>
    <h1>Multas Variadas</h1>
            <h2>Consulta por Data</h2>
        </header>

        <?php

      //require('../../_app/Config.inc.php');
     // require_once ("../../vendor/autoload.php");

      use app\Conn\Read;


        $dados = $_POST['dados'];

        $separa = explode("/",$dados);

        $data = $separa[2]."-".$separa[1]."-".$separa[0];

 




        
           $lista = new Read;
           $lista->readDb("jm_clientes","WHERE data_consulta = :data ", "data={$data}");

            if($lista->getResult()):

            	?>

            		<table class="table table-striped">
               <thead>
                
                    <tr>
                      <th>Nome do cliente</th>
                      <th>data de entrada</th>
                      <th>data a consultar</th>
                      <th>ir para consulta</th>
                    </tr>
                 </thead>
                  <tbody>


            	<?php

            	 foreach($lista->getResult() as $itens):


               ?>


            
             

                   <tr>
                    <td><?php echo $itens['nome_cli'] ?></td>
                     <td><?php echo  $itens['data_cad'] ?></td>
                    <td><?php echo   $itens['data_consulta'] ?></td>
                    <td><?php echo "<a href='painel.php?exe=sistema/consultar&cod={$itens['id_cliente']}'>Consultar</a>"; ?></td>



                   </tr>

               
            

               
            <?php


           endforeach;

           echo  '   </tbody></table>';
            endif;



          ?>

 
       



            
			
		  

           
           
           
       
    


        

   
              <!--  <label >
                    <span class="field">Categoria:</span>
                       
                     <select name="post_category" onchange="fetch_select(this.value);" class="form-control control-p">
                        <option value=""> Selecione a SubCategoria: </option>                        
                   <?php
                        $readSes//= new Read;
                      //  $readSes->//readDb("jm_sub_category", "WHERE sub_category_name IS NOT NULL ORDER BY sub_category_name ASC");

                       
                     //   if ($readSes->getRowCount() >= 1):

                      //      foreach ($readSes->getResult() as $ses):
                              
                        //       echo "<option  value=\"{$ses['id_sub_category']}\"> {$ses['sub_category_tags']} </option>";
                                                             

                        //    endforeach;

                         
                      //  endif; 
                        ?> 

                    </select>
                </label>-->

                               
      
                           
       
                  
           
           
              
            
   
         

    </article>

    <div class="clear"></div>
</div> <!-- content home -->
</div>
</div>
