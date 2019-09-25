<?php

   include_once "conectionx2sa.php";
   
   $cont = 0;
   
   while($cont < 1500){
   
   $sql = mysql_query("UPDATE partituras SET tipo = 'pdf'");

   $cont = $cont + 1;
   
   }

?>