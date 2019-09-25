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
	
</head>

<body>

        
    <div id="header">
       <div id="header_inter">
		 <div id="logo"><img src="images/logo.png" /></div>
         <div id="retorna"><a href="user.php">Voltar ao início</a></div>
	   </div>
    
    </div>
  

   <div id="content1">
       
		
      <div id="box_center3">  
      
            
            
            <div id="bannercontato">
        	<h1> Contato</h1>
           <div id="formContato">
            <form id="form1" name="form1" method="post" action="enviar.php">
              <table width="461" border="0">
                <tr>
                  <td width="82">Nome:</td>
                  <td width="15">&nbsp;</td>
                  <td width="589"><input type="text" name="nome_ct" /></td>
                </tr>
                <tr>
                  <td height="24">Telefone:</td>
                  <td>&nbsp;</td>
                  <td><label>
                    <input type="text" name="fone_ct"   />
                  </label></td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="email_ct"   /></td>
                </tr>
                <tr>
                  <td>Cidade:</td>
                  <td>&nbsp;</td>
                  <td><input type="text" name="cidade_ct"  /></td>
                </tr>
                <tr>
                  <td>Observações:</td>
                  <td>&nbsp;</td>
                  <td rowspan="4"><label>
                    <textarea name="obs" id="" cols="47" rows="5"></textarea>
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
         </div><!--bannerContato-->
         
         <div id="text_contato">Entre em contato conosco nos enviando uma mensagem no formulário o lado,<br /> ou ligue : <br /><br />(21) 7897-1084   <br /><br />  <br /><br />
         
         </div>
         
           
     
       
        
	
       
         
	</div>
    </div>
   
 <?php
   
   include "footer.php";

?>




</body>
</html>