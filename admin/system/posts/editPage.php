<div class="container-fluid">
   <div class="container">


<div class="box-adm">

       <h1 >Postagens a editar:</h1>
       <h2>Selecione a página onde quer editar as postagens</h2>

<?php
   
        $i = 0;

        $paginas = new Read;
        $paginas->FullRead("SELECT * FROM jm_categories ORDER BY category_title ASC");

        if ($paginas->getResult()):

           
            echo "<ul>";

        
            foreach ($paginas->getResult() as $pages):
                
                $i++;
                extract($pages);

                $cat = $pages['category_title'];

                echo "<li><a href='index.php?cat=$cat' >". $pages['category_title'] ."</a></li>";


            endforeach;

            echo "</ul>";


            endif;
                


?>



</div>
</div>
</div>