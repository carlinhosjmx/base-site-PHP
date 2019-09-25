<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
   
   
   $$conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "@#partituras@#");
   $database = mysql_select_db("jmxrio_musicos");

     $email = $_POST['recuperasenha'];
	 
	
	 
	 if( $email == '' || empty($email)){
		 
		 echo '<script language="javascript" type="text/javascript">alert("você deve preencher o campo email!"); location.href = "http://www.partiturasmusicais.com/altersenha.php";</script>';
		 
	 }
	 
	 
	 if(filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
		 
		echo '<script language="javascript" type="text/javascript" >alert("O email não é válido, tente novamente!"); location.href = "http://www.partiturasmusicais.com/altersenha.php";</script>'; 
		 
	 }
	 
	 
	 
     $sql_pesquisa = mysql_query( "SELECT * FROM cadastro WHERE email = '$email'");
	 
	 if( mysql_num_rows($sql_pesquisa) == 1 ){
		 
		 $linha = mysql_fetch_array($sql_pesquisa);
			 
		 $id = $linha['id_musicos'];
		
		 
		  $uid = uniqid( rand( ), true );
		  
		  $insereSQL = mysql_query("UPDATE cadastro set codsenha = '$uid' WHERE id_musicos = '$id' ") or die( mysql_error()); 
		   
		  
		                      $url = sprintf( 'id=%s&uid=%s',$id,$uid);

                   $mensagem = '<h2>Partituras Musicais.com </h2><br>Para redefinir sua senha clique no link ou copie todo o link, cole em seu navegador e aperte enter:'."\n";
                   $mensagem .= sprintf('http://www.partiturasmusicais.com/redefinepass.php?%s',$url);
				   $headers  = "MIME-Version: 1.0\n";
	               $headers .= "$cabecalho_da_mensagem_original";
	               $headers .= "Content-Type: text/html; charset=\"UTF-8\"";

                     // enviar o email
                   mail($email, 'Redefinição de senha', $mensagem, $headers );

       	           echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                   alert (" um email de para redefinição de senha foi enviado para você. Verifique sua caixa de spam se não receber! ") ; location.href = "http://www.partiturasmusicais.com/altersenha.php";
                   </SCRIPT>';
               }else{
		 
		
			  echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                          alert ("Esse email não está cadastrado, tente novamente! ") ; location.href = "http://www.partiturasmusicais.com/altersenha.php";
                         </SCRIPT>';
			/*$alerta = "usuário cadastrado com sucesso!"; */
		

			   }

		 
		 
		 
		 
		


?>