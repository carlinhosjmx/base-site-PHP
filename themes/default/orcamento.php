<?php



 if($Link->getData()):
     
     extract($Link->getData());
 else:
     
     header('location :' . HOME . DIRECTORY_SEPARATOR . '404');
     
 endif;


?>




 <div class="container-fluid">
 <div class="container">

     <div class="box-form" >



  

    <h1><i class="fa fa-envelope"></i>
Solicite um orçamento sem compromisso!</h1>

 
        <?php
       

        $contato = filter_input_array(INPUT_POST, FILTER_DEFAULT);
       
        
                    
        


        if ($contato && $contato['SendPostForm']):

          
            
          
              unset($contato['SendPostForm']);

            $contato['Assunto'] = "Enviado através do site padaria flor do valqueire";
            $contato['DestinoNome'] = " padaria flor do valqueire";
            $contato['DestinoEmail'] = "carlinhosjmx@gmail.com";

           

            $email = new Email;
            $email->Enviar($contato);

            if($email->getError()):

            ErroJMX( $email->getError()[0],  $email->getError()[1]);

          
            endif;

         endif;

         
     ?>


<form method="post" action="#contato" enctype="multipart/form-data" >


<label>Nome :</label>
<input type="text" class="form-control"  placeholder="Digite seu nome" name="RemetenteNome">

<label>Telefone :</label>
<input type="text" class="form-control"  placeholder="Digite seu Telefone" name="RemetenteTel" >

<label>E-mail :</label>
<input type="email" class="form-control"  placeholder="Digite seu e-mail" name="RemetenteEmail">

<label>Tipo de serviço / Dia e Horário:</label>
<textarea class="form-control" placeholder="Digite sua solicitação" rows="3" name="Mensagem"></textarea>


<button type="submit" value="enviar" name="SendPostForm" class="btn btn-default">Enviar</button>
</form>

    </div><!--box-form-->

    <div class="box-contato">

       <div class="contatos">

           <h2>Ou Ligue para nós: </h2>

                   <ul>
                             <li><i class="fa fa-phone-square"></i>
                                    (21) 99746-1447</li>
                             <li><i class="fa fa-phone-square"></i>
                                    (21) 96474-5447</li>
                           
                           
</li>


                    </ul>
                    
        </div>
   
    </div><!--box-contato-->

    <div class="clear"></div>


    

</div>
</div>
