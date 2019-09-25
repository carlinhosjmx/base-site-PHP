<?php
   
   session_start(); 
   
   $conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "3o+W6-Mw64");
   $database = mysql_select_db("jmxrio_musicos");
?>



<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Partituras musicais</title>


<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />

 <script>
  $(function() {
    $( "#accordion" ).accordion({
      event: "click hoverintent"
    });
  });
 
  /*
   * hoverIntent | Copyright 2011 Brian Cherne
   * http://cherne.net/brian/resources/jquery.hoverIntent.html
   * modified by the jQuery UI team
   */
  $.event.special.hoverintent = {
    setup: function() {
      $( this ).bind( "mouseover", jQuery.event.special.hoverintent.handler );
    },
    teardown: function() {
      $( this ).unbind( "mouseover", jQuery.event.special.hoverintent.handler );
    },
    handler: function( event ) {
      var currentX, currentY, timeout,
        args = arguments,
        target = $( event.target ),
        previousX = event.pageX,
        previousY = event.pageY;
 
      function track( event ) {
        currentX = event.pageX;
        currentY = event.pageY;
      };
 
      function clear() {
        target
          .unbind( "mousemove", track )
          .unbind( "mouseout", clear );
        clearTimeout( timeout );
      }
 
      function handler() {
        var prop,
          orig = event;
 
        if ( ( Math.abs( previousX - currentX ) +
            Math.abs( previousY - currentY ) ) < 7 ) {
          clear();
 
          event = $.Event( "hoverintent" );
          for ( prop in orig ) {
            if ( !( prop in event ) ) {
              event[ prop ] = orig[ prop ];
            }
          }
          // Prevent accessing the original event since the new event
          // is fired asynchronously and the old event is no longer
          // usable (#6028)
          delete event.originalEvent;
 
          target.trigger( event );
        } else {
          previousX = currentX;
          previousY = currentY;
          timeout = setTimeout( handler, 100 );
        }
      }
 
      timeout = setTimeout( handler, 100 );
      target.bind({
        mousemove: track,
        mouseout: clear
      });
    }
  };
  </script>


</head>

<body>

 <?php
 
         if(isset($_POST['acao']) && $_POST['acao'] == 'salvarPart')
		 {
			 
			$part_musica = $_POST['part_musica'];
			$part_interprete = $_POST['part_interprete'];
			$part_instrumento = $_POST['part_instrumento'];
			
			if(empty($part_musica)&& empty($part_interprete)&& empty($part_instrumento))
			{
				$part_alerta = '<div id="part_alerta">Você não preencheu os campos! </div>';
			}else{
				
				$sql = mysql_query("INSERT into partituras ( titulo, artista , instrumento ) VALUES ( '$part_musica', '$part_interprete', '$part_instrumento' ) ") or die(mysql_error());
				
				echo '<script> alert("cadastrado com sucesso!");</script>';
			 
			}
		}
          
  ?>       

<div id="container">
<div id="header">
<div id="logo"><img src="images/logo.png" /></div>

<div id="busca">

<form id="form1" name="form1" method="post" action="resultado.php">
  <label for="pesquisar"></label>
  Buscar 
  <input type="text" name="pesquisar" id="pesquisar" size="45" />
  <label for="button"></label>
  <input type="submit" name="button" id="button" value="Pesquisar" />
</form></div>


</div>

<div id="content2">
<div id="box_part">
<div id="list_part"><b>Partituras por Artista:</b>&nbsp;&nbsp;<span><a href="part_a.html">A</a></span><span><a href="part_b.html">B</a></span><span><a href="part_c.html">C</a></span><span><a href="">D</a></span><span><a href="">E</a></span><span><a href="">F</a></span><span><a href="">G</a></span><span><a href="">H</a></span><span><a href="">I</a></span><span><a href="">J</a></span><span><a href="">L</a></span><span><a href="">M</a></span><span><a href="">N</a></span><span><a href="">O</a></span><span><a href="">P</a></span><span><a href="">Q</a></span><span><a href="">R</a></span><span><a href="">S</a></span><span><a href="">T</a></span><span><a href="">U</a></span><span><a href="">V</a></span><span><a href="">X</a></span><span><a href="">Z</a></span>
</div><!--list_part-->

