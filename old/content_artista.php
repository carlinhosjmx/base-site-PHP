<table width="980" border="1" cellspacing="0">
<?php
   
   
   function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento

$sqlconsulta = mysql_query("SELECT partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,partituras.tipo, cadastro.apelido FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.artista LIKE '".$texto."%' ORDER BY partituras.artista")or die(mysql_error());
 
 $registro = mysql_num_rows($sqlconsulta);
 

	  
	if( mysql_num_rows($sqlconsulta) >= 1 ){
	   
	  while($linha = mysql_fetch_array($sqlconsulta)){
		  
		  $contador++;
		  $cor=($contador%2)?"cor-sim":"cor-nao";  
		  
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
		  
		
		 


	    echo ' <tr class='.$cor.'>
	<td width="209"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></td>
    <td width="310"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="210"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></td>
	<td width="71"><a href='.$url.' target="_blank" class="result">'.$tipo.'</a></td>
    <td width="180"><a href='.$url.' target="_blank" class="result">'.$usuario.'</a></td>
  </tr>';		  
	  }
		
	}else{
		
		echo "<div id='alertPesquisa'>Não há nenhum artista com a letra '".$letter."' no momento!</div>";
		
	}

?>
</table>