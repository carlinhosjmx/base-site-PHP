<?php
   
   session_start(); 
   
  $conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "@#partituras@#");
   $database = mysql_select_db("jmxrio_musicos");
   
   if( !isset($_SESSION[ 'loginAdmin' ]) && !isset($_SESSION[ 'senhaAdmin' ])){
															
			header("Location: adminx2.php ");												
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
 
          if( isset($_SESSION[ 'loginAdmin' ]) && isset($_SESSION[ 'senhaAdmin' ]) ){
			  
					
	       $user = $_SESSION[ 'loginAdmin' ];
		   
		   
		   
		   $resultSql = mysql_query("SELECT * FROM cadastro WHERE email = '$user' AND activo = '1' ") or die( mysql_error()); 
		   
		   	  
		   
		       $linha = mysql_fetch_array($resultSql);
			   $id = $linha['id_musicos'];
			   $usuario = $linha['nome'];
			   $apelido = $linha['apelido'];
			   $email = $linha['email'];
			   $bairro = $linha['bairro'];
			   $cidade = $linha['cidade'];
			   $foto = $linha['foto'];
			   $instrumento = $linha['instrumento'];
			   $activo = $linha['activo'];
			   
			   $ext = end( explode("fotoUser/", $foto));
			   $compExt = substr( $ext, -4);
			   
			  
			   
			   if( $compExt != '.jpg' || empty($compExt)  )
			   {
				   
				   $foto = "fotoUser/user.jpg"; 
				   
				   $sqlexec = mysql_query("UPDATE cadastro SET foto = '$foto' WHERE id_musicos = ' $id'");
				   
				   
				   
				   
				}
			   
			  
		
		 }else{


          echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
          alert ("A sessão foi expirada, faça o login novamente!") ; location.href = "http://www.partiturasmusicais.com/adminx2.php";
          
          </SCRIPT>';

        }
		
 
  ?> 
  
 
 <?php
 
  
 
  if(isset($_POST['acao']) && $_POST['acao'] == 'salvarPart')
		 {      
		 
		            $part_music = $_POST['part_musica'];
			        $part_interpret = $_POST['part_interprete'];
			        $part_instrument = $_POST['part_instrumento'];
					$part_file = $_FILES['arquivo']['name'];
					
					
					$part_musica = mb_strtolower( $part_music, 'UTF-8');
			        $part_interprete = mb_strtolower($part_interpret, 'UTF-8');
			        $part_instrumento = mb_strtolower($part_instrument, 'UTF-8');
					
					
					
					function semAcento($titletext){
	$trocarIsso = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ','+','/','-','&');
	$porIsso = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','0','U','U','U','Y','_','_','_','_');
	$titletext = str_replace($trocarIsso, $porIsso, $titletext);
	return $titletext;
                  
				  } // termina function semAcento
					
				
				$extensao = end( explode(".", $part_file));
					
					if( $extensao != 'pdf' ){
						
						echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('Você só pode enviar arquivo no formato PDF!') ; location.href = 'principal.php';    </SCRIPT> ";
						
						exit;
						
					}
		          
				  if( $_POST['part_musica'] == '' ){
						
						$part_alerta = " Você de Preencher o campo Nome da Música!";
					    
						
						
					}else if( $_POST['part_interprete'] == '' ){
						
						 $part_interprete = "Você de Preencher o campo Nome do artista!";
					
					}else if( $_POST['part_instrumento'] == '' ){
						
						 $part_instrumento = "Você de Preencher o campo instrumento!";
					
					}
		          
			       
					
					
					
					if(empty($part_file) ||  $part_file == "" ){ 	


          echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('Você deve anexar um arquivo!') ; location.href = 'http://www.partiturasmusicais.com/principal.php';    </SCRIPT> ";

          exit();
		
					}
					
					echo '<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">';
					
					$sqlId = mysql_query( "SELECT * FROM partituras");
					
					$geranum = mysql_num_rows($sqlId) + 1;
					
					
			   
				
				$letra = substr($part_musica,0,1);
			
			    $dir = 'part/'.strtolower($letra)."/";
				
				 echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ($dir) ;    </SCRIPT> ";
             $part_menor = semAcento($part_musica);
			 $arquivo = substr($part_menor,0,13);
			 $filePdf = str_replace(" ", "_",$arquivo);
			 $interprete = str_replace(" ", "_",$part_interprete);
			 $artist = semAcento($interprete);
			 $part_instr = str_replace(" ", "_",$part_instrumento);
			 $instr = semAcento($part_instr);
			 $pdf = '.pdf';
			 $part = $id.$filePdf.$artist.$instr.'.pdf';
			    
			 
			if(empty($part_musica)&& empty($part_interprete)&& empty($part_instrumento))
			{
				$part_alerta = '<div id="part_alerta">Você não preencheu os campos! </div>';
			}
			
			if( file_exists($dir.$part) ){
			
			     echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('Você já enviou um pdf com estes mesmos dados, seu arquivo não foi enviado!') ;  location.href = 'http://www.partiturasmusicais.com/user.php';  </SCRIPT> ";
			
			}else{				
				$sql = mysql_query("INSERT into partituras ( id_partitura,titulo, artista , instrumento,id_musicos,partitura ) VALUES ( null,'$part_musica', '$part_interprete', '$part_instrumento', '$id', '$part' ) ") or die(mysql_error());
	
				 ( move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$part_file));
				 
				    rename( $dir.$part_file, $dir.$part ); 
			
				
				 echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('enviado com sucesso!') ;  location.href = 'http://www.partiturasmusicais.com/principal.php';  </SCRIPT> ";

          exit();
		
		
			}
		
		
			
		}
		
		

 
 
 ?>
 
 <?php
 
      $pesquisaSql = mysql_query("SELECT * FROM cadastro");
	  
	   $TotalUsuarios = mysql_num_rows($pesquisaSql);
 
 
 ?>
  
  
      


