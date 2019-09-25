<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="style.css" type="text/css">



</head>

<body>
<div id="container">
<div id="header">

  <div id="logo"><img src="images/logo.png" /></div>

   



</div>
<div id="content_usua">

<?
include "conectionx2sa.php"; 

$email = $_POST['email'];
$senha = $_POST['senha'];

 
$confirmacao = mysql_query("SELECT * FROM cadastro WHERE email = '$email' AND senha = '$senha'" , $db); 

$contagem = mysql_num_rows($confirmacao); 

while($linha = mysql_fetch_array( $confirmacao )){
  $get_nome = $linha['nome'];
  $id_musicos = $linha['id_musicos'];
	  
  }
 
 if( $email == "" || $senha == "" ){
?>	 


<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
alert ("Você deve preencher os campos!") ;
location.href = "index.php" ; 
</SCRIPT>


 
<?	 
 }

if ( $contagem == 1 ) {
	
	
?>  

 
          

<div id="content_logar">
        
          
      <div id="form_login">
        
  
        
         
         <h3><?  echo "Bem vindo,".$get_nome ; ?></h3>
       </div>
</div>

<?
}else{
?>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
alert ("Senha ou email inválidos, tente novamente!") ;
location.href = "index.php" ; 
</SCRIPT>
<?
}
?>

<div id="box_usuarios">
  <?php
   

   
  
   
  $sql_view = mysql_query(" SELECT * FROM cadastro ORDER BY nome ");
  
  $dir = "images";

 

 
 
 
  

  while($linha = mysql_fetch_array( $sql_view )){
	  
  
	
  $nome = $linha['nome'];
  $email = $linha['email']; 
  $bairro = $linha['bairro']; 
  $cidade = $linha['cidade']; 
  $instrumento = $linha['instrumento']; 
 
  $imagem = $dir.$image; 
 

 
	  
	  if( $image == "")
        {
 
           echo " <div id='celula'><div id='rotulo'><div id='nome'>".$nome."</div><div id='email'> ".$email."</div></div><div id='linhaend'><div id='bairro'>".$bairro."</div><div id='cidade'> ".$cidade." </div><div                   id='separador'>-</div><div id='instrumento'>".$instrumento."</div></div></div>" ;
   
		}
		else
		{
			echo " <div id='bannerAnuncio'><img src='".$imagem."' /><a href='#'><div id='buttonBn'>Clique Promoções</div></a></div>";
			
		}

   
  }
	?>
 </div>
 </div><!--content_usua-->
 </div>
</body>
</html>