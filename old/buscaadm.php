<?php
   
   session_start(); 
   
   $$conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "3o+W6-Mw64");
   $database = mysql_select_db("jmxrio_musicos");
   
     if( !isset($_SESSION[ 'loginUser' ]) && !isset($_SESSION[ 'senhaUser' ])){
															
			header("Location: index.php ");												
			exit;												
															
     }
	 
	 
       
   
?>



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
<div id="box_part">
<div id="list_part"><b>Partituras por Artista:</b>&nbsp;&nbsp;<span><a href="partituras-artista-a.php">A</a></span><span><a href="partituras-artista-b.php">B</a></span><span><a href="partituras-artista-c.php">C</a></span><span><a href="partituras-artista-d.php">D</a></span><span><a href="partituras-artista-e.php">E</a></span><span><a href="partituras-artista-f.php">F</a></span><span><a href="partituras-artista-g.php">G</a></span><span><a href="partituras-artista-h.php">H</a></span><span><a href="partituras-artista-i.php">I</a></span><span><a href="partituras-artista-j.php">J</a></span><span><a href="partituras-artista-k.php">K</a></span><span><a href="partituras-artista-l.php">L</a></span><span><a href="partituras-artista-m.php">M</a></span><span><a href="partituras-artista-n.php">N</a></span><span><a href="partituras-artista-o.php">O</a></span><span><a href="partituras-artista-p.php">P</a></span><span><a href="partituras-artista-q.php">Q</a></span><span><a href="partituras-artista-r.php">R</a></span><span><a href="partituras-artista-s.php">S</a></span><span><a href="partituras-artista-t.php">T</a></span><span><a href="partituras-artista-u.php">U</a></span><span><a href="partituras-artista-v.php">V</a></span><span><a href="partituras-artista-w.php">W</a></span><span><a href="partituras-artista-x.php">X</a></span><span><a href="partituras-artista-y.php">Y</a></span><span><a href="partituras-artista-z.php">Z</a></span>
</div><!--list_part-->

<div id="list_part2"><b>Partituras por Música:</b>&nbsp;&nbsp;<span><a href="partituras-titulo-a.php">A</a></span><span><a href="partituras-titulo-b.php">B</a></span><span><a href="partituras-titulo-c.php">C</a></span><span><a href="partituras-titulo-d.php">D</a></span><span><a href="partituras-titulo-e.php">E</a></span><span><a href="partituras-titulo-f.php">F</a></span><span><a href="partituras-titulo-g.php">G</a></span><span><a href="partituras-titulo-h.php">H</a></span><span><a href="partituras-titulo-i.php">I</a></span><span><a href="partituras-titulo-j.php">J</a></span><span><a href="partituras-titulo-k.php">K</a></span><span><a href="partituras-titulo-l.php">L</a></span><span><a href="partituras-titulo-m.php">M</a></span><span><a href="partituras-titulo-n.php">N</a></span><span><a href="partituras-titulo-o.php">O</a></span><span><a href="partituras-titulo-p.php">P</a></span><span><a href="partituras-titulo-q.php">Q</a></span><span><a href="partituras-titulo-r.php">R</a></span><span><a href="partituras-titulo-s.php">S</a></span><span><a href="partituras-titulo-t.php">T</a></span><span><a href="partituras-titulo-u.php">U</a></span><span><a href="partituras-titulo-v.php">V</a></span><span><a href="partituras-titulo-w.php">W</a></span><span><a href="partituras-titulo-x.php">X</a></span><span><a href="partituras-titulo-y.php">Y</a></span><span><a href="partituras-titulo-z.php">Z</a></span>
</div><!--list_part-->
</div><!--box_part-->

<div id="box_center">

<div id="form_busca">


<form id="form1" name="form1" method="post" action="">
<table >
   <tr>
     <td><span>Buscar</span></td> 
  <td><input type="text" name="pesquisar" class="pesquisar" size="45" /></td>
   <td> <span>Como:</span> </td>
  <td><select id="seletor" name="seletor">
       <option value="0">selecione</option>
       <option value="1">Título </option>
       <option value="2">Artista</option>
       <option value="3">Instrumento</option>
       <option value="4">usuário</option>
       
  </select></td>
  <td><input type="hidden" name="search" value="pesquisar" />
  <input type="submit" name="button" id="button" value="Pesquisar" /></td>
  </tr>
  </table>
</form>

</div>

<div id="result_busca">

