<?php
ob_start();
session_start();
require('../_app/Config.inc.php');
require('../vendor/autoload.php');

use app\Models\Login;
use app\Conn\Read;

$login = new Login(3);
$logoff = filter_input(INPUT_GET, 'logoff', FILTER_VALIDATE_BOOLEAN);
$getexe = filter_input(INPUT_GET, 'exe', FILTER_DEFAULT);

if (!$login->CheckLogin()):
    unset($_SESSION['userlogin']);
    header('Location: index.php?exe=restrito');
else:
    $userlogin = $_SESSION['userlogin'];
endif;

if ($logoff):
    unset($_SESSION['userlogin']);
    header('Location: index.php?exe=logoff');
endif;
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Administrar site</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/adm.css">
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300' rel='stylesheet' type='text/css'>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      
       <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
       <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
       <script src="js/menu.js"></script>
       <script src="js/pt_BR.js"></script>
    

         <script type="text/javascript">

           tinymce.init({ 


          

            selector:'textarea',
            menubar: true,
            relative_urls: false,
            remove_script_host: false,

              plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    ' template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'preview media | forecolor backcolor | codesample',

  image_advtab: true


          });

           function fetch_select(val)
          
            {
               $.ajax({
                 type: 'post',
                 url: 'system/posts/fetch_data.php',
                 data: {
                   get_option:val
                 },
                 success: function (response) {

                   document.getElementById("new_select").innerHTML=response; 
                 }
               });
            }

           
           $(document).ready( function(){


           	    $('.sub-menu-user').hide();                     
                 $('.click-menu-user').click(function(){
                                                
                        $(this).find('.sub-menu-user').slideToggle('80');             
                                                
                                                
                });                
                                       
                                       
                                       
                 $('.sub-menu').hide();                     
                 $('.click-menu').click(function(){
                                                
                        $(this).find('.sub-menu').slideToggle('80');             
                                                
                                                
                });                
                                       
                                       
            });


        </script>


        
      
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
           <?php
                    //ATIVA MENU
                    if (isset($getexe)):
                        $linkto = explode('/', $getexe);
                    else:
                        $linkto = array();
                    endif;
            ?>


        <div class="container-fluid">
        <div class="container">
              
              <div class="header-painel ">


               <h1 class="logo">Administrar Site</h1>
      
            
                     
                      <h2 >Olá <?= $userlogin['user_name']; ?> <?= $userlogin['user_lastname']; ?></h2>

    

           <nav class="menu-user">

           
                   <ul>
	                <li class="click-menu-user"><span>Perfil</span><i class="fa fa-bars fa-lg ico-menu"></i>
	                    <ul  class="sub-menu-user">
	                        <!--    <li><a class="profile" href="painel.php?exe=users/profile">Perfíl</a></li>
	                            <li><a class=" profile" href="painel.php?exe=users/users">Usuários</a></li> -->
	                            <li><a class="profile" href="painel.php?logoff=true">Sair</a></li>
	                    </ul>
	                </li>
                   </ul>
                     
              </nav>
               
            
        
        <nav  class="menu-ad ">
   
           
           <ul>
              <li class="click-menu"><span>Menu</span><i class="fa fa-bars fa-lg ico-menu"></i>
                     <ul class="sub-menu">
                   
                                    <li ><a href="painel.php?exe=home">Inicio</a></li>
                   
                                     <li> Postar Conteúdo
                                            
                                              <ul class="sub-menu">
                                                      
                                                       <li><a href="painel.php?exe=posts/create">Postar novo</a></li>
                                                       <li><a href="painel.php?exe=posts/index">Editar postagem</a></li>
                                                       <li><a href="postagens.php">Lista de postagens</a></li>
                                 
                                              </ul>
                                      </li>

                                   <li class="li<?php if (in_array('categories', $linkto)) echo ' active'; ?>"><a class="opensub" onclick="return false;" href="#">Categorias</a>
                                              
                                              <ul class="sub">
                                                  <li><a href="painel.php?exe=categories/create">Criar Categoria</a></li>
                                                   <li><a href="painel.php?exe=categories/index">Editar Categoria</a></li>
                                                   <li><a href="painel.php?exe=categories/createSub">Criar SubCategoria</a></li>
                                                   <li><a href="painel.php?exe=categories/indexSub">Editar SubCategoria</a></li>
                                                 
                                              </ul>
                                   </li> 
             
                                 
                                     
                                       <li class="click-menu">
                                            Ver o site
                                            <ul class="sub-menu">
                                           
                                                  <li><a href="<?= HOME ?>" target="_blank">Visualizar o Site</a></li>
                                        
                                     
                                            </ul>
                                       </li>

                              </ul>
               </li>
          </ul>
   </nav>
        

   <div class="menu-bar"> <!--menu long -->
    
                <nav  class="adm-menu">
                        <ul>
                                <li><a href="painel.php?exe=home">Inicio</a></li>
                              
                                 <li class="submenu"><a href="#">  Postar Conteúdo</a>
                                              <ul class="children">
                                                     <li><a href="painel.php?exe=posts/create">Postar novo</a></li>
                                                     <li><a href="painel.php?exe=posts/index">Editar postagem</a></li>
                                                     <li><a href="postagens.php">Lista de postagens</a></li>
                                               </ul>
                                </li>

                               <li class="submenu"><a href="#"> Categorias</a>
                                        <ul class="children">
                                           <li><a href="painel.php?exe=categories/create">Criar Categoria</a></li>
                                                   <li><a href="painel.php?exe=categories/index">Editar Categoria</a></li>
                                                   <li><a href="painel.php?exe=categories/createSub">Criar SubCategoria</a></li>
                                                   <li><a href="painel.php?exe=categories/indexSub">Editar SubCategoria</a></li>
                                        </ul>
                                </li> 

                                

                            <li><a href="<?= HOME ?>" target="_blank">Visualizar o Site</a></li>
                        </ul>
                </nav>

  </div><!--menu-bar-->
               
       
             
            </div>
            </div>
            </div><!-- container-fluid-->

           <div class="container post-all">

                <h1>Lista completa de postagens</h1>
       


       
                
                 <?php
            
                    $Post = new Read;
                    $Post->readDb("jm_posts", "INNER JOIN jm_sub_category ON post_category = id_sub_category ORDER BY post_id ASC");





                    if($Post->getResult()):

                      foreach($Post->getResult() as $posts):

                         echo "<h2><li>subcategoria ". $posts['sub_category_tags'] ."</h2><ul class='line-all'><li><span>id do post - </span> " . $posts['post_id'] ."</li><li><span>Nome do post -</span> " . $posts['post_name'] ."</li><li><span>Título do post - </span>" . $posts['post_title'] ."</li><li><span>Conteúdo do post - </span>" . $posts['post_content'] ."</li><li><span>Imagem do post - </span>" . $posts['post_cover'] ."</li><li><span>id da subcategoria do post - </span>" . $posts['post_category'] ."</li><li><span>Ordem do post - </span>" . $posts['post_order'] ."</li></ul>";



                      endforeach;




                    endif;

                 
			
			
            ?>
                
          
            
  
      </div>
        
        
        
        
        
        
        
        
        
        
    
   
        
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

       
        <script src="../js/main.js"></script>
        
       <script src="../_cdn/jmask.js"></script>
       <script src="../_cdn/combo.js"></script>
       <script src="__jsc/tiny_mce/tiny_mce.js"></script>
       <script src="__jsc/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script>
      <script src="__jsc/admin.js"></script>


    </body>
</html>
<?php
ob_end_flush();
 //NzY1MQ==