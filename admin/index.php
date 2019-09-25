<?php
ob_start();
session_start();
require_once('../_app/Config.inc.php');


use app\Models\Login;



?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/adm.css">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
      
        <script src="<?= HOME; ?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        
        <script type="text/javascript">
		   $(document).ready( function(){
									   
									   
				 $('.submenu').hide();					   
				 $('.drop-menu').hover(function(){
												
						$(this).find('.submenu').slideToggle('80');				
												
												
				});				   
									   
									   
			});
		</script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <div class="login fluid">
            
                             
                     <div  class="box-login ">
           
                <h1>Administrar Site</h1>

                <p class="box-form ">

                <?php
                $login = new Login(3);

                if ($login->CheckLogin()):
                    header('Location: painel.php');
                endif;

                $dataLogin = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                if (!empty($dataLogin['AdminLogin'])):

                    $login->ExeLogin($dataLogin);
                    if (!$login->getResult()):
                        ErroJMX($login->getError()[0], $login->getError()[1]);
                    else:

                        
                        header('Location: painel.php');
                    endif;

                endif;



                $get = filter_input(INPUT_GET, 'exe', FILTER_DEFAULT);


                if (!empty($get)):

                    if ($get == 'restrito'):
                        ErroJMX('<h2> Acesso negado. Faça o login para acessar o painel!</h2>', JMX_ALERT);
                    elseif ($get == 'logoff'):
                        ErroJMX('<h3>Você saiu do sistema:</h3> ', JMX_ACCEPT);
                    endif;
                endif;
                ?>
                
                <form  name="AdminLoginForm" action="" method="post">


                        <input type="text" name="user" placeholder="Digite seu email">

                        <input type="password" name="pass"  placeholder="Digite sua senha">
       
                        <input type="submit" name="AdminLogin" value="Entrar">
            </form>



       </p>
                 </div><!--box-login -->
                        

   
            
        </div><!--container -->
            
            
          
        
        
        
        
        
        
        
        
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

   

        <script src="<?= HOME; ?>/js/main.js"></script>
    </body>
</html>
<?php
ob_end_flush();
 //NzY1MQ==
