
<?php
 header("Content-Type: text/html; charset=utf-8",true);
 include_once "sessao.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Partituras musicais</title>
<meta name="description" content="Encontre as partituras de suas mÃºsicas preferidas, o partituras.com é um site de músico para músico. Venha fazer parte desta famÃ­lia."/>
<meta name="robots" content="index, follow" />
<link rel="canonical" href="http://www.partiturasmusicais.com">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style-v1.2.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open Sans" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >

<!--[if lte IE 7]>
   <script type="text/javascript">
           /*Load jQuery if not already loaded*/ if(typeof jQuery == 'undefined'){ document.write("<script type=\"text/javascript\"   src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\"></" "script>"); var __noconflict = true; }
           var IE6UPDATE_OPTIONS = {
                   icons_path: "http://static.ie6update.com/hosted/ie6update/images/"
           }
   </script>
   <script type="text/javascript" src="ie6update.js"></script>
   <![endif]-->       
   
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
 
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

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
				   
				
				   
				   
				}
			   
			  
		
		 }else{

          $logado = mysql_query("UPDATE cadastro SET logado = 0 WHERE email = '$user' ") or die( mysql_error()); 
          echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
          alert ("A sessÃ£o foi expirada, faÃ§a o login novamente!") ; location.href = "http://www.partiturasmusicais.com/index.php";
          
          </SCRIPT>';
		  

        }
		
 
  ?> 
  
 
 <?php
 
  
 
  if(isset($_POST['acao']) && $_POST['acao'] == 'salvarPart')
		 {      
		 
		            $part_music = $_POST['part_musica'];
			        $part_interpret = $_POST['part_interprete'];
			        $part_instrument = $_POST['part_instrumento'];
					$part_files = $_FILES['arquivo']['name'];
					
					
					$part_musica = mb_strtolower( $part_music, 'UTF-8');
			        $part_interprete = mb_strtolower($part_interpret, 'UTF-8');
			        $part_instrumento = mb_strtolower($part_instrument, 'UTF-8');
					$part_file = strtolower($part_files);
					
					
					function semAcento($titletext){
	$trocarIsso = array('Ã ','Ã¡','Ã¢','Ã£','Ã¤','Ã¥','Ã§','Ã¨','Ã©','Ãª','Ã«','Ã¬','Ã­','Ã®','Ã¯','Ã±','Ã²','Ã³','Ã´','Ãµ','Ã¶','Ã¹','Ã¼','Ãº','Ã¿','Ã€','Ã','Ã‚','Ãƒ','Ã„','Ã…','Ã‡','Ãˆ','Ã‰','ÃŠ','Ã‹','ÃŒ','Ã','ÃŽ','Ã','Ã‘','Ã’','Ã“','Ã”','Ã•','Ã–','O','Ã™','Ãœ','Ãš','Å¸',' ','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
					
				
				$extensao = end( explode(".", $part_file));
					
					
		          
				  if( $part_file == '' ){
						
						$part_alerta = "VocÃª deve anexar a partitura!";
						
					    
						
						
					}else if( $part_music == '' ){
						
						$part_alerta = " VocÃª de Preencher o campo Nome da MÃºsica!";
						
						 
					
					
					}else if( $part_instrument == '' ){
						
						  $part_alerta = "VocÃª deve Preencher o campo instrumento!";
					     
						
					}else if( $extensao != "enc" && $extensao != "pdf" && $extensao != "mus" && $extensao != "jpg" && $extensao != "gp3" && $extensao != "gp5" && $extensao != "gp4" && $extensao != "gp6"  && $extensao != "sib" && $extensao != "zip" && $extensao != "rar"   ){
						
						
						
						 $part_alerta = "O tipo de arquivo enviado nÃ£o Ã© vÃ¡lido! ".$extensao;
						
					}else{
					
					
					
					
					echo '<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">';
					
					$sqlId = mysql_query( "SELECT * FROM partituras");
					
					$geranum = mysql_num_rows($sqlId);
					
					
			   
				$convLetra = semAcento($part_musica);
				$letra = substr($convLetra,0,1);
			
			    $dir = 'part/'.$letra."/";
				
				 echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ($dir) ;    </SCRIPT> ";
             $part_menor = semAcento($part_musica);
			 $arquivo = substr($part_menor,0,13);
			 $filePdf = str_replace(" ", "_",$arquivo);
			 $interprete = str_replace(" ", "_",$part_interprete);
			 $artist = semAcento($interprete);
			 $part_instr = str_replace(" ", "_",$part_instrumento);
			 $instr = semAcento($part_instr);
			 $pdf = '.pdf';
			 $part = $id.$filePdf.$artist.$instr.'.'.$extensao;
			    
			 
			if(empty($part_musica)&& empty($part_interprete)&& empty($part_instrumento))
			{
				$part_alerta = '<div id="part_alerta">VocÃª nÃ£o preencheu os campos! </div>';
			}
			
			if( file_exists($dir.$part) ){
			
			     echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('VocÃª jÃ¡ enviou um pdf com estes mesmos dados, seu arquivo nÃ£o foi enviado!') ;  location.href = 'http://www.partiturasmusicais.com/user.php';  </SCRIPT> ";
			
			}else{				
				$sql = mysql_query("INSERT into partituras ( id_partitura,titulo, artista , instrumento, tipo, id_musicos,partitura ) VALUES ( null,'$part_musica', '$part_interprete', '$part_instrumento','$extensao', '$id', '$part' ) ") or die(mysql_error());
	
				 ( move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$part));
				 
				   // rename( $dir.$part_file, $dir.$part ); 
			
				
				 echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('enviado com sucesso!') ;  location.href = 'http://www.partiturasmusicais.com/user.php';  </SCRIPT> ";

          exit();
		
		
			}
		
		  }
			
		}
		
		

 
 
 ?>
 
 <?php
 
      $pesquisaSql = mysql_query("SELECT * FROM cadastro");
	  
	   $TotalUsuarios = mysql_num_rows($pesquisaSql);
 
 
 ?>
  
  
      


<div id="header_in">
  
  <div id="header_inter_in">
    
     <div id="logo"><img src="images/logo.png" /></div>
	 <div class="logo_mobile"><a href="http://partiturasmusicais.com/user.php">PartiturasMusicais.com</a></div>
	 
    <div id="sair"><a href="logout.php">Sair</a></div>

  </div>

</div><!--header-->

<div class="content_user">
<div class="box_center_user">

<div id="box_user">

	<div class="welcome">
		
		  <?php
      


       if( $usuario != "" ){
		
			
		    echo  '<h3> Olá,&nbsp;'.$apelido.'</h3><p> essa é a sua área.</p> ';

	   }
	   
	   
      ?>  

	</div>

	<div class="foto_user">

		 <div id="foto_grande"><img src="<?php echo $foto;    ?>" /></div><!--foto_grande-->


	</div>

  <div id="box_info">

  

     <div class="box_dados_user">
     
    

         <div id="boxAccordion2">
      <!-- <div id="accordion"> -->
  <h3 ><strong>Sobre mim</strong></h3>

    <p>
       <strong>Nome: </strong><?php echo $usuario; ?> <br />
       <strong>Email:</strong> <?php echo $email; ?> <br />
       <strong>Bairro:</strong> <?php echo $bairro; ?> <br />
       <strong>Cidade:</strong> <?php echo $cidade; ?> <br />
       <strong>Instrumento: </strong><?php echo $instrumento; ?> <br />
    
    </p>
    
	</div><!--boxAccordion-->
	
	</div>

	<!--<div id="trocaFoto" >
        <p><button type="button" onClick=     "window.open('uploadFoto.php','_blank','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=300,height=300,directories=no,location=no')">Trocar foto do perfil</button></p>
     
            
     </div> --><!--troca_foto-->

	  <div class="box_tags">
	  
    
	<a href="#my_perfil.php" title="Ainda nÃ£o estÃ¡ ativo">Editar Perfil</a>
	<a href="#my_part.php">Minhas Partituras</a>
		
	<a href="#">Cancelar conta</a>
  
	</div>

    
     
     

      </div><!--box-info-->

    
  
  


</div><!--box_user-->


<div class="box_busca">

	<div id="busca">
	   <a class="linkBusca" href="busca.php"><i class="fas fa-search"></i> Buscar uma partitura</a>

	</div><!--busca-->

	


<div id="box_usuarios">

<div class="box-form-user">
	<form id="form1" name="form1" method="post" action="usuarios.php">
		
		<label><h3><i class="far fa-user"></i> Buscar um usuário </h3></label>
		<label class="txt-label">por:</label>
		   <label> <select id="seletor" name="seletor">
		       <option value="0">selecione o tipo da pesquisa</option>
		       <option value="1">Nome do Usuário</option>
		       <option value="2">Instrumento</option>
		      
		       
		  </select></label>
		   <label class="txt-label">Digite o nome ou a primeira letra</label>
		  <label> <input type="text" name="pesquisar" class="search_user" title="Digite o que procura"  " /></label>

		  <input type="hidden" name="search" value="pesquisar" />
		  <label><input type="submit" name="button" id="button" class="bt-user" value="Pesquisar" /></label>

	</form>
	</div>
</div><!--box_usuario-->

  
   <div id="upload">
   
   
   <h3><i class="fas fa-file-upload"></i>Enviar uma Partitura</h3>
   
   <div id="obs"> Obs: Ao enviar uma partitura na qual sua continuação seja
      em mais de um arquivo PDF, coloque após o nome da música a palavra
      "part1", "part2" e assim sucessivamente.
      ex: música "abalou part1" e musica "abalou part2"
      <br /> evidenciando que é a mesma música porém em duas partes.
   </div> 
   
    <?php
		    
			if(isset($part_alerta) && $part_alerta != "")
			{
				echo "<div id='alertaUpload'>$part_alerta</div>";
				
			}
		
		?>
    
   
    <div id="form_upload">
      
   
    
     <form action="" id="form_uploadxx" method="post" enctype="multipart/form-data" >
      
      <label class="txtExt"><span>Anexar PDF, ENC, MUS, SIB, JPG, ZIP, RAR, GUITARPRO</span></label>
      <label><input type="file" name="arquivo" /></label><br /><br />
      
      
        <label>Nome da Música:</label>
       <input type="text" name="part_musica"  class="area" maxlength="36" /><br /> 
      
       <label>Nome do Artista:</label>
       <input type="text" name="part_interprete"  class="area" maxlength="27" /><br />  
    
       <label> Instrumento: </label>
     <input type="text" name="part_instrumento" class="area" maxlength="29"  /> 

      <br />


    
     
      <input type="submit"  id="btn_envioxx" class="buttonUp" value="Enviar" />
      <input type="hidden" name="acao" value="salvarPart" /> 

    </form>
    
    </div><!--form_upload-->
    
  
    <!-- <div id="mensagem"></div>
        <div id="porcentagem">
            <div id="barra">0%</div>
         </div>-->
    

</div><!--upload-->

 </div><!--resultados-->


 <div class="box_news">

  <div id="banner_anuncio">
	  
     <div id="curtir">
		<div class="fb-like-box" data-href="https://www.facebook.com/GILSINHOOLIVEIRA12?ref=hl" data-width="528" data-height="190" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true">
			
		</div>
	</div> <!--curtir-->
 </div>



 </div>
 </div><!--busca-->
</div><!--box_center-->

</div>
<?php
   
   include "footer.php";

?>


















</body>
</html>