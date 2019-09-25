
<div class="container-fluid box-home">
   
<div class="box-consulta">



   

       
<?php
     
        
      use app\Conn\Read;

      $id = $_GET['cod'];

     


   

        
           $geral = new Read;
           $geral->FullRead("SELECT * FROM jm_clientes INNER JOIN jm_servicos ON jm_clientes.id_cliente = jm_servicos.id_cliente WHERE jm_clientes.id_cliente = $id");

            if($geral->getResult()):

       

               /*foreach($geral->getResult() as $itens):

                $separa1 = explode("-", $itens['data_cad']);

                $parte = explode(' ',$separa1[2]);

                $separa2 = explode("-", $itens['data_consulta']);

                $dataCad = $parte[0]."/". $separa1[1]."/".$separa1[0];

                $dataConsulta = $separa2[2]."/". $separa2[1]."/".$separa2[0];*/

                $dados = $geral->getResult()[0]['data_cad'];

           
                 $separa = explode("-",$dados);

                 $final =  explode(" ",$separa[2]);

                $data = $final[0]."/".$separa[1]."/".$separa[0];

                $separa2 = explode("-",$geral->getResult()[0]['data_consulta']);

                 $final2 =  explode(" ",$separa2[2]);

                $dataConsulta = $final2[0]."/".$separa2[1]."/".$separa2[0];


       



            ?>

            <div class="line-header">

             <h1>Cliente : <span> <?php echo  $geral->getResult()[0]['nome_cli']; ?></span></h1>

             <a class="altera" href="painel.php?exe=sistema/update&id=<?= $id; ?>" title="Editar">Alterar Data 20 dias a frente</a>

             </div>

            <div class="dados-top">

          
             <div class="blocos">  
                <div class="titulo">CPF</div>
                <div class="conteudo"><?php echo  $geral->getResult()[0]['cpf']; ?></div>
            </div><!--blocos-->

             <div class="blocos2">  
                <div class="titulo">Telefone 1</div>
                <div class="conteudo"><?php echo  $geral->getResult()[0]['telefone_1']; ?></div>
            </div><!--blocos-->

             <div class="blocos2">  
                <div class="titulo">Nº registro CNH</div>
                <div class="conteudo"><?php echo  $geral->getResult()[0]['registro_cnh']; ?></div>
            </div><!--blocos-->

            
             <div class="blocos3">  
                <div class="titulo">Data de entrada</div>
                <div class="conteudo"><?php echo  $data; ?></div>
            </div><!--blocos-->
               <div class="blocos3">  
                <div class="titulo">Data de consulta</div>
                <div class="conteudo"><?php echo  $dataConsulta; ?></div>
            </div><!--blocos-->

            

          </div>

          <h2>Documentos:</h2>
          <div class="blocos-imagens" id="div-id-name">
              
          

           <?php  for( $i=1;$i<=6; $i++):

                if(isset($geral->getResult()[0]["doc{$i}"])):

                echo "  <div id='div".$i."' class='bloco-img'><a href='../uploads/" . $geral->getResult()[0]["doc{$i}"]."' target='_blank'>Ver Doc".$i."</a>

                

                </div>";

                 endif;

              endfor;  ?>

            </div>

         

              

       <?php


         else:

          echo "<h2 class='display'>Não há clientes a consultar hoje!</h2>";
            endif;


              
            
   
         ?>
<!-- <div class='line-imp'><a href='#'  onclick='javascript:printlayer(\"div".$i."\")'>Imprimir esta imagem</a></div>-->
        

         <div class="display-view">

          <h2>Links para consultar</h2>

          <ul>
<li><a href="http://www.detran.rj.gov.br/" target="_blank" rel="noopener noreferrer">Site do Detran</a></li>
<li><a href="http://www.denatran.gov.br/" target="_blank" rel="noopener noreferrer">Site do Denatran </a></li>
<li><a href="http://www.prf.gov.br/portal/" target="_blank" rel="noopener noreferrer">Pol&iacute;cia Rodovi&aacute;ria Federal</a></li>
<li><a href="https://banco.bradesco/html/classic/produtos-servicos/mais-produtos-servicos/pagamentos.shtm" target="_blank" rel="noopener noreferrer">Pagamento de IPVA, DUDA, MULTAS</a></li>
<li><a href="http://www0.rio.rj.gov.br/multas/">Consulta de multas Prefeitura RJ</a></li>
<li><a href="http://www.detran.rj.gov.br/_documento.asp?cod=1410" target="_blank" rel="noopener noreferrer">Consulta de multas Detran</a></li>
<li><a href="http://www.dprf.gov.br/PortalInternet/nadaConsta.faces" target="_blank" rel="noopener noreferrer">Consulta de Multas Pol&iacute;cia Rodovi&aacute;ria Federal </a></li>
<li><a href="http://www.der.rj.gov.br/jari.asp" target="_blank" rel="noopener noreferrer">Consulta de Multas DER</a></li>
<li><a href="http://www.detran.rj.gov.br/_monta_aplicacoes.asp?cod=16&amp;tipo=crlv" target="_blank" rel="noopener noreferrer">Consulta situa&ccedil;&atilde;o do veiculo RJ</a></li>
<li><a href="http://denatran.serpro.gov.br/index2.htm" target="_blank" rel="noopener noreferrer">Consulta ve&iacute;culo Denatran</a></li>
<li><a href="http://www.consultadividaativa.rj.gov.br/RDGWEB/servlet/StartCISPage?PAGEURL=/cisnatural/NatLogon.html&amp;xciParameters.natsession=Consulta_Debitos_DA" target="_blank" rel="noopener noreferrer">D&iacute;vidas ativas RJ</a></li>
<li><a href="http://www.rio.rj.gov.br/web/smtr/" target="_blank" rel="noopener noreferrer">Secretaria municipal de transportes do RJ</a>&nbsp;&nbsp;</li>
<li><a href="https://pagamento.dpvatsegurodotransito.com.br/" target="_blank" rel="noopener noreferrer">Consulta DPVAT </a></li>
<li><a href="http://www.der.rj.gov.br/" target="_blank" rel="noopener noreferrer">Departamento de estradas e rodagem - DER</a></li>
<li><a href="http://www.antt.gov.br/" target="_blank" rel="noopener noreferrer">ANTT</a></li>
<li><a href="http://consultapublicarn3.antt.gov.br/Transportador.aspx" target="_blank" rel="noopener noreferrer">Consulta registro ANTT</a></li>
</ul>



          









           





 

</div>
</div>