<div id="labeltable"><div id="coluna1">Música</div><div id="coluna2">Instrumento</div><div id="coluna3">Artista</div><div id="coluna4">Enviada Por</div></div><!--labeltable-->

     <div id="resultado">
	 
     
     
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
	  	 
	  $sqlconsulta = mysql_query("SELECT partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento, cadastro.apelido FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.titulo LIKE '".$pesquisa."%' ORDER BY partituras.titulo")or die(mysql_error());
	  
	if( mysql_num_rows($sqlconsulta) >= 1 ){
		
		echo '<table width="980" border="1" cellspacing="0"> ';
	
	  while($linha = mysql_fetch_array($sqlconsulta)){
		  
		   
		  $contador++;
		  $cor=($contador%2)?"cor-sim2":"cor-nao2"; 
		  
		  $usuar = $linha['apelido'];
		  $titul= $linha['titulo'];
	      $artist= $linha['artista'];
	      $partitu = $linha['partitura'];
		  $instrument = $linha['instrumento'];
	      
		  $usuario = mb_strtolower($usuar,'UTF-8');
		  $titulo = mb_strtolower( $titul,'UTF-8');
		  $artista = mb_strtolower( $artist,'UTF-8');
          $partitura = $partitu;
		  $instrumento = mb_strtolower( $instrument,'UTF-8');
		  	  
		 $convLetra = semAcento($titulo);
		  $letra = substr($convLetra,0,1);
	      $dir = 'part/'.$letra.'/';
		  $url = $dir.$partitura ;
		  
		  
	     
	     	 echo ' <tr class='.$cor.'>
    <td width="310"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="252"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></td>
    <td width="209"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></td>
    <td width="209"><a href='.$url.' target="_blank" class="result">'.$usuario.'</a></td>
  </tr>';
	     
					  
		 }
		 
		 echo '</table>';
		 
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
		
		 $sqlconsulta = mysql_query("SELECT partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento, cadastro.apelido FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.artista LIKE '".$pesquisa."%' ORDER BY partituras.titulo")or die(mysql_error());
		
	if( mysql_num_rows($sqlconsulta) >= 1 ){
		
		echo '<table width="980" border="1" cellspacing="0"> ';
		
		while($linha = mysql_fetch_array($sqlconsulta)){
	    
		  $contador++;
		  $cor=($contador%2)?"cor-sim2":"cor-nao2"; 
		  
	    $usuar = $linha['apelido'];
		  $titul= $linha['titulo'];
	      $artist= $linha['artista'];
	      $partitu = $linha['partitura'];
		  $instrument = $linha['instrumento'];
	      
		  $usuario = mb_strtolower($usuar,'UTF-8');
		  $titulo = mb_strtolower( $titul,'UTF-8');
		  $artista = mb_strtolower( $artist,'UTF-8');
          $partitura = $partitu;
		  $instrumento = mb_strtolower( $instrument,'UTF-8');
		  	  
		 $convLetra = semAcento($titulo);
		  $letra = substr($convLetra,0,1);
	      $dir = 'part/'.$letra.'/';
		  $url = $dir.$partitura ;
		  
	      

	         echo ' <tr class='.$cor.'>
    <td width="310"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="252"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></td>
    <td width="209"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></td>
    <td width="209"><a href='.$url.' target="_blank" class="result">'.$usuario.'</a></td>
  </tr>';
		 		  
		}
		
		echo '</table>';
		
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
		
		
   
      $sqlconsulta = mysql_query("SELECT partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento, cadastro.apelido FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.instrumento LIKE '".$pesquisa."%' ORDER BY partituras.titulo")or die(mysql_error());
   
	
	 if( mysql_num_rows($sqlconsulta) >= 1 ){
		 
		 echo '<table width="980" border="1" cellspacing="0"> ';
	
		while($linha = mysql_fetch_array($sqlconsulta)){
			
			  $contador++;
		  
		  $cor=($contador%2)?"cor-sim2":"cor-nao2"; 
	  
	      $i = $i + 1;	 
	      $usuar = $linha['apelido'];
		  $titul= $linha['titulo'];
	      $artist= $linha['artista'];
	      $partitu = $linha['partitura'];
		  $instrument = $linha['instrumento'];
	      
		  $usuario = mb_strtolower($usuar,'UTF-8');
		  $titulo = mb_strtolower( $titul,'UTF-8');
		  $artista = mb_strtolower( $artist,'UTF-8');
          $partitura = $partitu;
		  $instrumento = mb_strtolower( $instrument,'UTF-8');
		  	  
		 $convLetra = semAcento($titulo);
		  $letra = substr($convLetra,0,1);
	      $dir = 'part/'.$letra.'/';
		  $url = $dir.$partitura ;
		  
	  
	  
	   

	     echo ' <tr class='.$cor.'>
    <td width="310"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="252"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></td>
    <td width="209"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></td>
    <td width="209"><a href='.$url.' target="_blank" class="result">'.$usuario.'</a></td>
  </tr>';
			   
	
	    }
		
		echo '</table>';
		
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
   
      $sqlconsulta = mysql_query("SELECT partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento, cadastro.apelido FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE cadastro.apelido LIKE '".$pesquisa."%' ORDER BY partituras.titulo")or die(mysql_error());
   
	
	 if( mysql_num_rows($sqlconsulta) >= 1 ){
		 
		 echo '<table width="980" border="1" cellspacing="0"> ';
	
		while($linha = mysql_fetch_array($sqlconsulta)){
	  
	      $contador++;
		  $cor=($contador%2)?"cor-sim2":"cor-nao2"; 
		  
		  $usuar = $linha['apelido'];
		  $titul= $linha['titulo'];
	      $artist= $linha['artista'];
	      $partitu = $linha['partitura'];
		  $instrument = $linha['instrumento'];
	      
		  $usuario = mb_strtolower($usuar,'UTF-8');
		  $titulo = mb_strtolower( $titul,'UTF-8');
		  $artista = mb_strtolower( $artist,'UTF-8');
          $partitura = $partitu;
		  $instrumento = mb_strtolower( $instrument,'UTF-8');
		  	  
		  $convLetra = semAcento($titulo);
		  $letra = substr($convLetra,0,1);
	      $dir = 'part/'.$letra.'/';
		  $url = $dir.$partitura ;
		  
	  
	   

	      echo ' <tr class='.$cor.'>
    <td width="310"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="252"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></td>
    <td width="209"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></td>
    <td width="209"><a href='.$url.' target="_blank" class="result">'.$usuario.'</a></td>
  </tr>';
			   
	
	    }
		
		echo '</table>';
		
	   }else{
		 
		 echo ' Nada encontrado para o termo procurado!';
		
		
		
		}	
	 
	}
	
  }
?>

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