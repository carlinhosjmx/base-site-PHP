

<?php
$host  = "mysql07.redehost.com.br"; 
$database = "jmxrio_musicos"; 
$login_db = "jmxrio_musicos"; 
$senha_db = "@#partituras@#"; 

/*$db   = mysql_connect ($host, $login_db, $senha_db) or die("Problemas na conex&atilde;o! Tente mais tarde!"); 
$basedados = mysql_select_db("jmxrio_musicos") or die("Fora do ar no momento!"); */

$conn = new mysqli($host, $login_db, $senha_db, $database );

if($conn->connect_error){

    echo "Não conseguiu conectar".$conn->connect_error;
}



?>
