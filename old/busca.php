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
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >

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

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script type="text/javascript" src="js/upload.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>  
<script src="swfobject.js" type="text/javascript"></script>


   
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
  
 
 
  
  
      


<div id="header_in">
  
  <div id="header_inter_in">
     <div id="logo"><a href="http://partiturasmusicais.com/user.php"><img src="images/logo.png" /></a></div>
     <div class="logo_mobile"><a href="http://partiturasmusicais.com/user.php">PartiturasMusicais.com</a></div>
    
     <div id="sair"><a href="logout.php">Sair</a></div>
  </div>

</div>
<div id="content_user">
<div id="content2">

<div class="box_center_busca">
	<div class="box_title_busca">
		<h1><i class="fas fa-search"></i> Buscar Partitura</h1>
	</div>

	<div class="box_page_busca">

<div id="box_form_busca">


<form class="form_busca" name="form1" method="post" action="">


   
 
   <label class="h-label"><span>Buscar por:</span> <select id="seletor" name="seletor">
       <option value="0">Selecione o tipo da pesquisa</option>
       <option value="1">Nome da Música</option>
       <option value="2">Artista</option>
       <option value="3">Instrumento</option>
       <option value="4">usuário</option>
       <option value="5">Tipo de Arquivo</option>
       
       
  </select></label>
  <label >Digite a palavra ou apenas a primeira letra</label>
  <label><input type="text" name="pesquisar"  title="Digite o que procura"  /></label>
  <label><input type="hidden" name="search" value="pesquisar" />
  <input type="submit" class="bt-busca" name="button" id="button" value="Pesquisar" /></label>

  
</form>

</div>

<div id="result_busca">

