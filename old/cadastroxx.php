<?php
   
   session_start(); 
   
  $conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "@#partituras@#");
   $database = mysql_select_db("jmxrio_musicos");
   
   if( !isset($_SESSION[ 'loginAdmin' ]) && !isset($_SESSION[ 'senhaAdmin' ])){
															
			header("Location: index.php ");												
			exit;												
															
 }
 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Cadastro de M�sicos</title>

<!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


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

<style type="text/css">

body{
	
text-align: center;	
	
}

table tr td{

border: 1px solid #ccc;
text-align:left;
font-family:Arial, Helvetica, sans-serif;
font-size:14px;	
	
}

#center{
position:relative;
width: 980px;
margin-top: 15px;
margin-left: auto;
margin-right: auto;
	
}

#header{

position:relative;
top: 10px;
left: 0px;
width: 980px;
height: 120px;



	
}

#logoCad{

position:absolute;
top: 10px;
left: 10px;
width: 300px;
height: 100px;

	
}

#rotulo{

position:absolute;
top: 40px;
left: 370px;
width: 320px;
height: 80px;
font-family:Arial, Helvetica, sans-serif;
font-size:20px;
font-weight:bold;
text-align:center;
	
}


.titulo{ 

font-family:Arial, Helvetica, sans-serif;
font-size:12px;
font-weight:bold;
text-align:center;
background:#ACCBE7 url( bgC.jpg ) repeat-x;


}

.celula{ 

font-family:Arial, Helvetica, sans-serif;
font-size:11px;
text-align:center;
background: #F4F5F7;

}

#box_table{
position:relative;
width: 1024px;
height: 400px;
margin-top: 0px;
border: 1px solid #ccc;
	
}

#form_altera{
position: relative;
width: 1024px;
height: 310px;
margin-top: 20px;
text-align:left;
	
}

#table_fix{

width: 1024px;
height: 186px;
margin-top: 0px;
margin-left: 0px;
text-align:left;
background: #F4F5F7;
	
	
}

#bt_submit{
position: relative;
top: 3px;
left: 450px;
width: 130px;
height: 30px;
	
	
}

#cabecalho{ position:absolute; top: 2px; width: 1069px; border:1px solid #ccc; font-size:12px; font-weight:bold;}

#col1{ float:left; width: 37px; height: 23px; background: #B4DADB; border: 1px solid #ccc; padding-top: 6px; }
#col2{ float:left; width: 43px; height: 23px; background: #B4DADB; border: 1px solid #ccc; padding-top: 6px; }
#col3{ float:left; width: 140px; height: 23px; background: #B4DADB; border: 1px solid #ccc; padding-top: 6px; }
#col4{ float:left; width: 123px; height: 23px; background: #B4DADB; border: 1px solid #ccc; padding-top: 6px; }
#col5{ float:left; width: 275px; height: 23px; background: #B4DADB; border: 1px solid #ccc; padding-top: 6px; }
#col6{ float:left; width: 120px; height: 23px; background: #B4DADB; border: 1px solid #ccc; padding-top: 6px; }
#col7{ float:left; width: 140px; height: 23px; background: #B4DADB; border: 1px solid #ccc; padding-top: 6px; }
#col8{ float:left; width: 195px; height: 23px; background: #B4DADB; border: 1px solid #ccc; padding-top: 6px; }
#col9{ float:left; width: 115px; height: 23px; background: #B4DADB; border: 1px solid #ccc; padding-top: 6px; }
#col10{ float:left; width: 120px; height: 23px; background: #B4DADB; border: 1px solid #ccc; padding-top: 6px; }

table .tabela tbody tr:nth-child(odd){
   background-color: #E9E9E9;
}

#tabela{position:absolute; top: 37px; width: 1069px; min-height:400px; overflow:auto;}

.peq{ width: 100px;}
#label_table{
position: relative;	
width: 1024px;
height: 20px;
line-height: 20px;
background: #69C;
color: #fff;
font-family:Tahoma, Geneva, sans-serif;
font-size:16px;
text-align:center;
padding: 8px 0px;
margin-left: 0px;
	
}

