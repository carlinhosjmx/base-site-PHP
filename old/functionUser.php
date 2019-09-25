
<?php

      include "conectionx2sa.php";


   $nome = $_POST['nome'];
   $apelido = $_POST['apelido'];
   $instrumento = $_POST['instrumento'];
   $bairro = $_POST['bairro'];
   $cidade = $_POST['cidade'];
   $ddd2 = $_POST['ddd2'];
   $telefone = $_POST['tel'];
   $ddd3 = $_POST['ddd3'];
   $telefone2 = $_POST['tel2'];
   $radio = $_POST['radio'];
   
   
  
     
   if( $_GET['funcao'] == 'editar' ){
	 

	 	 
	 $id = $_GET['id'];
	
	 
	 
   
	$sql_alterar = mysql_query("UPDATE cadastro SET nome = '$nome', apelido = '$apelido',bairro = '$bairro', cidade = '$cidade', instrumento = '$instrumento' , ddd2 = '$ddd2', telefone2 = '$telefone' , ddd3 = '$ddd3', telefone3 = '$telefone2', radio ='$radio' WHERE id_musicos = '$id' ");
	
	 echo " <SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'>alert ('Cadastro atualizado com sucesso!') ;  location.href = 'http://www.partiturasmusicais.com/my_perfil.php';  </SCRIPT> ";
	
	//header("Location: my_perfil.php"); 
	
	}
	
	
   ?>