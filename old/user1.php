<html>
<head>
<title>Partituras musicais</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="style.css" />






</head>
<body >
<div id="container">
<div id="header">

  <div id="logo"><img src="images/logo.png" /></div>

  </div>
  
<div id="content2">
<div id="box_part">
<div id="list_part">Partituras por Artista:&nbsp;&nbsp;<span><a href="part_a.html">A</a></span><span><a href="part_b.html">B</a></span><span><a href="part_c.html">C</a></span><span><a href="">D</a></span><span><a href="">E</a></span><span><a href="">F</a></span><span><a href="">G</a></span><span><a href="">H</a></span><span><a href="">I</a></span><span><a href="">J</a></span><span><a href="">L</a></span><span><a href="">M</a></span><span><a href="">N</a></span><span><a href="">O</a></span><span><a href="">P</a></span><span><a href="">Q</a></span><span><a href="">R</a></span><span><a href="">S</a></span><span><a href="">T</a></span><span><a href="">U</a></span><span><a href="">V</a></span><span><a href="">X</a></span><span><a href="">Z</a></span></div>
</div>


<div id="box_user">
        
          
  <div id="form_login">
        
     <?php
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
     


       echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
         alert ("Você deve preencher os campos!") ;
          location.href = "index.php" ; 
          </SCRIPT>';


 
 
        }

       if ( $contagem == 1 ) {
	
	
           echo  '<h3> Bem vindo,'.$get_nome ;' </h3>';
         

       }else{


          echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
          alert ("Senha ou email inválidos, tente novamente!") ;
          location.href = "index.php" ; 
          </SCRIPT>';

        }
      ?>      
         
         
       </div><!--form_login-->
   </div><!--box_logar-->



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
  $foto = $linha['foto'];
 
  $imagem = $dir.$image; 
 
   $dir = "images/";
   
   $fotografia = $dir.$foto;

    
 
	  
	  if( $image == "")
        {
 
           echo " <div id='celula'><div id='foto'><img src='{$fotografia}' width='110' height='110' /></div><div id='dados'><div id='line1'><div id='nome'>".$nome."</div><div id='line2'><div id='instrumento'><span>Instrumento:&nbsp;</span>".$instrumento."</div><div id='separador2'></div><div id='email'><span>e-mail:&nbsp;</span> ".$email."</div></div><div id='line3'><div id='bairro'><span>Bairro:&nbsp;</span>".$bairro."</div><div id='separador'>-</div><div id='cidade'><span>Cidade:&nbsp;</span> ".$cidade." </div></div></div></div>" ;
   
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