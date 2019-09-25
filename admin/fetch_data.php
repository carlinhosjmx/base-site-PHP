 

<?php



            if(isset($_POST['get_option']))
   {

                              
           $getDados = $_POST['get_option'];

           echo 'Está vindo isso' . $getDados;
           

           $readOrd = new Read;
		   $readOrd->readDb("jm_posts", "WHERE post_category = {$cat['id_sub_category']} ORDER BY post_order ASC", "post_order={$getDados}" );
						   
		    echo "está vindo " . $order['post_order'] . ", ";
           
           } else{

               echo " Não veio nada!" ;

           }


?>