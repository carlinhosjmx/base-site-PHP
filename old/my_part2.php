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

<style type="text/css">
.cor-sim{
background-color: #BBDDFF;
text-align:center;
}

.cor-nao{
background-color: #DDEEFF ; 
text-align:center;
}

.cor-sim:hover,.cor-nao:hover{
background-color:#FF9; 
}

td

</style>

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
<div id="content2">
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
    
    
     <ul >
	   <li class="top" > Nome da Música</li>
		<li class="top" >Artista</li>
        <li class="top" >Instrumento</li>
      </ul>  
		
     
	  
      
      <ul>  
		<li><input type="text" name="titulo" size="31" value="<? echo $titulo; ?>" /></li>
	    <li><input type="text" name="artista" size="31" value="<? echo $artista; ?>" /></li>
         <li><input type="text" name="instrumento" size="31"  value="<? echo $instrumento; ?>" /></li>
	  <ul>
     
     <input type="submit" value="Alterar" />
      
    </form>  
	
    </div>
   



<div id="box_center">

<div id="form_busca">


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

<div id="result_busca2">
     <div id="resultado2">
	     
       
<table width="970" border="1" cellspacing="0">

   <tr bgcolor="#0099FF" >
    <td width="300">Música</td>
    <td width="262">Instrumento</td>
    <td width="254">Artista</td>
    <td width="52">Editar</td>
    <td width="70">Excluir</td>
  </tr>

