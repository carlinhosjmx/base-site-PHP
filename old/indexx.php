<?php
   
   $conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "3o+W6-Mw64");
   $database = mysql_select_db("jmxrio_musicos");
?>
<html>
<head>
<title>Partituras musicais</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="description" content="O partituras Musicais é um site de compartilhamento de partituras entre músicos. Cadastre-se já! " />
  
  <meta name="keywords" content="partituras musicais, partituras, música, instrumentos musicais, músicos, trompete, trumpete, piano, saxofone, trombone, sax, contrabaixo, baixo" />
  
<meta name="robots" content="INDEX,FOLLOW">
  
<link rel="stylesheet" type="text/css" href="style.css" />






</head>

<body >

<?php
    
	if(isset($_POST['acao']) && $_POST['acao'] == "cadastrar" )
	{
		
		$nome = $_POST['Nome'];
		$apelido = $_POST['nomeArtist'];
		$email = $_POST['Email'];
		$senha = $_POST['Senha'];
		$tel = $_POST['Telefone'];
		$bairro = $_POST['Bairro'];
		$cidade = $_POST['Cidade'];
		$instrumento = $_POST['Instrumento'];
		$skin = 'fotoUser/user.jpg';
		
		$to ="carlinhosjmx@gmail.com";
		
		
		$sqlVerificaUser = mysql_query(" SELECT email FROM cadastro WHERE email = '$email' ") or die( mysql_error());
		
	    $recebe = mysql_num_rows($sqlVerificaUser);
		
		
		if( $recebe >= 1 )
		{
			
			$alerta = " já existe um usuário com este email cadastrado! ";
		    	
			
		
		}else if( empty($nome))
		
		    {
			   
			   $alerta = " O campo <strong> Nome </strong> precisa ser preenchido ";
				
			}else if(empty($apelido)){
				
				  $alerta = " O campo <strong> Nome Artístico </strong> precisa ser preenchido ";
			
			}else if( empty($email)){
			  
			  $alerta = " O campo <strong> Email </strong> precisa ser preenchido "; 
			  
			}
		else if( empty($senha)) 
		   {
			  
			  $alerta = " O campo <strong> Senha</strong> precisa ser preenchido "; 
			  
			}
			else if( empty($tel)) 
		   {
			  
			  $alerta = " O campo <strong> Telefone</strong> precisa ser preenchido "; 
			  
			}
		else if( empty($bairro)) 
		   {
			  
			  $alerta = " O campo <strong> Bairro </strong> precisa ser preenchido "; 
			  
			}
		else if( empty($cidade)) 
		   {
			  
			  $alerta = " O campo <strong> Cidade </strong> precisa ser preenchido "; 
			  
			}
        else if( empty($instrumento)) 
		   {
			  
			  $alerta = " O campo <strong> Instrumento</strong> precisa ser preenchido "; 
			  
			}
			else
	        {
				
				
                  $assunto = "Cadastro Partituras Musicais: ".$nome." em: ".date("d/m/Y - H:i",time()+0*3600);
                  $data = date("d/m/Y – H:i",time()+0*3600);


                  $mens = "$configuracao_da_mensagem_original\n";
	              $mens .= "O usuário abaixo quer se cadastrar no site Partituras Musicais:<br><br><strong>Nome: </strong> $nome <br> <br><strong>Nome Artistico:                  </strong> $apelido <br> <br><strong>Email: </strong> $email <br><br><strong>Senha: </strong> $senha <br> <br><strong>Telefone: </strong> $tel                      <br><br><strong>Bairro: </strong> $bairro <br> <br><strong>Cidade: </strong> $cidade <br> <br><strong>Instrumento: </strong> $instrumento                    <br> <br><strong>Data: </strong> $data <br><br> ";

		           $headers  = "MIME-Version: 1.0\n";
	               $headers .= "$cabecalho_da_mensagem_original";
	               $headers .= "Content-Type: text/html; charset=\"UTF-8\"";
	
	            	mail($to,$assunto,$mens,$headers);
	
	       }
	}
	 
?>
		 
	
			
			 echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
          alert ("cadastrado realizado com sucesso, em breve você receberá um email confirmando seu cadastro! ") ; location.href = "http://www.partiturasmusicais.com/indexx.php";
          
          </SCRIPT>';
*/
			  
		  }
		 
		
	}
	
		 
	 }



?>