#linkadmin{ position:absolute; left: 770px; width: 300px; height: 25px; margin-bottom: 10px;}

#linkadmin a { text-decoration: none; color: #900;}

</style>

<body>
<div id="center">
<div id="header"><div id="logoCad"><img src="images/logo.png" width="300" height="100" /></div><div id="rotulo">Cadastro de Musicos</div></div>
 <div id="linkadmin"><a href="principal.php">Voltar ao inicio</a></div> 
  <?php   
  
       $conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "@#partituras@#");
   $database = mysql_select_db("jmxrio_musicos");
   
  
        if( $_GET['funcao'] == 'editar' ){
			
			$id = $_GET['clienteID'];
			
			
			
			
		 $sql_view = mysql_query(" SELECT * FROM cadastro where id_musicos = '$id'; ");
  

  while($linha = mysql_fetch_array( $sql_view )){
  $id = $linha['id_musicos'];
  $nome = $linha['nome'];
  $apelido = $linha['apelido'];
  $email = $linha['email']; 
  $bairro = $linha['bairro']; 
  $cidade = $linha['cidade']; 
  $instrumento = $linha['instrumento'];
  $telefone = $linha['telefone1'];
  $foto = $linha['foto'];
  $ativo = $linha['activo'];
  
  }
  
		}
		
?>
  

 <div id="form_altera">
 <div id="label_table">Alteração de Dados</div>
 <div id="table_fix">
  <form action="editar.php?funcao=editar&id=<? echo $id ?>" method="post" >
   <table width="1024" border="0" cellspacing="0" >
     <tr>
       <td height="27">Ativo :</td>
       <td><input type="text" name="ativo" size="10" value="<? echo $ativo; ?>" /></td>
       <td colspan="2">&nbsp;</td>
       </tr>
     <tr>
       <td width="114">Nome :</td>
        <td width="314"><input type="text" name="nome" size="40" value="<? echo $nome; ?>" /></td>
         <td width="122"><label>Nome Artist :</label></td>
          <td width="393"><input type="text" name="apelido" size="30" value="<? echo $apelido; ?>" /></td>
        </tr>  
        <tr>
          <td>email :</td>
          <td><input type="text" name="email" size="40"  value="<? echo $email; ?>" /></td>
          <td>Instrumento :</td>
          <td><input type="text" name="instrumento" size="30" value="<? echo $instrumento; ?>"  /></td>
        </tr>  
          <tr>
          <td><label>Bairro</label> 
            :</td>
          <td> <input type="text" name="bairro" size="40" value="<? echo $bairro; ?>" /></td>
          <td> <label>Cidade :</label></td>
          <td> <input type="text" name="cidade" size="30" value="<? echo $cidade; ?>"  /></td>
        </tr> 
         </tr>  
          <tr>
          <td>Telefone :</td>
          <td><input type="text" name="telefone" size="20" value="<? echo $telefone; ?>"  /></td>
          <td><label>Foto :</label></td>
          <td><input type="text" name="foto" size="30" value="<? echo $foto; ?>"  /></td>
        </tr>  
          </tr>  
          <tr>
          <td colspan="4"><div id="bt_submit">   <input type="hidden" name="id" value="'.$id.'" />	<input type="submit" value="Alterar" /></div></td>
        </tr>
       </table>
      
    </form> 
    </div> 
  </div>
  
	
    <div id="form_buscaAdm">


<form id="form1" name="form1" method="post" action="">
<table >
   <tr>
     <td><span>Buscar</span></td> 
  <td><input type="text" name="pesquisar" class="pesquisar" title="Digite o que procura"  size="45" /></td>
   <td> <span>Como:</span> </td>
  <td><select id="seletor" name="seletor">
       <option value="0">selecione</option>
       <option value="1">Nome</option>
       <option value="2">Nome Artistico</option>
       <option value="3">email</option>
       <option value="4">Todos</option>
       <option value="5">Não Ativados</option>
       
       
  </select></td>
  <td><input type="hidden" name="search" value="pesquisar" />
  <input type="submit" name="button" id="button" value="Pesquisar" /></td>
  </tr>
  </table>
