<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

include "conectionx2sa.php"; //aqui inserimos as váriaveis da página de configuração

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$instrumento = $_POST['instrumento'];
$skin = 'images/user.jpg';

 
if ( $errors == "" ) { //checa se houve ou não erros no cadastro
 
  $cadastrar = mysql_query("INSERT INTO cadastro (nome, email, senha, bairro, cidade, instrumento, foto)
   VALUES ('$nome','$email','$senha', '$bairro', '$cidade', '$instrumento', '$skin')", $db); //insere os campos na tabela
 
    if ( $cadastrar == 1 ) {
      echo '<script language="JavaScript">alert("Sua mensagem foi enviada com sucesso! Em breve voce vai receber um retorno!");
location.href="index.php" ;
</script>';
      } else {
      echo '<script language="JavaScript">alert("Ocorreu um erro no servidor ao tentar cadastrar!");
location.href="index.php" ;
</script>' ;
  }
  } else {
    echo "<div align=center><font size=2 face=Verdana, Arial, Helvetica, sans-serif>Ocorreu os seguintes erros ao tentar se cadastrar:$errors</font></div>"; //mostra os erros do usuário, caso houver
}
?>
</body>
</html>