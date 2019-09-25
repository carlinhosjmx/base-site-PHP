<html>
<head>
<title>Partituras musicais</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="style.css" />






</head>

<body >

<?php

    include_once('conectionx2sa.php'); 
    
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
		
		
		
		$sqlVerificaUser = mysql_query(" SELECT email FROM cadastro WHERE email = '$email' ") or die( mysql_error());
		
	    $recebe = mysql_num_rows($sqlVerificaUser);
		
		
		if( mysql_num_rows($sqlVerificaUser) >= 1 )
		{
			
			$alerta = " já existe um usuário com este email cadastrado! ";
		    	
			
		
		}else if( empty($nome))
		
		    {
			   
			   $alerta = " O campo <strong> Nome </strong> precisa ser preenchido ";
				
			}
			
		 else if( empty($apelido)) 
		   {
			  
			  $alerta = " O campo <strong> Nome Artístico </strong> precisa ser preenchido "; 
			  
			}
		else if( empty($instrumento)) 
		   {
			  
			  $alerta = " O campo <strong> Instrumento</strong> precisa ser preenchido "; 
			  
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
			else if( empty($email)) 
		   {
			  
			  $alerta = " O campo <strong> E-mail </strong> precisa ser preenchido "; 
			  
			}
        else if( empty($senha)) 
		   {
			  
			  $alerta = " O campo <strong> Senha</strong> precisa ser preenchido "; 
			  
			}
			else
	        {
		 
		$sqlCadastrarUser = mysql_query("INSERT into cadastro (nome,apelido, email, senha, bairro, cidade, instrumento, telefone1, foto, codmail, uid, data_ts, activo) VALUES ( '$nome','$apelido','$email','$senha', '$bairro', '$cidade', '$instrumento', '$tel', '$skin', '$codmail', '$uid','$data_ts', '$activo' )" ) ;
		
		  
		   
		   echo 'o mysqlaffect é:'.$sqlCadastrarUser;
		
		    if(  $sqlCadastrarUser >=1 ) {
				
				   
                   $id = mysql_insert_id( $db );

                      // Criar as variaveis para validar o email
                    $url = sprintf( 'email=%s&id=%s&uid=%s&key=%s',$codmail,$id, $uid, $data_ts);

                   $mensagem = '<h2>Partituras Musicais.com </h2><br>Para confirmar seu cadastro clique  no link abaixo ou copie todo o link, cole em seu navegador e aperte enter:'."\n";
                   $mensagem .= sprintf('http://www.partiturasmusicais.com/activate.php?%s',$url);
				   $headers  = "MIME-Version: 1.0\n";
	               $headers .= "$cabecalho_da_mensagem_original";
	               $headers .= "Content-Type: text/html; charset=\"UTF-8\"";

                     // enviar o email
                   mail($email, 'Confirmacao de cadastro', $mensagem, $headers );

       	           echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                   alert ("cadastrado com sucesso! um email de ativação foi enviado para você ") ; location.href = "http://www.partiturasmusicais.com/index.php";
                   </SCRIPT>';
               }else{
		 
		
			  echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                          alert ("Houve um erro ao se cadastrar. Tente novamente! ") ; location.href = "http://www.partiturasmusicais.com/index.php";
                         </SCRIPT>';
			/*$alerta = "usuário cadastrado com sucesso!"; */
		

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
    
      
    
     <form name="login" method="post" action="loginAdmin.php" enctype="multipart/form-data" >
   
       <table width="366"  border="0" cellpadding="0" cellspacing="0">
         <tr>
            <td width="146"><div id="rotulo_form">Email:</div></td>
            <td width="22">&nbsp;&nbsp;</td>
           <td width="129"><div id="rotulo_form" >Senha:</div></td>
         </tr>
         <tr>
            <td><div class="campotxt"><input name="email" type="text" id="mail" size="23"></div></td>
            <td>&nbsp;</td>
            <td><div class="campotxt"><input name="senha" type="password" id="senha" size="20"></div></td>
             <td width="69"><!--<input type="hidden" name="acao" value="autenticar" /> -->
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
  
     </div>
    
  </div>
  </div>
 </div><!--content-->
 <?php
   
   include "footer.php";

?>

   
</body>
</html>