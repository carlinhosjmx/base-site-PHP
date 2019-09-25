<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "3o+W6-Mw64");
   $database = mysql_select_db("jmxrio_musicos");

  $email = $_POST['emailCancela'];
  $senha = md5($_POST['senhaCancela']);
  
  
   if( $email == '' || empty($email)){
		 
		 echo '<script language="javascript" type="text/javascript">alert("você deve preencher o campo email!"); location.href = "http://www.partiturasmusicais.com/cancelarConta.php";</script>';
		 
	 }
	 
	 
	 if(filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
		 
		echo '<script language="javascript" type="text/javascript" >alert("O email não é válido, tente novamente!"); location.href = "http://www.partiturasmusicais.com/cancelarConta.php";</script>'; 
		 
	 }
	 
	 $sql_consulta = mysql_query("SELECT * FROM cadastro WHERE email = '$email' AND senha = '$senha'");
	 
	
	 
	 if( mysql_num_rows($sql_consulta) == 1 ){
		 
		 $linha = mysql_fetch_array($sql_consulta);
		 
		 $id = $linha['id_musicos'];
		 
		 $deleta = mysql_query("DELETE FROM cadastro WHERE id_musicos='$id' ");
		 
		 echo '<script language="javascript" type="text/javascript">alert("Conta excluida com sucesso!"); location.href = "http://www.partiturasmusicais.com/index.php";</script>';
		 
		 
		 
		 
		}else{
			
			echo 'não fez o if';
			
			}
  








?>