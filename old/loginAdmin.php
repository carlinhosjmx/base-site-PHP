<?php
   
     session_start(); 
   
   $$conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "@#partituras@#");
   $database = mysql_select_db("jmxrio_musicos");
   
 
        
	   $email = $_POST['email'];
       $senha = md5($_POST['senha']);
	   
	   if( $email == 'carlinhosjmx@gmail.com' || $email == 'gilsinhooliveira12@gmail.com' ){

 
       $confirmacao = mysql_query("SELECT * FROM cadastro WHERE email = '$email' AND senha = '$senha' AND activo='1'" ) or die( mysql_error()); 
	   
       $var = mysql_num_rows($confirmacao );
	   
	   
   
	   
	   if( mysql_num_rows($confirmacao) == 1 )
	   {
		   
		   $_SESSION[ 'loginAdmin' ] = $email;
		   $_SESSION[ 'senhaAdmin' ] = $senha;
		   header( "Location: principal.php ");

       }else{
		   
		   
		   session_destroy();
		 //  echo 'o que veio foi isso:'.$senha;
		  echo '<script language="javascript" type="text/javascript" > alert("Acesso Restrito, aguarde um pouco mais!"); location.href = "http://www.partiturasmusicais.com/adminx2.php";</script>'; 
	   }
 
	   }
  
  
?>
