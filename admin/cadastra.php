

     <?php

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


?>





          <h1>Cadastrar um usuário e Senha</h1>


      
           <form action="" method="post" enctype="multipart/form-data">
      
          <label>Email:</label>

          <input type="text" name="nome" placeholder="digite seu primeiro nome" required="required">

          <input type="text" name="sobrenome" placeholder="digite seu sobrenome" required="required">


          <input type="text" name="email" placeholder="digite um email" required="required">	
      
          <label>Senha:</label>
          <input type="password" name="senha" placeholder="digite uma senha" required="required">	
      
       
      
          <input type="submit" onclick="enviar();" name="cadastraJmx" value="Cadastrar" />
      
      
           </form>
      
         
      
      
      









