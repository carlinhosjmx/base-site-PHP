<?php


    $pesquisa = $_GET['palavra'];


    $dados = new Read;
    $dados->readDb("jm_sub_category", "WHERE sub_category_name = :var ", "var={$pesquisa}");

    if( $dados->getResult() ):
  
         echo "foi encontrado";
    else:

       echo "não foi encontrado";

    endif;



?>