<div id="header">
  <div id="header_inter">
    <div id="logo"><img src="images/logo.png" /></div>
   <div id="urgente2">PAINEL ADMINISTRATIVO </div>
    <div id="sair"><a href="logoutAdm.php">Sair</a></div>

</div>
</div>
<div id="content_user">
<div id="content2">

<div id="box_center">

<div id="box_user">

  <div id="box_info3">

   <div id="form_user3">
       
     <?php
      


       if( $usuario != "" ){
		
			
		    //  '<h3> Bem vindo&nbsp;'.$apelido.',</h3><br /><span> essa é a sua área.</span> ';

	   }
	   
	   
      ?>  
  
     
         
     </div><!--form_login-->
     
    
     <ul>
	     <li><a href="cadastroxx.php">Cadastro de Usuário</a></li>
   
     </ul>
	 <div id='box_labels'> 
	<div id="label1">
	 
	   <div id='textlabel'><h4>Usuários On-line: </h4></div>
	   <div id="resultadolabel"> 
	 <?php
	 
	    $consulta = mysql_query("SELECT * FROM cadastro WHERE logado = '1'" );
		 $totalonline = mysql_num_rows($consulta);
		 
		 echo $totalonline ;
	 
	 
	 ?>
	 </div>

	
	 </div> <!--label1-->
	 
	 <div id="label1">
	 
	   <div id='textlabel'><h4>Usuários Cadastrados: </h4></div>
	   <div id="resultadolabel"> 
	 <?php
	 
	    $consulta = mysql_query("SELECT * FROM cadastro " );
		 $totaluser = mysql_num_rows($consulta);
		 
		 echo $totaluser ;
	 
	 
	 ?>
	 </div>

	 
	 </div> <!--label1-->
	 
	 <div id="label1">
	 
	   <div id='textlabel'><h4>Usuários Ativados: </h4></div>
	   <div id="resultadolabel"> 
	 <?php
	 
	    $consulta = mysql_query("SELECT * FROM cadastro WHERE activo = '1'" );
		 $totalativo = mysql_num_rows($consulta);
		 
		 echo $totalativo ;
	 
	 
	 ?>
	 </div>

	 
	 </div> <!--label1-->
     
     
     <div id="label1">
	 
	   <div id='textlabel'><h4>Usuários Não-Ativados: </h4></div>
	   <div id="resultadolabel"> 
	 <?php
	 
	    $consulta = mysql_query("SELECT * FROM cadastro WHERE activo = '0'" );
		 $totalinativo = mysql_num_rows($consulta);
		 
		 echo $totalinativo ;
	 
	 
	 ?>
	 </div>

	 
	 </div> <!--label1-->
	 
	  <div id="label1">
	 
	   <div id='textlabel'><a href='emails.php'>E-mail usuários</a></div>
	  

	 
	 </div> <!--label1-->
     </div>
     
  
    
    
   </div>
  
  
  


</div><!--box_user-->







<div id="box_usuariosAdm">

 <div id="rotulo_usuarios"><h2>Usuários Cadastrados</h2><span><? echo $TotalUsuarios; ?></span></div>
<div id="usuariosAdm">
<?php
   

   
  
   
  $sql_view = mysql_query(" SELECT * FROM cadastro ORDER BY apelido ");
  
 
  while($linha = mysql_fetch_array( $sql_view )){
	  
  
	
  $nome = $linha['nome'];
  $nickname = $linha['apelido'];
  $email = $linha['email']; 
  $bairro = $linha['bairro']; 
  $cidade = $linha['cidade']; 
  $instrumento = $linha['instrumento'];
  $foto = $linha['foto'];
  $logado = $linha['logado'];
  
  if( $logado == 1 ){
  
  $status = "<img src='images/online.png' />" ;
 
  }else if( $logado == 0){
	  
   $status = "<img src='images/offline.png' />" ;
 
  }
 
           echo " <div id='celula'><div id='foto'><img src='{$foto}' width='110' height='110' /></div><div id='dados'><div id='line1'><div id='nome'>".$nickname."</div><div id='status'>".$status."</div></div><div id='line2'><div id='instrumento'><span>Instrumento:&nbsp;</span>".$instrumento."</div></div><div id='line3'><div id='email'><span>e-mail:&nbsp;</span> ".$email."</div></div><div id='line4'><div id='bairro'><span>Bairro:&nbsp;</span>".$bairro."</div><div id='separador'>-</div><div id='cidade'><span>Cidade:&nbsp;</span> ".$cidade." </div></div></div></div>" ;
   
		

   
  }
	?>
    
    </div>
 </div><!--box_usuarios-->
 </div><!--box_center-->
 </div><!--content_usua-->
 </div>
<?php
   
   include "footer.php";

?>


















</body>
</html>