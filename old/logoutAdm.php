<?php

   session_start();
   
   include 'conectionx2sa.php';
   
    if(isset( $_SESSION[ 'loginUser' ] ) && isset( $_SESSION[ 'senhaUser' ])){
		
		 $user = $_SESSION[ 'loginUser' ];
		   
		$logado = mysql_query("UPDATE cadastro set logado = 0 WHERE email = '$user' ") or die( mysql_error()); 

       session_destroy();
	   
	    
			
			
		
	   
	   header ( "Location: adminx2.php");
	
	}else{
       
	   header ( "Location: adminx2.php");
	 }

?>