</form>

</div>




		
  
		
  
<div id="box_table">
 <div id="cabecalho">
   
    
      
	  <div id="col1">Editar</div>
       <div id="col2">Excluir</div>
		<div id="col3">Nome</div>
        <div id="col4">Nome Artist</div>
        <div id="col5">email</div>
        <div id="col8">Instrumento</div>
        <div id="col9">Telefone</div>
        <div id="col10">Foto</div>
        
     
      
   </div>  
   
   <div id="tabela">
      
 <?php
   
    $conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "@#partituras@#");
   $database = mysql_select_db("jmxrio_musicos");
   
  
   
   if(isset($_POST['search']) && $_POST['search'] == 'pesquisar' ){

   $pesquisa = $_POST['pesquisar'];
   $categoria = $_POST['seletor'];
   
   
   if($categoria == 1)
   {
   
  $sql_view = mysql_query(" SELECT * FROM cadastro WHERE nome LIKE '".$pesquisa."%' ORDER BY nome ASC; ");
   
     echo '<table width="1069" border="1" cellspacing="0"> ';

  while($linha = mysql_fetch_array( $sql_view )){
  
  $id = $linha['id_musicos'];
  $nome = $linha['nome'];
  $apelido = $linha['apelido'];
  $email = $linha['email']; 
  $bairro = $linha['bairro']; 
  $cidade = $linha['cidade']; 
  $instrumento = $linha['instrumento'];
  $telefone = $linha['telefone1'];
  $foto = $linha['foto'];
  
  $datainicial = date( "d-m-Y" , $data );
 
 ?>
   
     <tr class="celula" height="35">
	   <td><a href="cadastroxx.php?funcao=editar&clienteID=<? echo $id ?>">editar</a></td>
         <td><a href=editar.php?funcao=excluir&clienteID=<? echo $id ?> " onclick="return doConfirm(this.id);">excluir</a></td>
        
       <td><? echo $nome ; ?></td>
         <td><? echo $apelido ; ?></td>
        <td><? echo $email ; ?></td>
         <td><? echo $instrumento ; ?></td>
         <td><? echo $telefone ; ?></td>
           <td><? echo $foto ; ?></td>
       
     </tr>
      
<?php
  }/* end while */

  echo '</table>';

   }else  if($categoria == 2)
   {
   
  $sql_view = mysql_query(" SELECT * FROM cadastro WHERE apelido LIKE '".$pesquisa."%' ORDER BY nome ASC; ");
   
     echo '<table width="1069" border="1" cellspacing="0"> ';

  while($linha = mysql_fetch_array( $sql_view )){
  $id = $linha['id_musicos'];
  $nome = $linha['nome'];
  $apelido = $linha['apelido'];
  $email = $linha['email']; 
  $bairro = $linha['bairro']; 
  $cidade = $linha['cidade']; 
  $instrumento = $linha['instrumento'];
  $telefone = $linha['telefone1'];
  $foto = $linha['foto'];
  
  $datainicial = date( "d-m-Y" , $data );
 
 ?>
   
     <tr class="celula" height="35">
	   <td><a href="cadastroxx.php?funcao=editar&clienteID=<? echo $id ?>">editar</a></td>
         <td><a href=editar.php?funcao=excluir&clienteID=<? echo $id ?> " onclick="return doConfirm(this.id);">excluir</a></td>
        
       <td><? echo $nome ; ?></td>
         <td><? echo $apelido ; ?></td>
        <td><? echo $email ; ?></td>
         <td><? echo $instrumento ; ?></td>
         <td><? echo $telefone ; ?></td>
           <td><? echo $foto ; ?></td>
       
     </tr>
      
<?php
  }/* end while */

  echo '</table>';

   }else  if($categoria == 3)
   {
   
  $sql_view = mysql_query(" SELECT * FROM cadastro WHERE email LIKE '".$pesquisa."%' ORDER BY nome ASC; ");
   
     echo '<table width="1069" border="1" cellspacing="0"> ';

  while($linha = mysql_fetch_array( $sql_view )){
  $id = $linha['id_musicos'];
  $nome = $linha['nome'];
  $apelido = $linha['apelido'];
  $email = $linha['email']; 
  $bairro = $linha['bairro']; 
  $cidade = $linha['cidade']; 
  $instrumento = $linha['instrumento'];
  $telefone = $linha['telefone1'];
  $foto = $linha['foto'];
  
  $datainicial = date( "d-m-Y" , $data );
 
 ?>
   
     <tr class="celula" height="35">
	   <td><a href="cadastroxx.php?funcao=editar&clienteID=<? echo $id ?>">editar</a></td>
         <td><a href=editar.php?funcao=excluir&clienteID=<? echo $id ?> " onclick="return doConfirm(this.id);">excluir</a></td>
        
       <td><? echo $nome ; ?></td>
         <td><? echo $apelido ; ?></td>
        <td><? echo $email ; ?></td>
         <td><? echo $instrumento ; ?></td>
         <td><? echo $telefone ; ?></td>
           <td><? echo $foto ; ?></td>
       
     </tr>
      
<?php
  }/* end while */

  echo '</table>';

   }else  if($categoria == 4 )
   {
   
  $sql_view = mysql_query(" SELECT * FROM cadastro ORDER BY nome ASC; ");
   
     echo '<table width="1069" border="1" cellspacing="0"> ';

  while($linha = mysql_fetch_array( $sql_view )){
  $id = $linha['id_musicos'];
  $nome = $linha['nome'];
  $apelido = $linha['apelido'];
  $email = $linha['email']; 
  $bairro = $linha['bairro']; 
  $cidade = $linha['cidade']; 
  $instrumento = $linha['instrumento'];
  $telefone = $linha['telefone1'];
  $foto = $linha['foto'];
  
  $datainicial = date( "d-m-Y" , $data );
 
 ?>
   
     <tr class="celula" height="35">
	   <td><a href="cadastroxx.php?funcao=editar&clienteID=<? echo $id ?>">editar</a></td>
         <td><a href=editar.php?funcao=excluir&clienteID=<? echo $id ?> " onclick="return doConfirm(this.id);">excluir</a></td>
        
       <td><? echo $nome ; ?></td>
         <td><? echo $apelido ; ?></td>
        <td><? echo $email ; ?></td>
        <td><? echo $instrumento ; ?></td>
         <td><? echo $telefone ; ?></td>
           <td><? echo $foto ; ?></td>
       
     </tr>
      
<?php
  }/* end while */

  echo '</table>';

   }else  if($categoria == 5 )
   {
   
  $sql_view = mysql_query(" SELECT * FROM cadastro WHERE activo = 0 ORDER BY nome ASC; ");
   
     echo '<table width="1069" border="1" cellspacing="0"> ';

  while($linha = mysql_fetch_array( $sql_view )){
  $id = $linha['id_musicos'];
  $nome = $linha['nome'];
  $apelido = $linha['apelido'];
  $email = $linha['email']; 
  $bairro = $linha['bairro']; 
  $cidade = $linha['cidade']; 
  $instrumento = $linha['instrumento'];
  $telefone = $linha['telefone1'];
  $foto = $linha['foto'];
  
  $datainicial = date( "d-m-Y" , $data );
 
 ?>
   
     <tr class="celula" height="35">
	   <td><a href="cadastroxx.php?funcao=editar&clienteID=<? echo $id ?>">editar</a></td>
         <td><a href=editar.php?funcao=excluir&clienteID=<? echo $id ?> " onclick="return doConfirm(this.id);">excluir</a></td>
        
       <td><? echo $nome ; ?></td>
         <td><? echo $apelido ; ?></td>
        <td><? echo $email ; ?></td>
        <td><? echo $instrumento ; ?></td>
         <td><? echo $telefone ; ?></td>
           <td><? echo $foto ; ?></td>
       
     </tr>
      
<?php
  }/* end while */

  echo '</table>';

   }else  
   {
   
     echo ' Nada encontrado!';
   
   }
   
   }

?>



</div>

</div>

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>