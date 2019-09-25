<?php
session_start();
require_once ("Config.inc.php");

use app\Models\Login;
use app\Helpers\Session;
use app\Helpers\ContarAcesso;
use app\Models\Link;
use app\Conn\Read;
use app\Conn\Update;
use app\Conn\Insert;


?>
<!DOCTYPE html>
<html lang= "pt-BR" >
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
 
<title>Partituras Musicais </title>
 
<meta name="description" content=""/>
<meta name="keywords" content=" " />
<meta name="robots" content="index, follow" />
<link rel="canonical" href=" http://www.meusite.com.br ">
 
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<link rel="stylesheet" type="text/css" href="css/base/style.css">

<script src="http://code.jquery.com/jquery-latest.min.js" ></script>
   
  

      <script type="text/javascript">
            
            function getWidth(){
                var wd = $(window).width();
                 $('body').attr('style', 'width' + wd + 'px;');
            }

            jQuery("document").ready(function($){

                    $('.bxslider').bxSlider({
                        auto: true,
                        speed: 1200,
                        autoDelay: 0,
                        mode: 'fade', 
                        responsive: true,
                        slideWidth: 1920
                    });

                    $('.submenu').click(function(ev) {

                        $('.submenu').each(function(){
                            var clazz = this.getAttribute("class");
                            clazz = clazz.replace("active", "");
                            this.setAttribute("class", clazz);
                        });

                        ev.target.setAttribute("class", "active " + ev.target.getAttribute("class"));
                    });/*end-tag */
                                  
                    var nav = $('.menu-bar');

                    $(window).scroll(function () {
                        if ($(this).scrollTop() > 10) {
                            nav.addClass("bar-fixed");
                        } else {
                            nav.removeClass("bar-fixed");
                        }
                    }); /* end-tag */
            }); /* end-JQuery */
     
      </script>
        
     
    </head>
    <body>
      
<?php
    
     $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

     if(!empty($dados['submitData'])):
         $login = $dados['email'];
         $senha = md5($dados['senha']);

         $access = new Read();
         $access->readDb("cadastro", "WHERE email = :email AND senha = :senha", "email={$login}&senha={$senha}");
        // $access->readDb("cadastro", "WHERE email = :email AND senha = :senha", "email={$login}&senha={senha}");
         
        if($access->getResult()){

            $_SESSION[ 'loginUser' ] = $login;
            $_SESSION[ 'senhaUser' ] = $senha;
         
            header('Location: http://localhost/EstruturaSite/part/');

         }else{
            echo " usuário ou senha inválidos!";
         }

     endif;


?>

<div class="container">

  
<div class="login">
    <h1>Olá, entre na sua área</h1>

      <form action='' method='post' enctype='multipart/form-data'>
       
      <div class="line-login">
      
        <input type='email' name='email' placeholder='email' required='required'>
      </div>
      <div class="line-login">
       
        <input type='password' name='senha' placeholder='senha' required='required'>
     </div> 
     <div class="line-login">
      <input type='submit' onclick='enviar();' name="submitData" value='entrar' />
      </div>
      </form>
       
           
</div>
 
</div> 
    



      

        
        
        
             
    
   
        
     


      
 
       

    </body>
</html>
<?php
ob_end_flush();
 //NzY1MQ==
