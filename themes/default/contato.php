<?php



 if($Link->getData()):
     
     extract($Link->getData());
 else:
     
     
     
 endif;


?>




 <div class="container-fluid">
 <div class="line-1"><h1>Fale Conosco</h1></div>
 <div class="container">

     

      
   
    

    <div class="line-2-contatos">
 
      <div class="col-50">


       
     


         <h1>Envie sua solicitação no formulário abaixo:</h1>
   

         

           <div class="boxform" >



  

             

 
        <?php
       

        $contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
       
        
                    
        


        if ($contato && $contato['SendPostForm']):

          
            
          
              unset($contato['SendPostForm']);

            $contato['Assunto'] = "Enviado através do site torres despachante";
            $contato['DestinoNome'] = " torres despachante";
            $contato['DestinoEmail'] = "torresdespachantepublico@gmail.com";


                   

            $email = new Email;
            $email->Enviar($contato);

            if($email->getError()):

            ErroJMX( $email->getError()[0],  $email->getError()[1]);

          
            endif;

         endif;

         
     ?>


       <form action="" method="post" enctype="multipart/form-data">
        
        <div class="line-input">
        <label>Nome :</label>
        <input type="text" name="RemetenteNome" placeholder="Digite seu nome" required="required">   
        </div>
         <div class="line-input">
        <label>Telefone :</label>
        <input type="tel" name="RemetenteTel" placeholder="Digite seu telefone" required="required">
        </div>  
        <div class="line-input">
        <label>E-mail :</label>
        <input type="email" name="RemetenteEmail" placeholder="Digite seu email" required="required"> 
        </div>
        <div class="line-input">
        <label>Cidade :</label>
        <input type="text" name="RemetenteCidade" placeholder="Digite a sua cidade" required="required">
       </div>
        <label>Informações adicionais:</label>
        <textarea name="Mensagem" placeholder="Informe aqui o que você deseja, detalhes..." ></textarea>       
    
        <input type="submit" onclick="enviar();" name="SendPostForm"  value="enviar mensagem" />
    
    
         </form>
    
    
    





    


    

</div><!--box-form-->

 <div class="box-info">

<?php

   use app\Conn\Read;

   $readCont = new Read();
           $readCont ->readDb("jm_posts", "WHERE post_status = 1 AND ( post_name = :cat OR post_category = :cat) ORDER BY post_order ASC ", "cat=13");
            

             if(!$readCont ->getResult()):
               
                
                 ErroJMX("Nada postado ainda, visite em breve!", JMX_INFO);
                 
             else:

             

                foreach($readCont ->getResult() as $cont):
               
                  
                     

                      if( $cont['post_order'] == '1'):


                      echo ' <h2><i class="fa fa-phone-square"></i>'.$cont['post_title'].': </h2>

                         '.$cont['post_content'];


                     endif;

                        if( $cont['post_order'] == '2'):


                      echo ' <h3><i class="fa fa-envelope"></i>'.$cont['post_title'].':</h3>

                            <p>'.$cont['post_content'].'</p>';


                     endif;

                    


                 endforeach;







            
             endif;

  ?>



          

             

             

                      
                       

            </div><!--box-info-->
                       

                   
            



        </div><!--box-content-contato-->
          


  

      <div class="col-45">

         <div class="box-content-contato"> 

         <div class="box-mapa">

         <h2>Veja nossos endereços no mapa abaixo:</h2>
         <h3>Avenida Maria Teresa,260,bloco 01 (Royal) sala 414
Plaza Office - Campo Grande - RJ</h3>
           <div class="mapa">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.182487452949!2d-43.56828738571015!3d-22.90663898501195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9be3f8cfd4381f%3A0x75d74015bfa392a2!2sAv.+Maria+Teresa%2C+260+-+Campo+Grande%2C+Rio+de+Janeiro+-+RJ%2C+23050-160!5e0!3m2!1spt-BR!2sbr!4v1497020296135"  frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
         </div><!--mapa-->


         <h3>Estrada do Campinho, 2017
Campo Grande - RJ</h3>

          <div class="mapa">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3675.4891655109386!2d-43.586460885710466!3d-22.89532158501765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9be38c308a2b41%3A0xccbddeda0e9af3c1!2sEstr.+do+Campinho%2C+2017+-+Campo+Grande%2C+Rio+de+Janeiro+-+RJ%2C+23070-220!5e0!3m2!1spt-BR!2sbr!4v1497020359064" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
         </div><!--mapa-->

        
                      

         </div>

        
</div><!--col-50-->
</div><!--line-2-contatos-->

</div>
</div>
