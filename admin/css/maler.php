<?php

	


$useragent = $_SERVER['HTTP_USER_AGENT'];
 
  if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'IE';
  } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Opera';
  } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Firefox';
  } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Chrome';
  } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Safari';
  } else {
    // browser not recognized!
    $browser_version = 0;
    $browser= 'other';
  }
  
  $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");


  
  if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true): 
  
      if( $iphone ):
	  
	  $dispositivo = "Celular Iphone" ;
	  
	  elseif( $android ):
	  
	  $dispositivo = "Celular Android" ;
	  
	  else:
	    
     $dispositivo = "Celular" ;
	 
	 endif;
   
  else : 
    
	$dispositivo = "Computador" ;
	
  endif; 
    

function getIp()
{
 
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
 
        $ip = $_SERVER['HTTP_CLIENT_IP'];
 
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
 
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 
    }
    else{
 
        $ip = $_SERVER['REMOTE_ADDR'];
 
    }
 
    return $ip;
 
}

$page = $_GET["pagina"];


$meuip = getIp();

$separaIp = explode(".", $meuip);

$listaIpRJ = array("152","177","179","186","189","191","201","200","187");

$listaIpSP = array("157");

$i = 0;

echo "valor da página :".$page;


$quant = count( $listaIpRJ );

if( $separaIp[0] !== "66" ){


for( $i ; $i <= $quant ; $i++ ):

if( $separaIp[0] == $listaIpRJ[$i] ): 
    
     
	 $cidade = "  do Rio de janeiro  ";
	 
elseif(  $separaIp[0] == $listaIpSP[$i]  ): 

      $cidade = "  de São Paulo  ";
	 
endif;

endfor;

$data = date("d/m/Y – H:i",time()+(-2)*3600);
$texto = "<html><head></head><body><h2>Alguém visitou a página ". $page. " neste momento :</h2></body></html>";
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: jmxrio@jmxrio.com.br\r\n"; // remetente
$headers .= "Return-Path: carlinhosjmx@gmail.com\r\n"; // return-path
$envio = mail("carlinhosjmx@gmail.com", "entraram na página ". $page. " agora! ",$texto."<p>No dia :".$data."</p><p>Do ip: ".$meuip."</p><p>da cidade".$cidade." </p><p>Acessado pelo : ". $dispositivo . "</p><p> Navegador: ".$browser." -  versão: ".$browser_version, $headers)."</p>";

}else{
	
$data = date("d/m/Y – H:i",time()+(-2)*3600);
$texto = "<html><head></head><body><h2>Verificação da página ". $page. " neste momento :</h2></body></html>";
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: jmxrio@jmxrio.com.br\r\n"; // remetente
$headers .= "Return-Path: zecadmais31@hotmail.com\r\n"; // return-path
$envio = mail("zecadmais31@hotmail.com", "Verificação gugl  na página ". $page. "  ",$texto."<p>No dia :".$data."</p><p>Do ip: ".$meuip."</p><p>da cidade".$cidade." </p><p> Navegador: ".$browser." -  versão: ".$browser_version, $headers)."</p>";	
	
	
}

?>