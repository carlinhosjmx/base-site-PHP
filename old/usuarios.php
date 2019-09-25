<?php
 
 include_once "sessao.php";

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Partituras musicais</title>
<meta name="description" content="Encontre as partituras de suas músicas preferidas, o partituras.com é um site de músico para músico. Venha fazer parte desta família."/>
<meta name="robots" content="index, follow" />
<link rel="canonical" href="http://www.partiturasmusicais.com">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style-v1.2.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<!--[if lte IE 7]>
   <script type="text/javascript">
           /*Load jQuery if not already loaded*/ if(typeof jQuery == 'undefined'){ document.write("<script type=\"text/javascript\"   src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\"></"+"script>"); var __noconflict = true; }
           var IE6UPDATE_OPTIONS = {
                   icons_path: "http://static.ie6update.com/hosted/ie6update/images/"
           }
   </script>
   <script type="text/javascript" src="ie6update.js"></script>
   <![endif]-->       
   
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
 
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="demoStyleSheet.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script type="text/javascript" src="js/upload.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>  
<script src="swfobject.js" type="text/javascript"></script>


   
  <link rel="stylesheet" href="/resources/demos/style.css" />
  



 
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

 <?php
 
          if( isset($_SESSION[ 'loginUser' ]) && isset($_SESSION[ 'senhaUser' ]) ){
			  
					
	       $user = $_SESSION[ 'loginUser' ];
		   
		   $logado = mysql_query("UPDATE cadastro set logado = 1 WHERE email = '$user' ") or die( mysql_error()); 
		   
		   $resultSql = mysql_query("SELECT * FROM cadastro WHERE email = '$user' AND activo = '1' ") or die( mysql_error()); 
		   
		   	  
		   
		       $linha = mysql_fetch_array($resultSql);
			   $id = $linha['id_musicos'];
			   $user = $linha['nome'];
			   $nick = $linha['apelido'];
			   $mail = $linha['email'];
			   $bair = $linha['bairro'];
			   $cidad = $linha['cidade'];
			   $foto = $linha['foto'];
			   $instrum = $linha['instrumento'];
			   $activo = $linha['activo'];
			   
			    $usuario = ucwords($user );
			    $apelido = ucwords($nick );
			    $email = strtolower($mail);
			    $bairro = strtolower($bair);
			    $cidade = strtolower($cidad);
			    $instrumento = strtolower($instrum);
			   
			   $ext = end( explode("fotoUser/", $foto));
			   $compExt = substr( $ext, -4);
			   
			  
			   
			   if( $compExt != '.jpg' || empty($compExt)  )
			   {
				   
				   $foto = "fotoUser/user.jpg"; 
				   
				   $sqlexec = mysql_query("UPDATE cadastro SET foto = '$foto' WHERE id_musicos = ' $id'");
				   
				   echo 'Passou por aqui mas não gravou a foto';
				   
				   
				}
			   
			  
		
		 }else{

          $logado = mysql_query("UPDATE cadastro SET logado = 0 WHERE email = '$user' ") or die( mysql_error()); 
          echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
          alert ("A sessão foi expirada, faça o login novamente!") ; location.href = "http://www.partiturasmusicais.com/index.php";
          
          </SCRIPT>';
		  

        }
		
 
  ?> 


  <div id="header_in">
  
  <div id="header_inter_in">
    
	 <div id="logo"><a href="http://partiturasmusicais.com/user.php"><img src="images/logo.png" /></a></div>
	 <div class="logo_mobile"><a href="http://partiturasmusicais.com/user.php">PartiturasMusicais.com</a></div>
	
    <div id="sair"><a href="logout.php">Sair</a></div>

  </div>

</div><!--header-->

<div id="content_user">
<div id="content2">


<div class="box_center_users">

   <div class="box_title_busca">
		<h1><i class="fas fa-search"></i>  Conheça os músicos cadastrados</h1>
	</div>
	
  
 

   <div id="resultado">

   	<div><span><? echo $TotalUsuarios; ?></span>
		 </div>
		 
		 <div class="menu-user"></div>

