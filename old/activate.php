<?php

// Novamente, nao irei fazer nenhum tipo de checagem para validar os dados
// em busca de SQL Injection ou coisas do genero. Nao se esqueca voce de fazer
// isso.

// Conectar no banco de dados
include_once('conectionx2sa.php');

// Dados vindos pela url
$id = $_GET['id'];
$emailMd5 = $_GET['email'];
$uidMd5 = $_GET['uid'];
$dataMd5 = $_GET['key'];

/* echo 'id&nbsp;'.$id;
echo 'email&nbsp'.$emailMd5;
echo 'uid&nbsp'.$uidMd5;
echo 'data&nbsp'.$dataMd5; */


//Buscar os dados no banco
$sql = "select * from cadastro where id_musicos = '$id'";
$sql = mysql_query( $sql );
$rs = mysql_fetch_array( $sql );

// Comparar os dados que pegamos no banco, com os dados vindos pela url
$valido = true;

if( $emailMd5 !== $rs['codmail'] )
    $valido = false;

if( $uidMd5 !== $rs['uid'] )
    $valido = false;

if( $dataMd5 !== $rs['data_ts'] )
    $valido = false;

// Os dados estÃ£o corretos, hora de ativar o cadastro
if( $valido === true ) {
    $sql = "update cadastro set activo='1' where id_musicos='$id'";
    mysql_query( $sql );
    echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                   alert ("E-mail confirmado, seja bem vindo! Entre com seu e-mail e senha. ") ; location.href = "http://www.partiturasmusicais.com/index.php";
                   </SCRIPT>';
} else {
    echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                   alert ("O e-mail não foi confirmado, cadastre novamente! ") ; location.href = "http://www.partiturasmusicais.com/index.php";
                   </SCRIPT>';
}

?>
