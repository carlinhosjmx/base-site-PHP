<?php
   
   session_start(); 
   
$conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "3o+W6-Mw64");
   $database = mysql_select_db("jmxrio_musicos");
   
   if( !isset($_SESSION[ 'loginUser' ]) && !isset($_SESSION[ 'senhaUser' ])){
															
			header("Location: index.php ");												
			exit;												
															
 }
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<div class='sample11' >

    <form action="upload3.php"  method="post" enctype="multipart/form-data" >
         <h3>Carregue uma nova Foto! </h3>
            <input type="file" name="arquivo" /></label><br /><br />
            <input type="submit" value="Enviar Foto" />
         
          </form>


</div>
</body>
</html>
