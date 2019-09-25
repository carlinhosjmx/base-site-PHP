<?php
ob_start();
session_start();
require('../_app/Config.inc.php');
require_once ("../vendor/autoload.php");

use app\Models\Login;

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
        <link href="css/sweetalert.css" rel="stylesheet" type="text/css" />

       
      
       <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
       <script src="tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="js/sweetalert.min.js" ></script>
       <script src="js/menu.js"></script>
        <script src="js/sincron.js"></script>
       <script src="js/pt_BR.js"></script>
    

         <script type="text/javascript">

           tinymce.init({ 

        
         
          

            selector:'textarea',
            force_br_newlines : false,
            force_p_newlines : false,
            forced_root_block : '',
            menubar: true,
            relative_urls: false,
            remove_script_host: false,
            fontsize_formats: "10px 12px 14px 16px 18px 24px 28px 30px 36px",
            table_default_styles: {width: '100%'}, 

              plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save image jbimages table contextmenu directionality',
    ' template paste textcolor colorpicker textpattern imagetools codesample toc'
  ],
  toolbar: 'undo redo | insert | styleselect | fontsizeselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image | link jbimages',
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


    var doConfirm = function(id)
    {
        var link = document.getElementById(id);
        if(confirm("Você deseja realmente excluir?"))
            return true;
        else
            return false;
    };





                             $("#deletar").click(function(){
                               
                                swal({
                                          title: "Tem certeza que deseja excluir?",
                                 text: "",

                                 html: true,
                                 showConfirmButton: false,
                                 showCancelButton: true,
                                 cancelButtonText: "Fechar"
                           
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
                                                       <li><a href="painel.php?exe=posts/lista">Editar postagem</a></li>
                                                       <li><a href="postagens.php">Lista de postagens</a></li>
                                 
                                              </ul>
                                      </li>

                                     <li> Sistema
                                            
                                              <ul class="sub-menu">
                                                      
                                                       <li><a href="painel.php?exe=posts/create">Incluir Cliente</a></li>
                                                       <li><a href="painel.php?exe=posts/lista">Pesquisar processos</a></li>
                                                       <li><a href="postagens.php">Lista de processos</a></li>
                                 
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
                                                     <li><a href="painel.php?exe=posts/lista">Editar postagem</a></li>
                                                     <li><a href="postagens.php">Lista de postagens</a></li>
                                               </ul>
                                </li>
                                 <li class="submenu"><a href="#">  Sistema</a>
                                            
                                              <ul class="children">
                                                      
                                                       <li><a href="painel.php?exe=sistema/create">Incluir Cliente</a></li>
                                                       <li><a href="painel.php?exe=posts/lista">Pesquisar processos</a></li>
                                                       <li><a href="lista.php">Lista de processos</a></li>
                                 
                                              </ul>
                                      </li>

                               <li class="submenu"><a href="#"> Categorias</a>
                                        <ul class="children">
                                           <li><a href="painel.php?exe=categories/create">Criar Categoria</a></li>
                                                   <li><a href="painel.php?exe=categories/index">Editar Categoria</a></li>
                                                   <li><a href="painel.php?exe=categories/createSub">Criar SubCategorias</a></li>
                                                   <li><a href="painel.php?exe=categories/indexSub">Editar SubCategoria</a></li>
                                        </ul>
                                </li> 

                                

                            <li><a href="<?= HOME ?>" target="_blank">Visualizar o Site</a></li>
                            <!--<li><a href="painel.php?exe=cadastra">Cadastrar Usuário</a></li>-->
                        </ul>
                </nav>

  </div><!--menu-bar-->
               
       
             
            </div>
            </div>
            </div><!-- container-fluid-->
       


       
                
                 <?php
            //QUERY STRING
			
			
            if (!empty($getexe)):
                $includepatch = __DIR__ . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR . strip_tags(trim($getexe) . '.php');
            else:
                $includepatch = __DIR__ . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR . 'home.php';
            endif;

            if (file_exists($includepatch)):
                require_once($includepatch);
            else:
                echo "<div class=\"content notfound\">";
                ErroJMX("<b>Erro ao incluir tela:</b> Erro ao incluir o controller /{$getexe}.php!", JMX_ERROR);
                echo "</div>";
            endif;
            ?>
                
          
            
  

        
        
        
        
        
        
        
        
        
        
    
   
        
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