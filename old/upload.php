<?php

   $conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "3o+W6-Mw64");
   $database = mysql_select_db("jmxrio_musicos"););





         if(isset($_POST['acao']) && $_POST['acao'] == 'salvarPart')
		 {      
		 
		            $part_musica = $_POST['part_musica'];
			        $part_interprete = $_POST['part_interprete'];
			        $part_instrumento = $_POST['part_instrumento'];
					$part_file = $_FILES['arquivo']['name'];
					
					echo $part_musica;
		          
				  if( $_POST['part_musica'] == 'Nome da Música' ){
						
						$part_alerta = " Você de Preencher o campo Nome da Música!";
					    
						
						
					}else if( $_POST['part_interprete'] == 'Nome do Artista' ){
						
						 $part_interprete = "";
					
					}else if( $_POST['part_instrumento'] == 'Instrumento' ){
						
						 $part_instrumento = "";
					
					}
		          
			       
					
					
					
					if(empty($part_file) ||  $part_file == "" ){ 	


          echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('Você deve anexar um arquivo!') ; location.href = 'http://www.partiturasmusicais.com/user.php';    </SCRIPT> ";

          exit();
		
					}
			   
				
				$letra = substr($part_file,0,1);
			
			    $dir = 'part/'.strtolower($letra)."/";
				
				 echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ($dir) ;    </SCRIPT> ";

				
			 $arquivo = strtolower($part_file);
			 $filePdf = str_replace(" ", "_",$arquivo);
			    
			 
			if(empty($part_musica)&& empty($part_interprete)&& empty($part_instrumento))
			{
				$part_alerta = '<div id="part_alerta">Você não preencheu os campos! </div>';
			}else{
				
				$sql = mysql_query("INSERT into partituras ( id_partitura,titulo, artista , instrumento,id_musicos,partitura ) VALUES ( null,'$part_musica', '$part_interprete', '$part_instrumento', '$id', '$filePdf' ) ") or die(mysql_error());
	
				 ( move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$part_file));
				 
				    rename( $dir.$part_file, $dir.$filePdf ); 
			
				
				 echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('enviado com sucesso!') ;  location.href = 'http://www.partiturasmusicais.com/user.php';  </SCRIPT> ";

          exit();
			 
			}
		}

?>