 

<?php



        

         

         

          	      $getDados =  $_POST['get_option'];
  
                                        
		      

		           

		           $readOrder = new Read;
				   $readOrder->FullRead("SELECT * FROM jm_posts WHERE post_category == '$getDados' " );

				    
				      if($readOrder->getResult()):


					
					   foreach ($readOrder->getResult() as $itens):			   
			        
			                echo '<option>Está vindo isso' . $itens['post_title'] .'</option>';


	                   endforeach;


	                  else:

                          echo '<option>Deu ruim!' .  $getDados .'</option>';

	                endif;
  

?>