<?php


   
		  if( isset($_SESSION[ 'loginUser' ]) && isset($_SESSION[ 'senhaUser' ]) ){
	
	        $user = $_SESSION[ 'loginUser' ];
		   
		    $consulta = mysql_query("SELECT email FROM cadastro WHERE email = '$user'");
		   
		    if( mysql_num_rows($consulta) == 1){
	
	 if(isset($_POST['search']) && $_POST['search'] == 'pesquisar' ){

   $pesquisa = $_POST['pesquisar'];
   $categoria = $_POST['seletor'];
   
    
	 
	 if( $categoria == 1 ){
		 
		 $item = "Título";
		 
	   }else if( $categoria == 2 ){
		  
		  $item = "Artista";
		  
	   }else if( $categoria == 3 ){
		   
		   $item = "Instrumento";
		   
	   }
	   
	  /* else{
		   
		   $item = "Usuário";
   
	   }
	   
	   */
	   
	    if($categoria == 1){
	   		   
		   $resultSql = mysql_query("SELECT  partituras.id_partitura,partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,cadastro.id_musicos, cadastro.apelido, cadastro.email FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE cadastro.email LIKE '$user' ORDER BY partituras.titulo ") or die( mysql_error());
		   
		       while( $linha = mysql_fetch_array($resultSql) ){
			
		  $contador++;
		  $cor=($contador%2)?"cor-sim":"cor-nao"; 
		  
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
		 
		  $letra = substr($titulo,0,1);
	      $novaletra = strtolower($letra);
		  $dir = 'part/'.$novaletra.'/';
		  $url = $dir.$partitura ;
		   
							
				 echo ' <tr class='.$cor.'>
    <td width="300"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="262"><a href='.$url.' target="_blank" class="result">'.$instrumento.'</a></td>
    <td width="254"><a href='.$url.' target="_blank" class="result">'.$artista.'</a></td>
    <td width="52"><a href="my_part.php?funcao=editar&clienteID='.$id.'&id_part='.$id_part.'" class="anula">editar</a></td>
    <td width="70"><a href="functionPart.php?funcao=excluir&id='.$id.'&part='.$partitura.'&id_part='.$id_part.'" id="link" onclick="return doConfirm(this.id);">excluir</a></td>
  </tr>';
  
				
				
			   } // while
				
		}
	   
   else if($categoria == 2)
   {
	  $sqlconsulta = mysql_query("SELECT partituras.id_partitura,partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,cadastro.id_musicos, cadastro.apelido, cadastro.email FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.titulo LIKE '".$pesquisa."%' AND cadastro.email LIKE '$user' ORDER BY partituras.titulo")or die(mysql_error());
	  
	if( mysql_num_rows($sqlconsulta) >= 1 ){
	
	  while($linha = mysql_fetch_array($sqlconsulta)){
		  
		  $contador++;
		  $cor=($contador%2)?“cor-sim”:“cor-nao”; 
		  
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
		 
		  $letra = substr($titulo,0,1);
	      $novaletra = strtolower($letra);
		  $dir = 'part/'.$novaletra.'/';
		  $url = $dir.$partitura ;
		  

	       echo ' <tr class="'.$cor.'">
    <td width="300"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="262">'.$instrumento.'</td>
    <td width="254">'.$artista.'</td>
    <td width="52"><a href="my_part.php?funcao=editar&clienteID='.$id.'&id_part='.$id_part.'" class="anula">editar</a></td>
    <td width="70"><a href="functionPart.php?funcao=excluir&id='.$id.'&part='.$partitura.'&id_part='.$id_part.'" id="link" onclick="return doConfirm(this.id);">excluir</a></td>
  </tr>';
	     
					  
		 }
	  
   }else{
			 
			 echo ' Nada encontrado para o termo procurado!';
			 //echo " A busca '".$pesquisa." ' não está de acordo com a categoria = ".$item;
			  
	  
	  }
	  
	 
	  
	
	}else if($categoria == 3){
		
		 $sqlconsulta = mysql_query("SELECT partituras.id_partitura,partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,cadastro.id_musicos, cadastro.apelido, cadastro.email FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.artista LIKE '".$pesquisa."%' AND cadastro.email LIKE '$user' ORDER BY partituras.titulo")or die(mysql_error());
		
	if( mysql_num_rows($sqlconsulta) >= 1 ){
		
		while($linha = mysql_fetch_array($sqlconsulta)){
	      
		  $contador++;
		  $cor=($contador%2)?“cor-sim”:“cor-nao”; 
		  
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
		 
		  $letra = substr($titulo,0,1);
	      $novaletra = strtolower($letra);
		  $dir = 'part/'.$novaletra.'/';
		  $url = $dir.$partitura ;
	      
 echo ' <tr class="'.$cor.'">
    <td width="300"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="262">'.$instrumento.'</td>
    <td width="254">'.$artista.'</td>
    <td width="52"><a href="my_part.php?funcao=editar&clienteID='.$id.'&id_part='.$id_part.'" class="anula">editar</a></td>
    <td width="70"><a href="functionPart.php?funcao=excluir&id='.$id.'&part='.$partitura.'&id_part='.$id_part.'" id="link" onclick="return doConfirm(this.id);">excluir</a></td>
  </tr>';
		 		  
		}
		
	  }else{
			 
			 
			 echo ' Nada encontrado para o termo procurado!';

			  
	  }
		  
	}else if($categoria == 4){
   
      $sqlconsulta = mysql_query("SELECT partituras.id_partitura,partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,cadastro.id_musicos, cadastro.apelido, cadastro.email FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE partituras.instrumento LIKE '".$pesquisa."%' AND cadastro.email LIKE '$user' ORDER BY partituras.titulo")or die(mysql_error());
   
	
	 if( mysql_num_rows($sqlconsulta) >= 1 ){
	
		while($linha = mysql_fetch_array($sqlconsulta)){
	  
	     $contador++;
		  $cor=($contador%2)?“cor-sim”:“cor-nao”; 
		  
		  
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
		 
		  $letra = substr($titulo,0,1);
	      $novaletra = strtolower($letra);
		  $dir = 'part/'.$novaletra.'/';
		  $url = $dir.$partitura ;
	   

	     echo ' <tr class="'.$cor.'">
    <td width="300"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="262">'.$instrumento.'</td>
    <td width="254">'.$artista.'</td>
    <td width="52"><a href="my_part.php?funcao=editar&clienteID='.$id.'&id_part='.$id_part.'" class="anula">editar</a></td>
    <td width="70"><a href="functionPart.php?funcao=excluir&id='.$id.'&part='.$partitura.'&id_part='.$id_part.'" id="link" onclick="return doConfirm(this.id);">excluir</a></td>
  </tr>';
	
	    }
		
	   }else{
		 
		echo ' Nada encontrado para o termo procurado!';

		
		
		
		}	
	 
	}
	 
	}else{
		
		
		
		
		
		
		   
		   $resultSql = mysql_query("SELECT  partituras.id_partitura,partituras.titulo,partituras.artista,partituras.partitura,partituras.instrumento,cadastro.id_musicos, cadastro.apelido, cadastro.email FROM partituras INNER JOIN cadastro ON partituras.id_musicos = cadastro.id_musicos  WHERE cadastro.email LIKE '$user' ORDER BY partituras.titulo ") or die( mysql_error());
		   
		       while( $linha = mysql_fetch_array($resultSql) ){
			
			
		  $contador++;
		  $cor=($contador%2)?"cor-sim":"cor-nao"; 
		  
			
			
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
		 
		  $letra = substr($titulo,0,1);
	      $novaletra = strtolower($letra);
		  $dir = 'part/'.$novaletra.'/';
		  $url = $dir.$partitura ;
		 
							
				  echo ' <tr class='.$cor.'>
    <td width="300"><a href='.$url.' target="_blank" class="result">'.$titulo.'</a></td>
    <td width="262">'.$instrumento.'</td>
    <td width="254">'.$artista.'</td>
    <td width="52"><a href="my_part.php?funcao=editar&clienteID='.$id.'&id_part='.$id_part.'" class="anula">editar</a></td>
    <td width="70"><a href="functionPart.php?funcao=excluir&id='.$id.'&part='.$partitura.'&id_part='.$id_part.'" id="link" onclick="return doConfirm(this.id);">excluir</a></td>
  </tr>';
				
				
			   } // while
				
			
		
	
		
		
		
		
		
		}
	
  
			}
	}	  




?>



 
  
  
  
  
  
  
</table>

		  

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