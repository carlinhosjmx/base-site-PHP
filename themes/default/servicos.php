      <div class="container-fluid pages">
 




        
      <?php




       if($Link->getData()):

        
        extract($Link->getData());

         $cat = $post_category;


         else:

                 $cat = $id;

   
     
     
         endif;

       
	  
	    // $cat = Check::CatByName('servicos');



           $readCat = new Read();
           $readCat->readDb("jm_posts", "WHERE post_status = 1 AND ( post_name = :cat OR post_category = :cat) ORDER BY post_order ASC ", "cat={$cat}");
            

             if(!$readCat->getResult()):
               
                
                 ErroJMX("Nada postado ainda, visite em breve!", JMX_INFO);
                 
             else:

             	 if( $readCat->getResult()[0]['post_order'] == '1'):


				              echo '<div class="line-1"><h1>'.$readCat->getResult()[0]['post_title'].'  </h1>

				                    </div>';


                     endif;

                     echo '<div class="container box-page ">';

             	  foreach($readCat->getResult() as $serv):
               
                  
                     

                      if( $serv['post_order'] == '2'):


				              echo '<div class="box-page1"><h2>'.$serv['post_title'].'  </h2>

				                 <p>'.$serv['post_content'].'</p></div>';


                     endif;

                        if( $serv['post_order'] == '3'):


				              echo '<div class="box-page2"><h2>'.$serv['post_title'].'  </h2>

				                     <div class="inter-box"> <p>'.$serv['post_content'].'</p></div></div>';


                     endif;

                      if( $serv['post_order'] == '4'):


				              echo '<div class="box-page2"><h2>'.$serv['post_title'].'  </h2>

				                     <div class="inter-box"> <p>'.$serv['post_content'].'</p></div></div>';


                     endif;

                      if( $serv['post_order'] == '5'):


				              echo '<div class="box-page2"><h2>'.$serv['post_title'].'  </h2>

				                     <div class="inter-box"> <p>'.$serv['post_content'].'</p></div></div>';


                     endif;


       


                 endforeach;

                 echo '<div class="clear"></div>';

                 echo "</div>";

                






            
             endif;

        
          
            
            
             
             
			 
			 ?>



        
   
</div>







