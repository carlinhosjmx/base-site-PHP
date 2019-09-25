<?php
   
     session_start(); 
   
   $conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "@#partituras@#");
   $database = mysql_select_db("jmxrio_musicos");
   
 
        
	   $email = $_POST['email'];
       $senha = md5($_POST['senha']);

 
       $confirmacao = mysql_query("SELECT * FROM cadastro WHERE email = '$email' AND senha = '$senha' AND activo='1'" ) or die( mysql_error()); 
	   
       $var = mysql_num_rows($confirmacao );
	   
	   
   
	   
	   if( mysql_num_rows($confirmacao) == 1 )
	   {
		   
		   $_SESSION[ 'loginUser' ] = $email;
		   $_SESSION[ 'senhaUser' ] = $senha;
		   header( "Location: user.php ");

       }else{
		   
		   
		   session_destroy();
		 //  echo 'o que veio foi isso:'.$senha;
		  echo '<script language="javascript" type="text/javascript" > alert("Email ou senha não conferem ou não foram ativados!"); location.href = "http://www.partiturasmusicais.com/index.php";</script>';
 //echo '<script language="javascript" type="text/javascript" > alert("Em manutenção aguarde!"); location.href = "http://www.partiturasmusicais.com/index.php";</script>'; 		  
	   }
 
 
  
  
?>
