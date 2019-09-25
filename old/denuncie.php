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
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:0
					},200);
				}
			});
		});
	</script>
</head>

<body>

        
    <div id="header">
       <div id="header_inter">
		 <div id="logo"><img src="images/logo.png" /></div>
         <div id="retorna"><a href="user.php">Voltar ao início</a></div>
	   </div>
    
    </div>
  
 
   <div id="content1">
       
		
      <div id="box_center2">  
      
            <div id="aviso">
            
            <h1>Denuncie </h1>
            
        <p>   Se você verificar algum conteúdo ilícito dentro do portal partituras Musicais nos
        informe por gentileza. </p>


<p>Seja material proibido ou de conteúdo pornográfico, texto com conteúdo difamatório, ou mesmo problema de uso no site. </p>

       <div id="box_denuncia">

       <div id="formContato">
            <form  method="post" action="enviarDenuncia.php">
              <table width="461" border="0">
                <tr>
                  <td width="82">Nome:</td>
                  <td width="15">&nbsp;</td>
                  <td width="589"><input type="text" name="nome_D" /></td>
                </tr>
               
                <tr>
                  <td>Email:</td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="email_D"   /></td>
                </tr>
               
                <tr>
                  <td>Denúncia:</td>
                  <td>&nbsp;</td>
                  <td rowspan="4"><label>
                    <textarea name="mensagem_D" id="" cols="47" rows="10"></textarea>
                  </label></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><label>
                    <input type="submit" class="button" name="enviar" id="enviar" value="Enviar" />
                  </label></td>
                </tr>
              </table>
            </form>
            </div><!--formContato-->
           </div>

         
           
     
       
        
	
       </div>
         
	</div>
    </div>
  
<?php
   
   include "footer.php";

?>



</body>
</html>