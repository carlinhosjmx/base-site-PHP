<?php
 
 include_once "sessao.php";

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


<script type="text/javascript">
    var doConfirm = function(id)
    {
        var link = document.getElementById(id);
        if(confirm("Você deseja realmente excluir?"))
            return true;
        else
            return false;
    }
    </script>
 

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
<div id="content_my">
<div id="modify">

<?php   
        if( $_GET['funcao'] == 'editar' ){
			
			$id = $_GET['clienteID'];
			$id_part = $_GET['id_part'];
			
			$sql_view = mysql_query(" SELECT * FROM partituras where id_musicos = '$id' AND id_partitura = '$id_part' ");
  

           while($linha = mysql_fetch_array( $sql_view )){
			   
			   
  
             $titulo = $linha['titulo'];
	         $artista = $linha['artista'];
	         $partitura = $linha['partitura'];
	         $instrumento = $linha['instrumento'];
				
            }
		}
?>
  
 

  <form action="functionPart.php?funcao=editar&id=<? echo $id ?>&id_part=<? echo $id_part ?>" method="post" >
    
    <fieldset>
    
	  <label><div class="tb_mypart">Nome da Música</div><input type="text" name="titulo" size="31" value="<? echo $titulo; ?>" />      </label>
	  <label><div class="tb_mypart">Artista</div><input type="text" name="artista" size="31" value="<? echo $artista; ?>" /></label>
      <label><div class="tb_mypart">Instrumento</div><input type="text" name="instrumento" size="31"  value="<? echo $instrumento; ?>" /></label>
       		
	  
     
     <input type="submit" value="Alterar" />
    </fieldset>  
    </form>  
	
    </div>
   



<div id="box_center5">

<div id="form_busca5">


<form id="form1" name="form1" method="post" action="">
<table >
   <tr>
     <td><span>Buscar</span></td> 
  <td><input type="text" name="pesquisar" class="pesquisar" size="45" /></td>
   <td> <span>Como:</span> </td>
  <td><select id="seletor" name="seletor">
        <option value="0">Selecione</option>
       <option value="1">Todos </option>
       <option value="2">Título</option>
       <option value="3">Artista</option>
        <option value="4">Instrumento</option>
      
       
  </select></td>
  <td><input type="hidden" name="search" value="pesquisar" />
  <input type="submit" name="button" id="button" value="Pesquisar" /></td>
  </tr>
  </table>
</form>

</div>

<div id="result_busca5">