<div id="usuarios">

   <?php 


 if(isset($_POST['pesquisar']) || isset($_POST['seletor']) ):

		  
		  
    
   $pesquisa = $_POST['pesquisar'];
   $categoria = $_POST['seletor'];
   
    
	 
			 if( $categoria == 1 ):
				 
				 $item = "Nome";
				 
			 elseif( $categoria == 2 ):
				  
				  $item = "Instrumento";
				  
			   
			 else:
				   
				   $item = "";
		   
			 endif;
	   

 
   if($categoria == 1):
   


   	$sql_view = mysql_query(" SELECT * FROM cadastro WHERE activo = '1' and apelido LIKE '".$pesquisa."%' ORDER BY apelido ");
  
 
     while($linha = mysql_fetch_array( $sql_view )):
	  
  
	
		  $nome = ucwords($linha['nome']);
		  $nickname = ucwords($linha['apelido']);
		  $email = $linha['email']; 
		  $bairro = strtolower($linha['bairro']); 
		  $cidade = ucwords($linha['cidade']); 
		  $instrumento = strtolower($linha['instrumento']);
		  $foto = $linha['foto'];
		  $logado = $linha['logado'];
		  $ddd2 = $linha['ddd2'];
		  $tel = $linha['telefone2'];
		  $ddd3 = $linha['ddd3'];
		  $tel2 = $linha['telefone3'];
		  $radio = $linha['radio'];
  
		      if( $logado == 1 ):
		  
		           $status = "" ;
		 
		      elseif( $logado == 0):
			  
		           $status = "" ;
		 
		      endif;
 
           echo " <div id='celula'><div id='foto'><img src='{$foto}' width='110' height='110' /></div>
		   <div id='dados'>
		   <div id='line1'><div id='nome'>".$nickname."</div><div id='status'></div></div>
		   <div id='line2'><div id='instrumento'><span>Instrumento:&nbsp;</span>".$instrumento."</div></div>
		   <div id='line3'><div id='bairro'><span>Bairro:&nbsp;</span>".$bairro."</div></div>
		   <div id='line4'><div id='cidade'><span>Cidade:&nbsp;</span> ".$cidade." </div></div>
		   <div id='line5'><div id='lblfone'>Contato:</div><div id='txt_ddd'>".$ddd2."</div><div id='fone'>".$tel."</div>
		   <div id='txt_ddd'>".$ddd3."</div><div id='fone'>".$tel2."</div> </div>
		   
		   		   
		   <div id='line6'><div id='txt_radio'>Id Rádio:</div><div id='radio'>".$radio."</div></div>
		   
		  
		   </div>
		   </div>" ;
   
		

   
      endwhile;

elseif( $categoria == 2 ):

		$sql_view = mysql_query(" SELECT * FROM cadastro WHERE activo = '1' and instrumento LIKE '".$pesquisa."%' ORDER BY instrumento ");
  
 
  while($linha = mysql_fetch_array( $sql_view )):
	  
  
	
		  $nome = ucwords($linha['nome']);
		  $nickname = ucwords($linha['apelido']);
		  $email = $linha['email']; 
		  $bairro = strtolower($linha['bairro']); 
		  $cidade = ucwords($linha['cidade']); 
		  $instrumento = strtolower($linha['instrumento']);
		  $foto = $linha['foto'];
		  $logado = $linha['logado'];
		  $ddd2 = $linha['ddd2'];
		  $tel = $linha['telefone2'];
		  $ddd3 = $linha['ddd3'];
		  $tel2 = $linha['telefone3'];
		  $radio = $linha['radio'];
  
		  if( $logado == 1 ):
		  
		    $status = "" ;
		 
		  elseif( $logado == 0):
			  
		     $status = "" ;
		 
		  endif;
 
           echo " <div id='celula'><div id='foto'><img src='{$foto}' width='110' height='110' /></div>
		   <div id='dados'>
		   <div id='line1'><div id='nome'>".$nickname."</div>
		       <div id='status'></div>
		   </div>
		   <div id='line2'><div id='instrumento'><span>Instrumento:&nbsp;</span>".$instrumento."</div>
		   </div>
		   <div id='line3'><div id='bairro'><span>Bairro:&nbsp;</span>".$bairro."</div>
		   </div>
		   <div id='line4'><div id='cidade'><span>Cidade:&nbsp;</span> ".$cidade." </div>
		   </div>
		   <div id='line5'><div id='lblfone'>Contato:</div><div id='txt_ddd'>".$ddd2."</div><div id='fone'>".$tel."</div>
		   <div id='txt_ddd'>".$ddd3."</div><div id='fone'>".$tel2."</div> 
		   </div>
		   
		   		   
		   <div id='line6'><div id='txt_radio'>Id Rádio:</div><div id='radio'>".$radio."</div>
		   </div>
		   
		  
		   </div>
		   </div>" ;
   
		

   
  endwhile;

endif;

endif;






	?>
    








 </div><!--usuarios-->
 </div><!--resultados-->
 </div><!--busca-->
</div><!--box_center-->
</div>
</div>
<?php
   
   include "footer.php";

?>


















</body>
</html>