<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Partituras musicais</title>


<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script type="text/javascript" src="js/upload.js"></script>
  <script type="text/javascript" src="js/jquery.form.js"></script>  
 <link rel="stylesheet" href="/resources/demos/style.css" />

 

</head>

<body>

 
<div id="header">
  
  <div id="header_inter">
     <div id="logo"><img src="images/logo.png" /></div>
     <div id="retorna"><a href="user.php">Voltar ao início</a></div>
     <div id="sair"><a href="logout.php">Sair</a></div>
  </div>

</div>
<div id="content_user">
<div id="content1">

<?php


include_once('conectionx2sa.php');

// Dados vindos pela url
$id = $_GET['id'];
$uidMd5 = $_GET['uid'];


/* echo 'id&nbsp;'.$id;
echo 'email&nbsp'.$emailMd5;
echo 'uid&nbsp'.$uidMd5;
echo 'data&nbsp'.$dataMd5; */


//Buscar os dados no banco
$sql = "select * from cadastro where id_musicos = '$id'";
$sql = mysql_query( $sql );
$rs = mysql_fetch_array( $sql );

// Comparar os dados que pegamos no banco, com os dados vindos pela url
$valido = true;



if( $uidMd5 !== $rs['codsenha'] )
    $valido = false;

if( $id !== $rs['id_musicos'] )
    $valido = false;

// Os dados estÃ£o corretos, hora de ativar o cadastro
if( $valido === true ) {
   // $sql = "update cadastro set activo='1' where id_musicos='$id'";
   // mysql_query( $sql );
    echo '<div id="NovaSenha">
	
	    <fieldset>
		    <legend>Altere agora sua Senha!</legend>
	        <form id="passw" method="post" action="updateSenha.php">
	         
			 <label> Digite a Senha:<input type="password" name="newsenha" size="20" /> </label>
			 <label> Repita a Senha:<input type="password" name="newsenha2" size="20" /></label>
			        <input type="hidden" name="id" value='.$id.' />
			 <label> <input type="submit" value="Enviar" /></label>
	
	        </form>
	    </fieldset>
	</div>';
} else {
    echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                   alert ("O e-mail não foi confirmado, tente novamente! ") ; location.href = "http://www.partiturasmusicais.com/index.php";
                   </SCRIPT>';
}

?>

</div>
 </div><!--box_center-->
 <div id="footer">
    <div id="footerHomeInter">
     <div id="txt1_footer"><a href="">Aviso Legal</a><a href="">Política de Privacidade </a><a href="">Denuncie</a><a href="contato.html">Entre em Contato</a></div>
     <div id="txt2_footer"></p></div>
     <div id="copyright">&copy; 2013 Partituras Musicais</div>
   </div>
 
 
 
 </div><!--footer-->

