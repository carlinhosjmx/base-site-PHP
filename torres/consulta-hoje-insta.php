
<div class="container-fluid box-home">
   
<div class="box-busca">

    <style>
        
       input{ padding: 5px; border: 1px solid #ccc; }

    </style>

    <article>

       
<?php
     
        
      use app\Conn\Read;

      date_default_timezone_set('America/Sao_Paulo');


        $dados = date("Y-m-d");

        $separa = explode("-",$dados);

        $data = $separa[2]."/".$separa[1]."/".$separa[0];

 
        
?>

   <header>
   	<h1>Multas Variadas</h1>
            <h2>Clientes para consultar Hoje: <?php echo $data ?></h2>
        </header>




<?php


        
           $lista = new Read;
           $lista->readDb("jm_clientes","inner join jm_servicos on jm_clientes.id_cliente = jm_servicos.id_cliente WHERE data_consulta = :data and servico = '1' ", "data={$dados}");

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

                $separa1 = explode("-", $itens['data_cad']);

                $parte = explode(' ',$separa1[2]);

                $separa2 = explode("-", $itens['data_consulta']);

                $dataCad = $parte[0]."/". $separa1[1]."/".$separa1[0];

                $dataConsulta = $separa2[2]."/". $separa2[1]."/".$separa2[0];


               ?>


            
             

                   <tr>
                    <td><?php echo $itens['nome_cli'] ?></td>
                     <td><?php echo  $dataCad ?></td>
                    <td><?php echo   $dataConsulta ?></td>
                    <td><?php echo "<a href='painel.php?exe=sistema/consultar&cod={$itens['id_cliente']}'>Consultar</a>"; ?></td>



                   </tr>

               
            

               
            <?php


           endforeach;

           echo  '   </tbody></table>';

         else:

          echo "<h2 class='display'>Não há clientes a consultar hoje!</h2>";
            endif;


              
            
   
         ?>

    </article>

 

</div>
</div>
