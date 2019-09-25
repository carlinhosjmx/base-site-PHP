<?php
   
   session_start(); 
   
  $conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "3o+W6-Mw64");
   $database = mysql_select_db("jmxrio_musicos");
   
   if( !isset($_SESSION[ 'loginAdmin' ]) && !isset($_SESSION[ 'senhaAdmin' ])){
															
			header("Location: index.php ");												
			exit;												
															
 }
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Cadastro de M�sicos</title>
</head>

<style type="text/css">

body{
	
text-align: center;	
	
}

table tr td{

border: 1px solid #ccc;
text-align:left;
font-family:Arial, Helvetica, sans-serif;
font-size:14px;	
	
}

#center{
position:relative;
width: 980px;
margin-top: 15px;
margin-left: auto;
margin-right: auto;
	
}

#header{

position:relative;
top: 10px;
left: 0px;
width: 980px;
height: 120px;



	
}

#logoCad{

position:absolute;
top: 10px;
left: 10px;
width: 300px;
height: 100px;

	
}

#rotulo{

position:absolute;
top: 40px;
left: 370px;
width: 320px;
height: 80px;
font-family:Arial, Helvetica, sans-serif;
font-size:20px;
font-weight:bold;
text-align:center;
	
}

#table2{
position:absolute;
top: 50px;
left: 40px;
width: 30px;

}


.titulo{ 

font-family:Arial, Helvetica, sans-serif;
font-size:12px;
font-weight:bold;
text-align:center;
background:#ACCBE7 url( bgC.jpg ) repeat-x;


}

.celula{ 

font-family:Arial, Helvetica, sans-serif;
font-size:11px;
text-align:center;
background: #F4F5F7;

}

#box_table{

width: 500px;
height: 750px;
overflow:auto;
margin-top: 0px;
margin-left: auto;
margin-right: auto;
border: 1px solid #ccc;
	
}

#form_altera{
position: relative;
width: 1024px;
height: 320px;
margin-top: 20px;
text-align:left;
	
}

#conter{
position:relative;
width: 300px;
height: 40px;
top: 0px;
left: 260px;
font-size: 20px;


}

#table_fix{

width: 1024px;
height: 186px;
margin-top: 0px;
margin-left: 0px;
text-align:left;
background: #F4F5F7;
	
	
}

#bt_submit{
position: relative;
top: 3px;
left: 450px;
width: 130px;
height: 30px;
	
	
}

table .tabela tbody tr:nth-child(odd){
   background-color: #E9E9E9;
}

#label_table{
position: relative;	
width: 1024px;
height: 20px;
line-height: 20px;
background: #69C;
color: #fff;
font-family:Tahoma, Geneva, sans-serif;
font-size:16px;
text-align:center;
padding: 8px 0px;
margin-left: 0px;
	
}

#linkadmin{ position:absolute; left: 770px; width: 300px; height: 25px; margin-bottom: 10px;}

#linkadmin a { text-decoration: none; color: #900;}

</style>

<body>
<div id="center">
<div id="header"><div id="logoCad"><img src="images/logo.png" width="300" height="100" /></div><div id="rotulo">Cadastro de Musicos</div></div>
 <div id="linkadmin"><a href="principal.php">Voltar ao inicio</a></div> 
  <?php   
  
       $conecao = mysql_connect("mysql07.redehost.com.br", "jmxrio_musicos", "3o+W6-Mw64");
   $database = mysql_select_db("jmxrio_musicos");
   
  
    
		
			
		 $sql_view = mysql_query(" SELECT * FROM cadastro ");
  

  while($linha = mysql_fetch_array( $sql_view )){
 
  $email = $linha['email']; 
  
  
  }
  
		
		
?>
  

 <div id="form_altera">

<?php		
  
	 $sql_view = mysql_query(" SELECT * FROM cadastro ORDER BY email ASC; ");

     $contador = mysql_num_rows($sql_view);
  ?>
  <div id="conter"><? echo $contador ; ?>&nbsp;&nbsp;e-mails</div> 
		
  
<div id="box_table">

<table  width="500" cellspacing="0" class="tabela">
    
   
        <td >email</td>
      
        
      </tr>
      
 <?php
   
   include "conectionx2sa.php";
   
  
   
  $sql_view = mysql_query(" SELECT * FROM cadastro ORDER BY email ASC; ");
  

  while($linha = mysql_fetch_array( $sql_view )){
  
  $num = 1;
  
  $valor = $valor + $num;
  
  
  
  $email = $linha['email']; 
  
 
 ?>
   
     <tr class="celula" height="35">
	  
       <td><? echo $email ; ?>,</td>
        
       
       </tr>
      
<?php
  }

?>

</table>





</div>
<div id="table2">
<table>

 <?php
   
   
  $sql_2 = mysql_query(" SELECT * FROM cadastro ");

  while($linha = mysql_fetch_array( $sql_2 )){
  
  $num = 1;
  
  $valor = $valor + $num;
  
   $email = $linha['email']; 
  
  
  
 
 ?>
   

<tr>
<td><? echo $valor ; ?></td>

</tr>
<?php
  }

?>


</table>

</div>

</div>
</body>
</html>