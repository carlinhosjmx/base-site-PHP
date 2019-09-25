<?php

 require_once('mailJmx/PHPMailerAutoload.php');

$nome 	  = $_POST['nome'];
$fone 	  = $_POST['fone'];
$email 	  = $_POST['email'];
$zap      = $_POST['zap'];
$bairro   = $_POST['bairro'];
$cidade	  = $_POST['cidade'];
$mensagem  = $_POST['mensagem'];
$servico  = $_POST['servico'];
$arquivo   = $_FILES["arquivo"];
$arquivo1  = $_FILES["arquivo1"];


$assunto  = 'enviado por: '.$nome;
 
$tamanhoArq = 25000000;
$tipoArq = [

'application/cdr', 
'image/jpeg', 
'image/pjpeg', 
'image/bmp',
'application/pdf', 
'application/postscript',
'application/octet-stream',
'application/msword',
'application/vnd.openxmlformats-officedocument.wordprocessingml.document'

];




 

if(empty($nome)):

echo '<script language="JavaScript">alert("Preencha o campo Nome antes de enviar!");
location.href="contato";
</script>';

exit;

elseif(empty($email)):

	echo '<script language="JavaScript">alert("Preencha o campo email antes de enviar!");
location.href="contato";
</script>';

exit;


elseif(empty($fone)):

	echo '<script language="JavaScript">alert("Preencha o campo Telefone antes de enviar!");
location.href="contato";
</script>';

exit;


endif; 


if(empty($arquivo['name']) && empty($arquivo1['name'])):






elseif($arquivo['size'] > $tamanhoArq):

      echo '<script language="JavaScript">alert("O tamanho do arquivo de ve ser no máximo de 25mb!");
location.href="contato";
</script>';

elseif($arquivo1['size'] > $tamanhoArq):

      echo '<script language="JavaScript">alert("O tamanho do arquivo de ve ser no máximo de 25mb!");
location.href="contato";
</script>';

exit;

elseif(!in_array($arquivo['type'], $tipoArq)):
 
 
       echo '<script language="JavaScript">alert("Só é aceito arquivos do tipo imagem, pdf, corel, photoshop, illustrator e word!");
location.href="contato";
</script>';

exit;

elseif(!in_array($arquivo1['type'], $tipoArq)):

     echo '<script language="JavaScript">alert("Só é aceito arquivos do tipo imagem, pdf, corel, photoshop, illustrator e word!");
location.href="contato";
</script>';

exit;
                             

endif;

if(preg_match("/www/",$mensagem)):

   echo '<script language="JavaScript">alert("Não é aceito mensagem com propagandas, use este formulário para informações sobre serviços!");
location.href="contato";
</script>';

exit;



endif;

if(preg_match("/.com/",$mensagem)):

   echo '<script language="JavaScript">alert("Não é aceito mensagem com propagandas, use este formulário para informações sobre serviços!");
location.href="contato";
</script>';

exit;

endif;

if(filter_var($email, FILTER_VALIDATE_EMAIL) == false):


?>


<script language="JavaScript">alert('Esse formato de email não é válido');

</script>


<?php
                        
exit;
endif;

$data = date("d/m/Y – H:i", time()+(-1)*3600);


$Mensagem = "<strong>Nome:</strong> $nome<br> 
 <strong>Telefone:</strong> $fone<br> 
 <strong>Email:</strong> $email<br>
 <strong>Na data:</strong> $data<br> 
 <strong>Whatsapp:</strong> $zap<br>
 <strong>Bairro:</strong> $bairro<br>
 <strong>Tipo de serviço:</strong> $servico<br> 
 <strong>Mensagem:</strong> $mensagem";
 

 $mail   = new PHPMailer();

 /* 
 $mail->Charset = 'UTF-8';

 $mail->SMTPSecure = 'ssl';

 $mail->IsSMTP();

 $mail->Host = 'mail.jmxrio.com.br';

 $mail->Port = 465;

 $mail->SMTPAuth = true;

 $mail->Username = "contato@jmxrio.com.br"

 $mail->Password = "senha";  */



 $mail->isHtml();

 $mail->SetFrom('envio@construgessorj.com.br'); //remetente

 $mail->FromName = 'Vindo do Site construgesso rj';

 $mail->AddAddress("carlinhosjmx@gmail.com"); //destinatário
 
 $mail->Subject = $assunto;

 $mail->AltBody = 'para ver esse email veja em um programa de email!';
 
 $mail->MsgHTML($Mensagem);
 
 $mail->AddAttachment($arquivo['tmp_name'], $arquivo['name']  );
  $mail->AddAttachment($arquivo1['tmp_name'], $arquivo1['name']  );
 
 if(!$mail->Send()) {

   echo "Erro: " . $mail->ErrorInfo;

  }else{

   ?>



   <script language="JavaScript">alert('Sua mensagem foi enviada com sucesso! Em breve voce vai receber um retorno!');
location.href='contato' ;
</script>


   <?php

   

   }


?>