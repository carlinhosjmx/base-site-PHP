
     <?php

     use app\Conn\Insert;

        $dadosCad = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                
                if (!empty($dadosCad['cadastraJmx'])):


          					    $senha = md5($dadosCad['senha']);

          					    $login = $dadosCad['email'];

          					    $nome = $dadosCad['nome'];

          					    $sobrenome = $dadosCad['sobrenome'];

          					    $Data = [ "user_name" => $nome, "user_lastname" => $sobrenome, "user_email" => $login, "user_password_x7" => $senha , "user_level" => "3"];


					         $Insert = new Insert();
					         $Insert ->insertDb('jm_users', $Data);
        					      
                          if ( $Insert ->getResult()):

        					          
        					           echo " Seu acesso ao  sistema foi cadastrado com sucesso!";



                        endif;

                endif;


?>

<div class="container-fluid ">

<div class="container ">

        <div class="box-form-cad back">

           <div class="box-login-2">

          <h1>Cadastrar um usuário e Senha</h1>





      
           <form action="" method="post" enctype="multipart/form-data">
      
          <label>Nome:</label>

          <input type="text" name="nome" placeholder="digite seu primeiro nome" required="required">
           <label>Sobrenome:</label>

          <input type="text" name="sobrenome" placeholder="digite seu sobrenome" required="required">

          <label>Email:</label>
          <input type="text" name="email" placeholder="digite um email" required="required">	
      
          <label>Senha:</label>
          <input type="password" name="senha" placeholder="digite uma senha" required="required">	
      
       
      
          <input type="submit" onclick="enviar();" name="cadastraJmx" value="Cadastrar" />
      
      
           </form>

           <div class="clear"></div>

           </div>

           </div>
      
         
    </div>  
      
     </div> 
       
       
     
        
     








 