<div id="header">

    <div id="header_inter">

  <div id="logo"><img src="images/logo.png" /></div>
  
  
     <?php 
	    
		if(isset($alertaLogin) && $alertaLogin != "" ){
		   
		   echo "<div id='alertaLogin'>".$alertaLogin."</div>";
						
		}
		
	?>
   <div id="logar">
    
      
    
     <form name="login" method="post" action="login.php" enctype="multipart/form-data" >
   
       <table  border="0" cellspacing="0" cellpadding="0">
         <tr>
            <td><div id="rotulo_form">Email:</div></td>
           <td><div id="rotulo_form" >Senha:</div></td>
         </tr>
         <tr>
            <td><div class="campotxt"><input name="email" type="text" id="mail" size="23"></div></td>
            <td><div class="campotxt"><input name="senha" type="password" id="senha" size="20"></div></td>
             <td><!--<input type="hidden" name="acao" value="autenticar" /> -->
                  <input name="entrar" type="submit" id="entrar" value="Entrar"></td>
       
          </tr>
         </table>
      </form>
   
   
   </div>

</div>

</div><!--header-->

<div id="content1">

<div id="center">

<div id="imageLeft"><h1>O portal do Músico</h1> <h3> Encontre e compartilhe partituras</h3><img src="images/musicos.jpg" /></div>


 <?php
		    
			if(isset($alerta) && $alerta != "")
			{
				echo "<div id='alertaCadastro'>$alerta</div>";
				
			}
		
		?>
      
<div id="login">
   <div id="form_login">
     
     <form name="login" method="post" action="" class="" enctype="multipart/form-data">   
       <fieldset>
           <legend><h2> Não é cadastrado? Faça seu cadastro aqui!</h2></legend>
            
          
    
<table width="350" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td></td><td><div id="rotulo_cadastro">Nome:</div></td>
   
  </tr>
  <tr>
    <td width="70"><div class="campoForm">
      </div></td>
      <td width="230"><div class="campotxt"><input type="text" name="Nome" size="42" value="<?php echo $nome ;  ?>" /> </div>
        </font></td>
  </tr>
   <tr>
    <td></td><td><div id="rotulo_cadastro">Nome Artístico:</div></td>
   
  </tr>
   <tr>
    <td><div class="campo_Form"></div></td>
      <td><div class="campotxt"><input type="text" name="nomeArtist" size="42"  value="<?php echo $nomeArtist ;  ?>"/> </div></td>
  </tr>
  <tr>
    <td></td><td><div id="rotulo_cadastro">Email:</div></td>
   
  </tr>
   <tr>
    <td><div class="campo_Form"></div></td>
      <td><div class="campotxt"><input type="text" name="Email" size="42"  value="<?php echo $email ;  ?>"/> </div></td>
  </tr>
   <tr>
    <td></td><td><div id="rotulo_cadastro">Senha:</div></td>
   
  </tr>
  <tr>
    <td><div class="campo_Form"></div></td>
      <td><div class="campotxt"><input type="password" name="Senha" size="42" value="<?php echo $senha ;  ?>" /></div></td>
  </tr>
  
   <tr>
    <td></td><td><div id="rotulo_cadastro">Telefone:</div></td>
   
  </tr>
  <tr>
    <td><div class="campo_Form"></div></td>
      <td><div class="campotxt"><input type="text" name="Telefone" size="42" value="<?php echo $tel ;  ?>"/></div></td>
  </tr>
  <tr>
    <td></td><td><div id="rotulo_cadastro">Bairro:</div></td>
   
  </tr>
 
 
  <tr>
    <td><div class="campo_Form"></div></td>
      <td><div class="campotxt"><input type="text" name="Bairro" size="42" value="<?php echo $bairro ;  ?>" /></div></td>
  </tr>
   <tr>
    <td></td><td><div id="rotulo_cadastro">Cidade:</div></td>
   
  </tr>
  <tr>
    <td><div class="campo_Form"></div></td>
      <td><div class="campotxt"><input type="text" name="Cidade" size="42" value="<?php echo $cidade ;  ?>"/></div></td>
  </tr>
    <tr>
    <td></td><td><div id="rotulo_cadastro">Instrumento:</div></td>
   
  </tr>
 
  <tr>
    <td><div class="campo_Form"></div></td>
      <td><div class="campotxt"><input type="text" name="Instrumento" size="42" value="<?php echo $instrumento ;  ?>"/></div></td>
  </tr>
  <tr>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
  <tr>
    <td></td>
    <td><div id=""><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <input type="hidden" name="acao" value="cadastrar" />
          <input name="entrar" type="submit" id="entrar" value="Enviar cadastro"   >
          </font></div><div class="txtsenha"><a href="altersenha.php">Esqueceu
      a senha?</a></div></td>
  </tr>
</table>

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