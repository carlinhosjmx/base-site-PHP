<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
</head>

<body>

<?php
                   
                    //Recebe os valores dos campos do formulário
                    //os valores só são resgatados com $_POST[], pois no formulário o método de envio foi o post e não get!
$nome = $_POST['nome_D'];
$email = $_POST['email_D'];
$msg = $_POST['mensagem_D'];



 // aqui vai o email que irá receber os valores

$to = "partiturasmusicais540@gmail.com";

 
                   //verifica se há campo vazio no formulário

//die("$nome|$empresa|$email|$telefone");
if($nome == NULL || $email == NULL ):
?>

<script language="JavaScript">alert('Preencha os campos Nome, e-mail antes de enviar!');
location.href='denuncie.php';
</script>

<?php

                              // ainda dentro do if, ele pára a execução e fecha o if após isso
exit;
endif;
                              // Aqui ele verifica se o email contém caracteres válidos!
                             // Esse sistema é conhecido como Expresses Regulares…
if(filter_var($email, FILTER_VALIDATE_EMAIL) == false):


?>


<script language="JavaScript">alert('Esse formato de email não é válido');
location.href='denuncie.php';
</script>


<?php
                            // Pára a execução do sistema e termina o if
exit;
endif;
                            
                            // aqui define o campo assunto do e-mail

$assunto = "Denúncia do Site Partituras Musicais: ".$nome." em: ".date("d/m/Y - H:i",time()+0*3600);
                         
						                            // data atual

$data = date("d/m/Y – H:i",time()+0*3600);






                         // configurações para o corpo e anexo do email

$arquivo = isset($_FILES["arquivo"]) ? $_FILES["arquivo"] : FALSE;
	 
	if(file_exists($arquivo["tmp_name"]) and !empty($arquivo)){
	 
	 $fp = fopen($_FILES["arquivo"]["tmp_name"],"rb");
	 $anexo = fread($fp,filesize($_FILES["arquivo"]["tmp_name"]));
	 $anexo = base64_encode($anexo);
	 
	fclose($fp);
	 
	$anexo = chunk_split($anexo);
	 
	
	$boundary = "XYZ-" . date("dmYis") . "-ZYX";
	 
	 $mens = "--$boundary\n";
	 $mens .= "Content-Transfer-Encoding: 8bits\n";
	 $mens .= "Content-Type: text/html; charset=\"UTF-8\"\n\n";
	 $mens .= "<strong>Nome: </strong> $nome <br> <strong>Mensagem: </strong> $msg\r\n";
	 $mens .= "--$boundary\n";
	 $mens .= "Content-Type: ".$arquivo["type"]."\n";
	 $mens .= "Content-Disposition: attachment; filename=\"".$arquivo["name"]."\"\n";
	 $mens .= "Content-Transfer-Encoding: base64\n\n";
	 $mens .= "$anexo\n";
	 $mens .= "--$boundary--\r\n";
	 
	$headers  = "MIME-Version: 1.0\n";
	$headers .= "$cabecalho_da_mensagem_original";
	$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"";
	$headers .= "$boundary\n";
	}else{
	 
	$mens = "$configuracao_da_mensagem_original\n";
	$mens .= "<strong>Nome: </strong> $nome <br> <br><strong>Email: </strong> $email <br><br><strong>Data: </strong> $data <br><br> <strong>Denúncia:</strong> $msg\r\n";

	
	 
	$headers  = "MIME-Version: 1.0\n";
	$headers .= "$cabecalho_da_mensagem_original";
	$headers .= "Content-Type: text/html; charset=\"UTF-8\"";
	}
	 
	
	
	mail($to,$assunto,$mens,$headers);
	 
?>

<!-- Abre uma janela confirmando o envio e redirecionando para "index.htm". -->

<script language="JavaScript">alert('Sua mensagem foi enviada com sucesso! ');
location.href='denuncie.php' ;
</script>
</body>
</html>