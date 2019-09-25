<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Partituras musicais</title>
<meta name="description" content="Encontre as partituras de suas músicas preferidas, o partituras.com é um site de músico para músico. Venha fazer parte desta família."/>
<meta name="robots" content="index, follow" />
<link rel="canonical" href="http://www.partiturasmusicais.com">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="style-v1.2.css" />


</head>

<body >

<?php

		include_once('conectionx2sa.php'); 

		include_once('PHPMailer/PHPMailer.php'); 
		include_once('PHPMailer/Exception.php'); 
		
		
    use PHPMailer\PHPMailer;
    use PHPMailer\Exception;
    
	if(isset($_POST['acao']) && $_POST['acao'] == "cadastrar" )
	{
		
		$nome = $_POST['Nome'];
		$apelido = $_POST['nomeArtist'];
		$email = $_POST['Email'];
		$codmail = md5($_POST['Email']);
		$senha = md5($_POST['Senha']);
		$tel = $_POST['Telefone'];
		$bairro = $_POST['Bairro'];
		$cidade = $_POST['Cidade'];
		$instrumento = $_POST['Instrumento'];
		$skin = 'fotoUser/user.jpg';
    $uid = uniqid( rand( ), true );
    $data_ts = time( );
		$activo = 0 ;
		
		
		
		$sqlVerificaUser = $conn->query(" SELECT * FROM cadastro WHERE email = '$email' ");
		
		$recebe = $sqlVerificaUser->num_rows;
		
			
		if( $recebe >= 1 )
		{
			
			$alerta = " já existe um usuário com este email cadastrado! ";
		    	
			
		
		}else if( empty($nome)){
			   
			   $alerta = " O campo <strong> Nome </strong> precisa ser preenchido ";
				
		}else if( empty($apelido)){
			  
			  $alerta = " O campo <strong> Nome Artístico </strong> precisa ser preenchido "; 
			  
		}else if( empty($instrumento)){
			  
			  $alerta = " O campo <strong> Instrumento</strong> precisa ser preenchido "; 
			  
		}else if( empty($tel)){
			  
			  $alerta = " O campo <strong> Telefone</strong> precisa ser preenchido "; 
			  
		}else if( empty($bairro)){
			  
			  $alerta = " O campo <strong> Bairro </strong> precisa ser preenchido "; 
			  
		}else if( empty($cidade)){
			  
			  $alerta = " O campo <strong> Cidade </strong> precisa ser preenchido "; 
			  
		}else if( empty($email)){
			  
			  $alerta = " O campo <strong> E-mail </strong> precisa ser preenchido "; 
			  
		}else if( empty($senha)){
			  
			  $alerta = " O campo <strong> Senha</strong> precisa ser preenchido "; 
			  
		}else{
		 
					$sqlCadastrarUser = $conn->query("INSERT into cadastro (nome,apelido, email, senha, bairro, cidade, instrumento, telefone1, foto, codmail, uid, data_ts, activo) VALUES ( '$nome','$apelido','$email','$senha', '$bairro', '$cidade', '$instrumento', '$tel', '$skin', '$codmail', '$uid','$data_ts', '$activo' )" ) ;
					
		  
		   
		   
		
		    if(  $sqlCadastrarUser >=1 ) {  
				
				   
                   $id = $conn->insert_id;
				  
                      // Criar as variaveis para validar o email
                    $url = sprintf( 'email=%s&id=%s&uid=%s&key=%s',$codmail,$id, $uid, $data_ts);

                   $mensagem = '<h2>Partituras Musicais.com </h2><br>Para confirmar seu cadastro clique  no link abaixo ou copie todo o link, cole em seu navegador e aperte enter:<br><br>'."\n";
                   $mensagem .= sprintf('http://www.partiturasmusicais.com/activate.php?%s',$url);
				  
                   
										
									 
									 $mail = new PHPMailer(true);

										try {
												//Server settings
												$mail->SMTPDebug = 1;                                       
												$mail->isSMTP();                                            
												$mail->Host       = 'smtp.partiturasmusicais.com';  
												$mail->SMTPAuth   = true;                                  
												$mail->Username   = 'suporte@partiturasmusicais.com';                     
												$mail->Password   = '@Partituras10@';                              
												$mail->SMTPSecure = '';                                  
												$mail->Port       = 587; 
											              

												
												$mail->setFrom('suporte@partiturasmusicais.com', 'Partituras Musicais');
												$mail->addAddress( $email , $nome);     

											
												$mail->isHTML(true);                                  
												$mail->Subject = 'Bem vindo ao site Partituras Musicais.';
												$mail->Body    = $mensagem;
												

												$mail->send();
												echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
																			alert ("cadastrado com sucesso! Em até 20 minutos você receberá um email de ativação. Verifique sua caixa de lixo ou spam se não receber! ") ; location.href = "http://www.partiturasmusicais.com/index.php";
																			</SCRIPT>';
										} catch (Exception $e) {

											echo "erro ao enviar" .$mail->ErrorInfo;
											echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
											alert ("Houve um erro ao se cadastrar. Tente novamente! ") ; location.href = "http://www.partiturasmusicais.com/index.php";
										</SCRIPT>';
										}


    
       	           
         }else{


								echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
								alert ("Houve um erro ao se cadastrar. Tente novamente! ") ; location.href = "http://www.partiturasmusicais.com/index.php";
							</SCRIPT>';
		 
		 		
		  }
	}
	
		 
}	



