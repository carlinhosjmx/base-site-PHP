<?php
   
   session_start(); 
   
$conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "3o+W6-Mw64");
   $database = mysql_select_db("jmxrio_musicos");?>



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

 <?php
 
          if( isset($_SESSION[ 'loginUser' ]) && isset($_SESSION[ 'senhaUser' ]) ){
	
	       $user = $_SESSION[ 'loginUser' ];
		   
		   $resultSql = mysql_query("SELECT * FROM cadastro WHERE email = '$user' ") or die( mysql_error());
		   
		       $linha = mysql_fetch_array($resultSql);
			   $id = $linha['id_musicos'];
			   $usuario = $linha['nome'];
			   $email = $linha['email'];
			   $bairro = $linha['bairro'];
			   $cidade = $linha['cidade'];
			   $instrumento = $linha['instrumento'];
		
		 }else{


          echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
          alert ("A sessão foi expirada, faça o login novamente!") ; location.href = "http://www.partiturasmusicais.com/index.php";
          
          </SCRIPT>';

        }
		
 
  ?> 
  
 
 
  
  
      


<div id="header">
  
  <div id="header_inter">
     <div id="logo"><img src="images/logo.png" /></div>
     <div id="retorna"><a href="user.php">Voltar ao início</a></div>
     <div id="sair"><a href="logout.php">Sair</a></div>
  </div>

</div>
<div id="content_user">
<div id="content2">
<div id="box_senha">

 <h1>Deseja cancelar definitivamente a sua conta?</h1>
 
   <div id="form_cancela">
      <form action="excluirConta.php"  method="post" >
     <label> Entre com o seu email:</label>
     <input type="text" name="emailCancela" size="40" /> <br />  
      <label>Entre com a sua senha:</label>
       <input type="password" name="senhaCancela" size="40" /><br /> 
    <input type="submit" class="bt_cancela" value="Excluir" />
       </form>
    </div>

</div>


 </div><!--box_center-->
 </div>

 <div id="footer">
    <div id="footerHomeInter">
     <div id="txt1_footer"><a href="">Aviso Legal</a><a href="">Política de Privacidade </a><a href="">Denuncie</a><a href="contato.html">Entre em Contato</a></div>
     <div id="txt2_footer"></p></div>
     <div id="copyright">&copy; 2013 Partituras Musicais</div>
   </div>
 
 
 
 </div><!--footer-->






















</body>
</html>