<div id="list_part2"><b>Partituras por Música:</b>&nbsp;&nbsp;<span><a href="part_a.html">A</a></span><span><a href="part_b.html">B</a></span><span><a href="part_c.html">C</a></span><span><a href="">D</a></span><span><a href="">E</a></span><span><a href="">F</a></span><span><a href="">G</a></span><span><a href="">H</a></span><span><a href="">I</a></span><span><a href="">J</a></span><span><a href="">L</a></span><span><a href="">M</a></span><span><a href="">N</a></span><span><a href="">O</a></span><span><a href="">P</a></span><span><a href="">Q</a></span><span><a href="">R</a></span><span><a href="">S</a></span><span><a href="">T</a></span><span><a href="">U</a></span><span><a href="">V</a></span><span><a href="">X</a></span><span><a href="">Z</a></span>
</div>
</div>

<div id="box_user">

 <div id="foto_grande"></div>
        
          
  <div id="form_login">
        
     <?php
      


       if( isset($_SESSION[ 'loginUser' ]) && isset($_SESSION[ 'senhaUser' ]) ){
	
	
           echo  '<h3> Bem vindo&nbsp;'.$get_nome.',</h3><br /><span> essa é a sua área.</span> ';
         

       }else{


          echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
          alert ("Sessão não foi realizada") ;
          
          </SCRIPT>';

        }
      ?>  
      
     
         
       </div>
       <div id="boxAccordion">
       <div id="accordion">
  <h3><strong>Sobre mim</strong></h3>
  <div>
    <p>
       <strong>Nome: </strong><?php echo $get_nome; ?> <br />
       <strong>Email:</strong> <?php echo $get_email; ?> <br />
       <strong>Bairro:</strong> <?php echo $get_bairro; ?> <br />
       <strong>Cidade:</strong> <?php echo $get_cidade; ?> <br />
       <strong>Instrumento: </strong><?php echo $get_instrumento; ?> <br />
    
    </p>
  </div>
  <h3><strong>Enviar Partitura</strong></h3>
  <div>
  <div id="upload">
   
    <?php echo $part_alerta; ?>
    
    <form action="" method="post" enctype="multipart/form-data" >
 <label for="pesquisar">Nome da Música:</label>
   
  <input type="text" name="part_musica" id="pesquisar" size="38" />
   <label for="pesquisar">Intérprete:</label>

  <input type="text" name="part_interprete" id="pesquisar" size="38" />
   <label for="pesquisar">Instrumento:</label>

  <input type="text" name="part_instrumento" id="pesquisar" size="38" />

<label><span>Enviar Partitura</span><input type="file" name="img[]" /></label>

<div id="img-extra"></div>
<input type="submit" class="btn" value="Enviar" />
<input type="hidden" name="acao" value="salvarPart" />



</form>
</div>
  </div>
  
</div>
</div>
       




       <!--form_login-->
       
      <!-- <div id="envia_arquivo">
        <form action="envia_arquivo.php" method="post" enctype="multipart/form-data">
       <table>
       <tr>
          <td>Enviar partitura: <input type="file" name="arquivo" /><br />(Arquivo com no máximo 25mb)</td>
        </tr>
        <tr>               
            <td><input name="submit" type="submit" value=" Enviar " /> </td>
            <td><input name="reset" type="reset" value=" Limpar " /></td>
       </tr>
       </table>
       </form>
       </div> -->
   </div><!--box_user-->



<div id="box_search">

<?php

   $pesquisa = $_POST['pesquisar'];
   $categoria = $_POST['seletor'];
   
     $letra = substr($pesquisa,0,1);
	 
	 $novaletra = strtolower($letra);
			
	 $dir = 'part/'.$novaletra."/";
   
   if($categoria == 1)
   {
	  $sqlconsulta = mysql_query("SELECT * FROM partituras WHERE titulo LIKE '%".$pesquisa."%'  ORDER BY titulo")or die(mysql_error());
	  
		  
	  while($linha = mysql_fetch_array($sqlconsulta)){
	  
	  $titulo = $linha['titulo'];
	  $partitura = $linha['partitura'];
	  $url = $dir.$partitura;

	     echo "<a href=".$url." target='_blank'>".$titulo."</a>";
	  
	  
	  }
	
	}else if($categoria == 2){
		
		 $sqlconsulta = mysql_query("SELECT * FROM partituras WHERE artista = $pesquisa%")or die(mysql_error());
		
	}else if($categoria == 3){
   
      $sqlconsulta = mysql_query("SELECT * FROM partituras WHERE instrumento = $pesquisa")or die(mysql_error());
    }else{
		
		$alerta1 = " Não foi encontrado nenhum resultado com este termo! ";
  
	}
?>


 </div>
 </div><!--content_usua-->
</div>





















</body>
</html>