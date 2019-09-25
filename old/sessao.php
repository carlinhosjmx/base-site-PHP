<?php
   
   session_start(); 
   
   $$conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "@#partituras@#");
   $database = mysql_select_db("jmxrio_musicos");
   
     if( !isset($_SESSION[ 'loginUser' ]) && !isset($_SESSION[ 'senhaUser' ])){
															
			header("Location: index.php ");												
			exit;												
															
     }
    
   
?>