<div id="labeltable5"><div id="colunaM1">Música</div><div id="colunaM2">Instrumento</div><div id="colunaM3">Artista</div><div id="colunaM4">Editar</div><div id="colunaM5">Excluir</div></div><!--labeltable-->
     <div id="resultado5">
	     
          <?php 
		  
		  if( isset($_SESSION[ 'loginUser' ]) && isset($_SESSION[ 'senhaUser' ]) ){
	
	            $user = $_SESSION[ 'loginUser' ];
		   
		        $consulta = mysql_query("SELECT email FROM cadastro WHERE email = '$user'");
		   
		    if( mysql_num_rows($consulta) == 1){
	
	            if(isset($_POST['search']) && $_POST['search'] == 'pesquisar' ){

                $pesquisa = $_POST['pesquisar'];
                $categoria = $_POST['seletor'];
				
				

   
    
	 
	     if( $categoria == 1 ){
		 
		      $item = "todos";
		 
	     }else if( $categoria == 2 ){
		 
		     $item = "titulo";
		 
	      }else if( $categoria == 3 ){
		  
		     $item = "artista";
		  
	      }else if( $categoria == 4 ){
		   
		   $item = "instrumento";
		   
	      }
	   
	  /* else{
		   
		   $item = "Usuário";
   
	   }
	   
	   */
	    if($item == "todos"){
			
							function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
	   
	    
		
	  $sqlconsulta = mysql_query("SELECT partituras.id_partitura,partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,cadastro.id_musicos, cadastro.apelido, cadastro.email FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.titulo LIKE '".$pesquisa."%' AND cadastro.email LIKE '$user' ORDER BY partituras.titulo")or die(mysql_error());
	  
	if( mysql_num_rows($sqlconsulta) >= 1 ){
		
		 echo '<table width="974" border="1" cellspacing="0"> ';
	
	  while($linha = mysql_fetch_array($sqlconsulta)){
		  
		  $contador++;		  
		  $cor=($contador%2)?"cor-sim2":"cor-nao2";
		  
		  $id = $linha['id_musicos'];
		  $id_part = $linha['id_partitura'];
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
    <td width="410"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="290"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></td>
    <td width="268"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></td>
    <td width="108"><a href="my_part.php?funcao=editar&clienteID='.$id.'&id_part='.$id_part.' " id="link">editar</a></td>
	 <td width="108"><a href=functionPart.php?funcao=excluir&id="'.$id.'"&part="'.$partitura.'"&id_part="'.$id_part.'" id="link" onclick="return doConfirm(this.id);">excluir</a></td>
  </tr>';			
	     
					  
		 }
		 
		 echo '</table>';
		 
		 }else{
			 
			 echo ' Nada encontrado para o termo procurado!';
			 //echo " A busca '".$pesquisa." ' não está de acordo com a categoria = ".$item;
			  
	  
	  }
	  
   }else if($item == "titulo"){
	   
	   				function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
	   
	    
		
	  $sqlconsulta = mysql_query("SELECT partituras.id_partitura,partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,cadastro.id_musicos, cadastro.apelido, cadastro.email FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.titulo LIKE '".$pesquisa."%' AND cadastro.email LIKE '$user' ORDER BY partituras.titulo")or die(mysql_error());
	  
	if( mysql_num_rows($sqlconsulta) >= 1 ){
		
		 echo '<table width="974" border="1" cellspacing="0"> ';
	
	  while($linha = mysql_fetch_array($sqlconsulta)){
		  
		  $contador++;		  
		  $cor=($contador%2)?"cor-sim2":"cor-nao2";
		  
		  $id = $linha['id_musicos'];
		  $id_part = $linha['id_partitura'];
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
    <td width="410"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="290"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></td>
    <td width="268"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></td>
    <td width="108"><a href="my_part.php?funcao=editar&clienteID='.$id.'&id_part='.$id_part.' " id="link">editar</a></td>
	 <td width="108"><a href=functionPart.php?funcao=excluir&id="'.$id.'"&part="'.$partitura.'"&id_part="'.$id_part.'" id="link" onclick="return doConfirm(this.id);">excluir</a></td>
  </tr>';			
	     
					  
		 }
		 
		 echo '</table>';
	  
   }else{
			 
			 echo ' Nada encontrado para o termo procurado!';
			 //echo " A busca '".$pesquisa." ' não está de acordo com a categoria = ".$item;
			  
	  
	  }
	  
	 
	  
	
	}else if($item == "artista"){
		
						function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
		
		 
		
		 $sqlconsulta = mysql_query("SELECT partituras.id_partitura,partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,cadastro.id_musicos, cadastro.apelido, cadastro.email FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.artista LIKE '".$pesquisa."%' AND cadastro.email LIKE '$user' ORDER BY partituras.titulo")or die(mysql_error());
		
	if( mysql_num_rows($sqlconsulta) >= 1 ){
		
		 echo '<table width="974" border="1" cellspacing="0"> ';
		
		while($linha = mysql_fetch_array($sqlconsulta)){
			
		  $contador++;		  
		  $cor=($contador%2)?"cor-sim2":"cor-nao2"; 	
	  
	      $id = $linha['id_musicos'];
		  $id_part = $linha['id_partitura'];
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
    <td width="410"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="290"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></td>
    <td width="268"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></td>
    <td width="108"><a href="my_part.php?funcao=editar&clienteID='.$id.'&id_part='.$id_part.' " id="link">editar</a></td>
	 <td width="108"><a href=functionPart.php?funcao=excluir&id="'.$id.'"&part="'.$partitura.'"&id_part="'.$id_part.'" id="link" onclick="return doConfirm(this.id);">excluir</a></td>
  </tr>';			
		 		  
		}
		
		echo '</table>';
		
	  }else{
			 
			 
			 echo ' Nada encontrado para o termo procurado!';

			  
	  }
		  
	}else if($item == "instrumento"){
		
						function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
   
      $sqlconsulta = mysql_query("SELECT partituras.id_partitura,partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,cadastro.id_musicos, cadastro.apelido, cadastro.email FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.instrumento LIKE '".$pesquisa."%' AND cadastro.email LIKE '$user' ORDER BY partituras.titulo")or die(mysql_error());
   
	
	 if( mysql_num_rows($sqlconsulta) >= 1 ){
		 
		   echo '<table width="974" border="1" cellspacing="0"> ';
	
		while($linha = mysql_fetch_array($sqlconsulta)){
			
		  $contador++;		  
		  $cor=($contador%2)?"cor-sim2":"cor-nao2";
	  
	      $i = $i + 1;	 
	      $id = $linha['id_musicos'];
		  $id_part = $linha['id_partitura'];
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
    <td width="410"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="290"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></td>
    <td width="268"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></td>
    <td width="108"><a href="my_part.php?funcao=editar&clienteID='.$id.'&id_part='.$id_part.' " id="link">editar</a></td>
	 <td width="108"><a href=functionPart.php?funcao=excluir&id="'.$id.'"&part="'.$partitura.'"&id_part="'.$id_part.'" id="link" onclick="return doConfirm(this.id);">excluir</a></td>
  </tr>';			
			   
	
	    }
		
		echo '</table>';
		
	   }else{
		 
		echo ' Nada encontrado para o termo procurado!';

		
		
		
		}	
		
			
	 
	} //instrumento
	
  
	   }else{
		
		
		
		
		   
		   
		   				function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
		
		   
		   $resultSql = mysql_query("SELECT  partituras.id_partitura,partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,cadastro.id_musicos, cadastro.apelido, cadastro.email FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE cadastro.email LIKE '$user' ORDER BY partituras.titulo ") or die( mysql_error());
		   
		   echo '<table width="974" border="1" cellspacing="0"> ';
		   
		       while( $linha = mysql_fetch_array($resultSql) ){
				   
		  $contador++;		  
		  $cor=($contador%2)?"cor-sim2":"cor-nao2"; 	
			   
		  $id = $linha['id_musicos'];
		  $id_part = $linha['id_partitura'];
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
    <td width="410"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="290"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></td>
    <td width="268"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></td>
    <td width="108"><a href="my_part.php?funcao=editar&clienteID='.$id.'&id_part='.$id_part.' " id="link">editar</a></td>
	 <td width="108"><a href=functionPart.php?funcao=excluir&id='.$id.'&part='.$partitura.'&id_part='.$id_part.' " id="link" onclick="return doConfirm(this.id);">excluir</a></td>
  </tr>';			
				
				
			   } // while
				
			
		echo '</table>';
	
		
		
		
		
		
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