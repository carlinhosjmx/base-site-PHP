<?php

          session_start(); 

           $conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "3o+W6-Mw64");
           $database = mysql_select_db("jmxrio_musicos");
		   
           $part_file = $_FILES['arquivo']['name'];
		   $usuario = $_SESSION[ 'loginUser' ];	
		   
		    echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
			
			         $nomeFoto = substr($part_file, 0, 5);
					
					$extensao = end( explode(".", $part_file));
					
					
					
					if( $extensao != 'jpg' ){
						
						echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('Você só pode enviar arquivo no formato JPG!') ; location.href = 'uploadFoto.php';    </SCRIPT> ";
						
					}
		          
				  if( $part_file == '' ){
						
						$part_alerta = "arquivo não veio";
					    
						
						
					}
					
					$sql_consulta = mysql_query("SELECT * FROM cadastro WHERE email LIKE '$usuario'");
					
					$retorno = mysql_fetch_array($sql_consulta);
					
					$id = $retorno['id_musicos'];
				
				    $letra = substr($part_file,0,1);
			
			        $dir = 'fotoUser/';
				
				    $extensao = end( explode(".", $part_file));
					
					

				
			 $arquivo = strtolower($nomeFoto);
			 $fileAlter = str_replace(" ", "_",$arquivo);
			    
			 $foto = $dir.$id.$fileAlter.".".$extensao;
			
				$sql = mysql_query("UPDATE cadastro SET foto = '$foto' WHERE email = '$usuario'") or die(mysql_error());
	
				 ( move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$part_file));
				 
				    rename( $dir.$part_file, $foto ); 
			
				
				 echo 'Foto enviada com sucesso! <br /> <h3>Atualize a página para ver a nova foto</h3><br />se a foto não aparecer envie novamente.';

          exit();
			 
			

 
 
 ?>