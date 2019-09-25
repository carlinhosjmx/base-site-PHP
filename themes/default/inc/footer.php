
<div class="container-fluid bg-footer ">
<div class="container ">
<footer class="footer">
 

      

            <?php


            use app\Conn\Read;

                    $readFoot = new Read();
           $readFoot->readDb("jm_posts", "WHERE post_status = 1 AND ( post_name = :cat OR post_category = :cat) ORDER BY post_order ASC ", "cat= 12");
            

             if(!$readFoot ->getResult()):
               
                
                 ErroJMX("Nada postado ainda, visite em breve!", JMX_INFO);
                 
             else:

              foreach($readFoot ->getResult() as $item):

               if( $item['post_order'] == '1'):


                      echo ' <section><div class="contat"> <h2><i class="fa fa-phone" aria-hidden="true"></i> '.$item['post_title'].':</h2>'.$item['post_content'].'</div></section>';


                     endif;

                    

                
               
                  
                     

                      if( $item['post_order'] == '2'):

                               echo ' <section><div class="links"> <h2><i class="fa fa-map-marker" aria-hidden="true"></i> '.$item['post_title'].':</h2>'.$item['post_content'].'</div></section>';


                     endif;

                        if( $item['post_order'] == '3'):

                           echo ' <section><div class="links"> <h2><i class="fa fa-map-marker" aria-hidden="true"></i> '.$item['post_title'].':</h2>'.$item['post_content'].'</div></section>';




                     endif;

                     



                 endforeach;







            
             endif;




?>
             

                   

                   

           


       
      
       <section>
        <div class="socials">
               <div class="social-links"><a href="https://www.facebook.com/torresdespachantepublico/"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></div>
                <div class="acess"><a href="<?= BASE ?>/admin" target="blank"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
        </div>
       </section>
</a>
         </div>


        



   

        
        <div class="clear"></div>

   
    
</footer>
</div>
</div>
<div class="container-fluid line-end-footer">
    <div class="container">
    
      <div class="copyright">Site desenvolvido por <a href="http:\\www.jmxrio.com.br">Jmxrio.</a></div>
    </div>

</div>