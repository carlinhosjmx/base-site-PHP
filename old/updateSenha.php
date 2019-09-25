<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php

    include_once('conectionx2sa.php');

    $novasenha1 = $_POST['newsenha'];
	$novasenha2 = $_POST['newsenha2'];
	$id = $_POST['id'];
	
	
	if( $novasenha1 == $novasenha2 ){
	
	   $senha1 = md5($novasenha1);
	   
		
	   $sql = mysql_query( "Update cadastro set senha = '$senha1' WHERE id_musicos = '$id' ");

	   echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                   alert ("Senha alterada com sucesso! ") ; location.href = "http://www.partiturasmusicais.com/altersenha.php";
                   </SCRIPT>';
		
		
		
		
	}else{
	
	
		echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                   alert ("As senhas digitadas não correspondem, favor digitar novamente! ") ; location.href = "http://www.partiturasmusicais.com/altersenha.php";
                   </SCRIPT>';
		
	

	
		
		
		
	}




?>



</body>
</html>