<div class="labeltable"><div class="coluna1">Música</div><div class="coluna2">Instrumento</div><div class="coluna3">Artista</div><div class="coluna4">Tipo</div><div class="coluna5">Enviada Por</div></div><!--labeltable-->

     <div id="resultado_busca">
	 
     
     
          <?php 
		  
		  
     if(isset($_POST['search']) && $_POST['search'] == 'pesquisar' ){

   $pesquisa = $_POST['pesquisar'];
   $categoria = $_POST['seletor'];
   
    
	 
	 if( $categoria == 1 ){
		 
		 $item = "Título";
		 
	   }else if( $categoria == 2 ){
		  
		  $item = "Artista";
		  
	   }else if( $categoria == 3 ){
		   
		   $item = "Instrumento";
		   
	   }else{
		   
		   $item = "Usuário";
   
	   }
	   

 
   if($categoria == 1)
   {
	   
	   				function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
	  	 
	  $sqlconsulta = mysql_query("SELECT partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,partituras.tipo, cadastro.apelido FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.titulo LIKE '".$pesquisa."%' ORDER BY partituras.titulo")or die(mysql_error());
	  
	if( mysql_num_rows($sqlconsulta) >= 1 ){
		
		
	
	  while($linha = mysql_fetch_array($sqlconsulta)){
		  
		   
		  $contador++;
		  $cor=($contador%2)?"cor-sim2":"cor-nao2"; 
		  
		  $usuar = $linha['apelido'];
		  $titul= $linha['titulo'];
	      $artist= $linha['artista'];
	      $partitu = $linha['partitura'];
		  $instrument = $linha['instrumento'];
		  $ext = $linha['tipo'];
	      
		  $tipo = strtoupper($ext);
	      
		  $usuario = mb_strtolower($usuar,'UTF-8');
		  $titulo = mb_strtolower( $titul,'UTF-8');
		  $artista = mb_strtolower( $artist,'UTF-8');
          $partitura = $partitu;
		  $instrumento = mb_strtolower( $instrument,'UTF-8');
		  	  
		 $convLetra = semAcento($titulo);
		  $letra = substr($convLetra,0,1);
	      $dir = 'part/'.$letra.'/';
		  $url = $dir.$partitura ;
		  
		  
	     
	     	 echo ' <div class='.$cor.'>
    <div class="coluna1"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></div>
    <div class="coluna2"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></div>
    <div class="coluna3"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></div>
	<div class="coluna4"><a href='.$url.' target="_blank" class="result">'.$tipo.'</a></div>
    <div class="coluna5"><a href='.$url.' target="_blank" class="result">'.$usuario.'</a></div>
  </div>';
	     
					  
		 }
		 
		
		 
	  }else{
			 
			 echo ' Nada encontrado para o termo procurado!';
			 //echo " A busca '".$pesquisa." ' não está de acordo com a categoria = ".$item;
			  
	  
	  }
	  
	 
	  
	
	}else if($categoria == 2){
		
						function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
		
		 $sqlconsulta = mysql_query("SELECT partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,partituras.tipo, cadastro.apelido FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.artista LIKE '".$pesquisa."%' ORDER BY partituras.titulo")or die(mysql_error());
		
	if( mysql_num_rows($sqlconsulta) >= 1 ){
		
		
		
		while($linha = mysql_fetch_array($sqlconsulta)){
	    
		  $contador++;
		  $cor=($contador%2)?"cor-sim2":"cor-nao2"; 
		  
	    $usuar = $linha['apelido'];
		  $titul= $linha['titulo'];
	      $artist= $linha['artista'];
	      $partitu = $linha['partitura'];
		  $instrument = $linha['instrumento'];
		  $ext = $linha['tipo'];
	      
		  $tipo = strtoupper($ext);
	      
		  $usuario = mb_strtolower($usuar,'UTF-8');
		  $titulo = mb_strtolower( $titul,'UTF-8');
		  $artista = mb_strtolower( $artist,'UTF-8');
          $partitura = $partitu;
		  $instrumento = mb_strtolower( $instrument,'UTF-8');
		  	  
		 $convLetra = semAcento($titulo);
		  $letra = substr($convLetra,0,1);
	      $dir = 'part/'.$letra.'/';
		  $url = $dir.$partitura ;
		  
	      

	         echo ' <div class='.$cor.'>
    <div class="coluna1"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></div>
    <div class="coluna2"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></div>
    <div class="coluna3"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></div>
	<div class="coluna4"><a href='.$url.' target="_blank" class="result">'.$tipo.'</a></div>
    <div class="coluna5"><a href='.$url.' target="_blank" class="result">'.$usuario.'</a></div>
  </div>';
		 		  
		}
		
		
		
	  }else{
			 
			 
			 echo ' Nada encontrado para o termo procurado!';

			  
	  }
		  
	}else if($categoria == 3){
		
						function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
		
		
   
      $sqlconsulta = mysql_query("SELECT partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,partituras.tipo, cadastro.apelido FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.instrumento LIKE '".$pesquisa."%' ORDER BY partituras.titulo")or die(mysql_error());
   
	
	 if( mysql_num_rows($sqlconsulta) >= 1 ){
		 
		 
	
		while($linha = mysql_fetch_array($sqlconsulta)){
			
			  $contador++;
		  
		  $cor=($contador%2)?"cor-sim2":"cor-nao2"; 
	  
	      $i = $i + 1;	 
	      $usuar = $linha['apelido'];
		  $titul= $linha['titulo'];
	      $artist= $linha['artista'];
	      $partitu = $linha['partitura'];
		  $instrument = $linha['instrumento'];
		  $ext = $linha['tipo'];
	      
		  $tipo = strtoupper($ext);
	      
		  $usuario = mb_strtolower($usuar,'UTF-8');
		  $titulo = mb_strtolower( $titul,'UTF-8');
		  $artista = mb_strtolower( $artist,'UTF-8');
          $partitura = $partitu;
		  $instrumento = mb_strtolower( $instrument,'UTF-8');
		  	  
		 $convLetra = semAcento($titulo);
		  $letra = substr($convLetra,0,1);
	      $dir = 'part/'.$letra.'/';
		  $url = $dir.$partitura ;
		  
	  
	  
	   

	     echo ' <div class='.$cor.'>
    <div class="coluna1"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></div>
    <div class="coluna2"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></div>
    <div class="coluna3"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></div>
	<div class="coluna4"><a href='.$url.' target="_blank" class="result">'.$tipo.'</a></td>
    <div class="coluna5"><a href='.$url.' target="_blank" class="result">'.$usuario.'</a></div>
  </div>';
			   
	
	    }
		
		
		
	   }else{
		 
		echo ' Nada encontrado para o termo procurado!';

		
		
		
		}	
	 
	}else if($categoria == 4){
		
						function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
   
      $sqlconsulta = mysql_query("SELECT partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,partituras.tipo, cadastro.apelido FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE cadastro.apelido LIKE '".$pesquisa."%' ORDER BY partituras.titulo")or die(mysql_error());
   
	
	 if( mysql_num_rows($sqlconsulta) >= 1 ){
		 
		
	
		while($linha = mysql_fetch_array($sqlconsulta)){
	  
	      $contador++;
		  $cor=($contador%2)?"cor-sim2":"cor-nao2"; 
		  
		  $usuar = $linha['apelido'];
		  $titul= $linha['titulo'];
	      $artist= $linha['artista'];
	      $partitu = $linha['partitura'];
		  $instrument = $linha['instrumento'];
		  $ext = $linha['tipo'];
	      
		  $tipo = strtoupper($ext);
	      
		  $usuario = mb_strtolower($usuar,'UTF-8');
		  $titulo = mb_strtolower( $titul,'UTF-8');
		  $artista = mb_strtolower( $artist,'UTF-8');
          $partitura = $partitu;
		  $instrumento = mb_strtolower( $instrument,'UTF-8');
		  	  
		  $convLetra = semAcento($titulo);
		  $letra = substr($convLetra,0,1);
	      $dir = 'part/'.$letra.'/';
		  $url = $dir.$partitura ;
		  
	  
	   

	       echo ' <div class='.$cor.'>
    <div class="coluna1"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></div>
    <div class="coluna2"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></div>
    <div class="coluna3""><a href='.$url.' target="_blank" class="result">'.$artista.'</a></div>
	<div class="coluna4"><a href='.$url.' target="_blank" class="result">'.$tipo.'</a></td>
    <div class="coluna5"><a href='.$url.' target="_blank" class="result">'.$usuario.'</a></div>
  </div>';
			   
	
	    }
		
		
		
	   }else{
		 
		echo ' Nada encontrado para o termo procurado!';

		
		
		
		}	
	}else if($categoria == 5){
		
						function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
   
      $sqlconsulta = mysql_query("SELECT partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,partituras.tipo, cadastro.apelido FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.tipo LIKE '".$pesquisa."%' ORDER BY partituras.titulo")or die(mysql_error());
   
	
	 if( mysql_num_rows($sqlconsulta) >= 1 ){
		 
		
	
		while($linha = mysql_fetch_array($sqlconsulta)){
	  
	      $contador++;
		  $cor=($contador%2)?"cor-sim2":"cor-nao2"; 
		  
		  $usuar = $linha['apelido'];
		  $titul= $linha['titulo'];
	      $artist= $linha['artista'];
	      $partitu = $linha['partitura'];
		  $instrument = $linha['instrumento'];
		  $ext = $linha['tipo'];
	      
		  $tipo = strtoupper($ext);
	      
		  $usuario = mb_strtolower($usuar,'UTF-8');
		  $titulo = mb_strtolower( $titul,'UTF-8');
		  $artista = mb_strtolower( $artist,'UTF-8');
          $partitura = $partitu;
		  $instrumento = mb_strtolower( $instrument,'UTF-8');
		  	  
		  $convLetra = semAcento($titulo);
		  $letra = substr($convLetra,0,1);
	      $dir = 'part/'.$letra.'/';
		  $url = $dir.$partitura ;
		  
	  
	   

	       echo ' <div class='.$cor.'>
    <div class="coluna1"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></div>
    <div class="coluna2"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></div>
    <div class="coluna3"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></div>
	<div class="coluna4"><a href='.$url.' target="_blank" class="result">'.$tipo.'</a></td>
    <div class="coluna5"><a href='.$url.' target="_blank" class="result">'.$usuario.'</a></div>
  </div>';
			   
	
	    }
	
		
	   }
	}else{
		 
		 echo ' Nada encontrado para o termo procurado!';
		
		
		
		}	
	 
	}
	
  
?>

  </div>
 </div>
 </div>




 </div><!--box_center-->
 </div>
 </div>
<?php
   
   include "footer.php";

?>
























</body>
</html>