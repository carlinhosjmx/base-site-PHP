<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


   <script language="javascript" type="text/javascript" src="niceforms.js"></script>
  <link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

<style type="text/css">

#formCenter{

width: 500px;
height: 300px;
margin: 100px auto;

	
}

</style>  

</head>

<body>
<div id="formCenter">
<form name="cadastrar" method="post" action="enviar_cadastro.php" class="niceform">
  <table width="400" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="150"><label ><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Cod.Cliente:</font></label></td>
      <td width="250"><label ><input name="codcli" type="text" id="nome" maxlength="75"></label></td>
    </tr>
     <tr>
    <td>&nbsp;</td>
   
  </tr>
    <tr>
      <td><label><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Login:</font></label></td>
      <td><label ><input name="login" type="text" id="login" maxlength="30"></label></td>
    </tr>
     <tr>
    <td>&nbsp;</td>
   
  </tr>
    <tr>
      <td><label ><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Senha:</font></label></td>
      <td><label ><input name="senha" type="password" id="senha" maxlength="30"></label></td>
    </tr>
     <tr>
    <td>&nbsp;</td>
   
  </tr>
    <tr>
      <td><label ><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Repetir
        Senha:</font></label></td>
      <td><label ><input name="senha2" type="password" id="senha2" maxlength="30"></label></td>
    </tr>
     <tr>
    <td>&nbsp;</td>
   
  </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    
    <tr>
      <td colspan="2"><div align="center">
          <label ><input name="enviar" type="submit" id="enviar" value="Enviar Cadastro"></label>
          <label ><input name="limpar" type="reset" id="limpar" value="Limpar Dados"></label>
        </div></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>