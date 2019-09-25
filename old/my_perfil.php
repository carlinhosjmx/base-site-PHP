<?php  
  
  include_once "sessao.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" />

<!--[if IE 6]>
   <script type="text/javascript">
           /*Load jQuery if not already loaded*/ if(typeof jQuery == 'undefined'){ document.write("<script type=\"text/javascript\"   src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\"></"+"script>"); var __noconflict = true; }
           var IE6UPDATE_OPTIONS = {
                   icons_path: "http://static.ie6update.com/hosted/ie6update/images/"
           }
   </script>
   <script type="text/javascript" src="ie6update.js"></script>
   <![endif]-->       
   

<script type="text/javascript" src="jquery-1.js"></script>
<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="jquery.js"></script>


	<link rel="stylesheet" href="css/global.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="js/slides.min.jquery.js"></script>
	
    <style>
	
	fieldset{ width: 650px;}
	label{ width: 300px; height: 40px; display:block; float: left;}
	.bt{ width: 600px; text-align: left;}
	label span{ width: 150px;}
	input{ width: 200px;margin-left: 80px;}
	
	
	
	</style>
    
    
    
    
</head>

<body>


 <?php 
		  
		  if( isset($_SESSION[ 'loginUser' ]) && isset($_SESSION[ 'senhaUser' ]) ){
	
	            $user = $_SESSION[ 'loginUser' ];
		   
		        $sqlconsulta = mysql_query("SELECT * FROM cadastro WHERE email = '$user'")or die(mysql_error());
	  
	           if( mysql_num_rows($sqlconsulta) >= 1 ){
	
	               while($linha = mysql_fetch_array($sqlconsulta)){
		  
		  	  
		              $id = $linha['id_musicos'];
		              $nome = $linha['nome'];
		              $apelido = $linha['apelido'];
		              $instrumento= $linha['instrumento'];
					  $ddd2 = $linha['ddd2'];
					  $telefone = $linha['telefone2'];
					  $ddd3 = $linha['ddd3'];
					  $telefone2 = $linha['telefone3'];
					  $radio = $linha['radio'];
		              $bairro = $linha['bairro'];
		              $cidade= $linha['cidade'];
		              
				   }
			   }
		 
	            
?>
        
    <div id="header">
       <div id="header_inter">
		 <div id="logo"><img src="images/logo.png" /></div>
         <div id="retorna"><a href="user.php">Voltar ao início</a></div>
	   </div>
    
    </div>
  
  <div id="content_user"> 
  <div id="content1">
       
		
      <div id="box_center7">  
      
            <div id="aviso">
            
            <h1>Editar Perfil </h1>
            
       

   

       <div id="formContatoP">
           
            <form  method="post" action="functionUser.php?funcao=editar&id=<? echo $id ?>">
            <fieldset class="dados">
            <legend class="dados">Edite seus dados</legend>  
            
            <label> Nome:<input type="text" name="nome" value="<? echo $nome; ?>"   /></label>
            <label> Nome Artístico:<input type="text" name="apelido" value="<? echo $apelido; ?>"   /></label>
            <label> Instrumento: <input type="text" name="instrumento" value="<? echo $instrumento; ?>"   /></label>
            <label>Bairro: <input type="text" name="bairro" value="<? echo $bairro; ?>"   /></label>
            <label class="bt" ><span> Cidade: </span><input type="text" name="cidade" value="<? echo $cidade; ?>"   /></label>
            
             </fieldset>    
            <fieldset class="fone_field">
              
              <legend class="fone_legend">Digite seu contato que estará visivel para todos.</legend>
              
              <div id="box_line_perfil"><div id="ddd_perfil">DDD<input type="text" name="ddd2" class="ddd"  maxlength="3" value="<? echo $ddd2; ?>"   /></div><div id="campo_tel"><span> telefone 1: </span><input type="text" name="tel" class="fone" value="<? echo $telefone; ?>"   /></div></div>
              
               <div id="box_line_perfil"><div id="ddd_perfil">DDD<input type="text" name="ddd3" class="ddd"  maxlength="3" value="<? echo $ddd3; ?>"   /></div><div id="campo_tel"><span> telefone 2: </span><input type="text" name="tel2" class="fone" value="<? echo $telefone2; ?>"   /></div></div>
             <div id="box_line_perfil">ID rádio : <input type="text" name="radio" class="radio" value="<? echo $radio; ?>" /></div>
              </fieldset>         
             <label ><input type="submit" class="button" name="enviar" id="enviar" value="Alterar" /></label>
             
            </form>
            </div><!--formContato-->
          

         
   <?php
   
    }
   
   ?>
     
       
        
	
       </div>
         
	</div>
    </div>
    </div>
<?php
   
   include "footer.php";

?>



</body>
</html>