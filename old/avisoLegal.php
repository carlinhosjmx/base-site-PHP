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
  
  <div id="content_user"> 
   <div id="content1">
       
		
      <div id="box_center2">  
      
            <div id="aviso">
            
            <h1>Aviso Legal</h1>
            
        <p>   Para utilizar todos os serviços deste site você precisa concordar com as regras abaixo, a violação 
poderá resultar na exclusão do nosso sistema sem aviso prévio.</p>


<p><strong>1 - </strong>As partituras enviadas ao site é de única e exclusiva responsabilidade civil e penal do
usuário cadastrado cuja senha tenha sido usada para sua criação.</p>

<p><strong>2 -</strong> O usuário não deve publicar material protegido por direitos autorais, e nem publicar fotos
ou textos sem autorização do seu autor ou representante.</p>

<p><strong>3- </strong>O portal partiturasMusicais.com não se responsabilizam pelo conteúdo publicado. O 
conteúdo publicado e enviado pelo usuário não são revisados pelo portal.</p>

<p><strong>4 -</strong> O portal partiturasMusicais.com se reserva o direito de excluir a qualquer momento 
conteúdo que contrariem as regras aqui estabelecidas. </p>

<p><strong>5 - </strong>Os usuários que publicam conteúdo neste site tem o conhecimento e concorda em compartilhar
todos os arquivos  enviados por eles e publicados no site, permitindo que outros usuários façam 
utilização dos mesmos arquivos.</p>

<p><strong>6 - </strong>Este aviso pode ser alterado a qualquer momento sem aviso prévio, é necessário o acesso a esta página 
periodicamente.</p>
         
           
     
       
        
	
       </div>
         
	</div>
    </div>
    </div>
<?php
   
   include "footer.php";

?>





</body>
</html>