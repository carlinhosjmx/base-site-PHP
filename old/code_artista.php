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
          alert ("A sessão foi expirada, faça o login novamente!") ; location.href = "http://www.partituras.jmxrio.com.br/index.php";
          
          </SCRIPT>';

        }
		
 
         if(isset($_POST['acao']) && $_POST['acao'] == 'salvarPart')
		 {
			        $part_musica = $_POST['part_musica'];
			        $part_interprete = $_POST['part_interprete'];
			        $part_instrumento = $_POST['part_instrumento'];
					$part_file = $_FILES['arquivo']['name'];
					
					
					if(empty($part_file) ||  $part_file == "" ){ 	


          echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('Você deve anexar um arquivo!') ; location.href = 'http://www.partituras.jmxrio.com.br/user.php';    </SCRIPT> ";

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
			
				
				 echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('enviado com sucesso!') ;  location.href = 'http://www.partituras.jmxrio.com.br/user.php';  </SCRIPT> ";

          exit();
			 
			}
		}
          
  ?> 