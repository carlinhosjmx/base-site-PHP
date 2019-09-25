<?php
 
 include_once "sessao.php";

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Partituras musicais</title>


<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="/resources/demos/style.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


 


</head>

<body>

<?php

include_once "code_artista.php";

?>
 
  
      
<?php

include_once "header.php";

?>

<div id="content_user">
<div id="content2">
<div id="box_part">
<div class="list_part"><div class="title-list"><b>Partituras por Artista:</b></div><div class="line-list"><span><a href="partituras-artista-a.php">A</a></span><span><a href="partituras-artista-b.php">B</a></span><span><a href="partituras-artista-c.php">C</a></span><span><a href="partituras-artista-d.php">D</a></span><span><a href="partituras-artista-e.php">E</a></span><span><a href="partituras-artista-f.php">F</a></span><span><a href="partituras-artista-g.php">G</a></span><span><a href="partituras-artista-h.php">H</a></span><span><a href="partituras-artista-i.php">I</a></span><span><a href="partituras-artista-j.php">J</a></span><span><a href="partituras-artista-k.php">K</a></span><span><a href="partituras-artista-l.php">L</a></span><span><a href="partituras-artista-m.php">M</a></span><span><a href="partituras-artista-n.php">N</a></span><span><a href="partituras-artista-o.php">O</a></span><span><a href="partituras-artista-p.php">P</a></span><span><a href="partituras-artista-q.php">Q</a></span><span><a href="partituras-artista-r.php">R</a></span><span><a href="partituras-artista-s.php">S</a></span><span><a href="partituras-artista-t.php">T</a></span><span><a href="partituras-artista-u.php">U</a></span><span><a href="partituras-artista-v.php">V</a></span><span><a href="partituras-artista-w.php">W</a></span><span><a href="partituras-artista-x.php">X</a></span><span><a href="partituras-artista-y.php">Y</a></span><span><a href="partituras-artista-z.php">Z</a></span>
</div></div><!--list_part-->

<div class="list_part"><div class="title-list"><b>Partituras por Música:</b></div><div class="line-list"><span><a href="partituras-titulo-a.php">A</a></span><span><a href="partituras-titulo-b.php">B</a></span><span><a href="partituras-titulo-c.php">C</a></span><span><a href="partituras-titulo-d.php">D</a></span><span><a href="partituras-titulo-e.php">E</a></span><span><a href="partituras-titulo-f.php">F</a></span><span><a href="partituras-titulo-g.php">G</a></span><span><a href="partituras-titulo-h.php">H</a></span><span><a href="partituras-titulo-i.php">I</a></span><span><a href="partituras-titulo-j.php">J</a></span><span><a href="partituras-titulo-k.php">K</a></span><span><a href="partituras-titulo-l.php">L</a></span><span><a href="partituras-titulo-m.php">M</a></span><span><a href="partituras-titulo-n.php">N</a></span><span><a href="partituras-titulo-o.php">O</a></span><span><a href="partituras-titulo-p.php">P</a></span><span><a href="partituras-titulo-q.php">Q</a></span><span><a href="partituras-titulo-r.php">R</a></span><span><a href="partituras-titulo-s.php">S</a></span><span><a href="partituras-titulo-t.php">T</a></span><span><a href="partituras-titulo-u.php">U</a></span><span><a href="partituras-titulo-v.php">V</a></span><span><a href="partituras-titulo-w.php">W</a></span><span><a href="partituras-titulo-x.php">X</a></span><span><a href="partituras-titulo-y.php">Y</a></span><span><a href="partituras-titulo-z.php">Z</a></span>
</div></div><!--list_part-->
</div><!--box_part-->


<div id="box_center4">

<div id="labeltable"><div id="coluna3">Artista</div><div id="coluna1">Música</div><div id="coluna2">Instrumento</div><div id="coluna5">Tipo</div><div id="coluna4">Enviada Por</div></div><!--labeltable-->

<div id="pesquisa">

<?php

   $texto = "a%";
   $letter = "A";

?>

<?php

mysql_set_charset('iso-8859-1');


    include_once "content_artista.php"

?>



</div>

</div>
 </div><!--box_center-->
 </div><!--content_usua-->
<?php
   
   include "footer.php";

?>



</body>
</html>