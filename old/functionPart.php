<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

      include "conectionx2sa.php";


   $titul = $_POST['titulo'];
   $artist = $_POST['artista'];
   $instrument = $_POST['instrumento'];
   
   $titulo = mb_strtolower( $titul, 'UTF-8');
   $artista = mb_strtolower( $artist, 'iso-8859-1');
   $instrumento = mb_strtolower( $instrument, 'UTF-8');
   
  
  
   
   
   //.........................................................................................
   
   if( $_GET['funcao'] == 'gravar'){
   
   $sql = mysql_query("INSERT INTO tabela ( nome, email, cidade, mensagem) VALUES ( '$grava_nome',  '$grava_email',  '$grava_cidade', '$grava_mensagem'  )");
   
    header("Location: form.php");

   }

   //................................................................................................
   
   if( $_GET['funcao'] == 'editar' ){
	 

	 	 
	 $id = $_GET['id'];
	 $id_part = $_GET['id_part'];
	 
	 
   
	$sql_alterar = mysql_query("UPDATE partituras SET titulo = '$titulo', artista = '$artista', instrumento = '$instrumento' WHERE id_musicos = '$id' AND id_partitura = '$id_part'");
	
	header("Location: my_part.php"); 
	
	}
	
	//................................................................................................
	
	
	 if( $_GET['funcao'] == 'excluir' ){
	 
	 
	 $id = $_GET['id'];
	 $part = $_GET['part'];
	 $id_part = $_GET['id_part'];
	 
 
	  function semAcento($titletext){
	$trocarIsso = array('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','O','','','','','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
	  
	 
	 $sql_altera = mysql_query("SELECT * FROM partituras WHERE id_musicos = '$id' AND id_partitura = '$id_part' ");
	 
	 $linha = mysql_fetch_array($sql_altera);
	 
	 $id_p = $linha['id_partitura'];
	 $partitura = $linha['partitura'];
	 $titul = $linha['titulo'];
	 
	 $nomeRandom = mt_rand();
	 
	   $musica = utf8_decode($titul);
	 
	  //$tituloM = mb_strtolower( $titul,'UTF-8');
	  
	  $titulo = rtrim($musica);
	 
	 $convLetra = semAcento($titulo);
	 
	 $letra = substr($convLetra,0,1);
	 
	 $dir = 'part/'.$letra.'/';
	 
	  
	 
	/* echo 'id  :'.$id.'<br>';
	 echo 'nome musica :'.$titulo.'<br>';
	 echo 'letra :'.$letra.'<br>';
	 echo 'nomepart :'.$dir.$partitura.'<br>';
	 echo 'nomepart :'.$dir.$id.$nomeRandom.'.pdf'; */

  	 
	 if( $partitura == $part ){
	 
	 
	rename( $dir.$partitura, $dir.$id.$nomeRandom.'.pdf' ); 
	 
	    
	$sql_excluir = mysql_query("DELETE FROM partituras WHERE id_partitura = '$id_p'"); 
	
	 header("Location: my_part.php"); 
	
	}
	
	
	 } 

?>

	
	<script>
function myFunction()
{
var x;
var r=confirm("Tem certeza que deseja excluir?");
if (r==true)
  {
  x="You pressed OK!";
  }
else
  {
    location.href = "http://www.partiturasmusicais.com/my_part.php";
  }
document.getElementById("demo").innerHTML=x;
}
</script> 