?>


<div id="header">

    <div id="header_inter">
    <div id="logo_mobile_init">PartiturasMusicais.com</div>
  <div id="logo"><img src="images/logo.png" /></div>

  
     <?php 
	    
		if(isset($alertaLogin) && $alertaLogin != "" ){
		   
		   echo "<div id='alertaLogin'>".$alertaLogin."</div>";
						
		}
		
	?>
   <div id="logar">
    
      
    
     <form class="formInit" name="login" method="post" action="login.php" enctype="multipart/form-data" >
   
      
        
         <label class="line-input-init" ><div class="label-txt-init"> E-mail:</div> <input name="email" type="text" id="mail" size="23" /></label>
          <label class="line-input-init"><div class="label-txt-init">Senha: </div><input name="senha" type="password" id="senha" size="20" /></label>
          <label><input type="hidden" name="acao" value="autenticar" /></label>
          <label class="line-input-init"><div class="label-txt-init"> </div><input name="entrar" type="submit" class="entrar" value="Entrar"></label>
       
        
      </form>
   
   
   </div><!--logar-->

</div>

</div><!--header-->

<div id="content1">

<div id="center">

<div id="imageLeft"><h1>O Portal do Músico</h1> <h3> Conheça novos músicos, encontre e compartilhe partituras.</h3><img src="images/musicos.jpg" /></div>


 <?php
		    
			if(isset($alerta) && $alerta != "")
			{
				echo "<div id='alertaCadastro'>$alerta</div>";
				
			}
		
		?>
      
<div id="login">

   
   <div id="form_login1">
     
     <form  name="login" method="post" action="" class="cadastro" enctype="multipart/form-data">   
       <fieldset>
           <legend><h2> Faça já o seu cadastro, é <span>GRÁTIS!</span></h2></legend>
            
          
    

  <div id="rotulo_cadastro">Nome:</div>
  <div class="campotxt"><input type="text" name="Nome"  value="<?php echo $nome ;  ?>" /> </div>

  <div id="rotulo_cadastro">Nome Artístico:</div>
  <div class="campotxt"><input type="text" name="nomeArtist"   value="<?php echo $apelido ;  ?>"/> </div>

  <div id="rotulo_cadastro">Instrumento:</div>
  <div class="campotxt"><input type="text" name="Instrumento" value="<?php echo $instrumento ;  ?>"/> </div>

  <div id="rotulo_cadastro">Telefone:</div>
  <div class="campotxt"><input type="text" name="Telefone"  value="<?php echo $tel ;  ?>"/></div>
  
  <div id="rotulo_cadastro">Bairro:</div>
  <div class="campotxt"><input type="text" name="Bairro"  value="<?php echo $bairro ;  ?>" /></div>
  <div id="rotulo_cadastro">Cidade:</div>
  <div class="campotxt"><input type="text" name="Cidade"  value="<?php echo $cidade ;  ?>"/></div>

  <div id="rotulo_cadastro">Email:</div>
  <div class="campotxt"><input type="text" name="Email"  value="<?php echo $email ;  ?>"/></div>

  <div id="rotulo_cadastro">Senha:</div>
  <div class="campotxt"><input type="password" name="Senha"  value="<?php echo $senha ;  ?>" /></div>
  
  
          <input type="hidden" name="acao" value="cadastrar" />
          <input name="entrar" type="submit" id="entrar" value="Enviar cadastro"   >
         </div><div class="txtsenha"><a href="altersenha.php">Esqueceu
      a senha?</a></div>
      
          <div class="txtsenha"><a href="comoentrar.php">Cadastrou e não consegue entrar?</a>
 

 </fieldset>
</form>
  
     </div>
    
  </div>
  </div>
 </div><!--content-->
 <?php
   
   include "footer.php";

?>


   
</body>
</html>