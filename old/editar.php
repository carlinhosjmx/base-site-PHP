<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

      include "conectionx2sa.php";

   $id = $_POST['id'];
   $nome = $_POST['nome'];
   $apelido = $_POST['apelido'];
   $email = $_POST['email'];
   $bairro = $_POST['bairro'];
   $cidade = $_POST['cidade'];
   $instrumento = $_POST['instrumento'];
   $telefone= $_POST['telefone'];
   $foto = $_POST['foto'];
   $ativo = $_POST['ativo'];
   
   
   //.........................................................................................
   
   if( $_GET['funcao'] == 'gravar'){
   
   $sql = mysql_query("INSERT INTO tb_curso ( nome, email, cidade, mensagem) VALUES ( '$grava_nome',  '$grava_email',  '$grava_cidade', '$grava_mensagem'  )");
   
    header("Location: form.php");

   }

   //................................................................................................
   
   if( $_GET['funcao'] == 'editar' ){
	 
	/*echo 'Passou por aqui o id'.$id.'<br>';
	echo 'Passou por aqui o apelido'.$apelido.'<br>';
	echo 'Passou por aqui o nome'.$nome.'<br>';
	echo 'Passou por aqui o email'.$email.'<br>';
	echo 'Passou por aqui o bairro'.$bairro.'<br>';
	echo 'Passou por aqui o cidade'.$cidade.'<br>';*/
	
	 
	 $id = $_GET['id'];
  
$sql_alterar = mysql_query("UPDATE cadastro SET nome = '$nome', apelido = '$apelido', email = '$email',  bairro = '$bairro', cidade = '$cidade', instrumento = '$instrumento', telefone1 = '$telefone' , foto = '$foto', activo = '$ativo' WHERE id_musicos = '$id'");
	
	 header("Location: cadastroxx.php");
	 
	
	}
	
	//................................................................................................
	
	
	 if( $_GET['funcao'] == 'excluir' ){
	 
	 
	 $id = $_GET['clienteID'];
   
	$sql_excluir = mysql_query("DELETE FROM cadastro WHERE id_musicos = '$id'");
	
	 header("Location: cadastroxx.php");
	
	}
	
	


?>