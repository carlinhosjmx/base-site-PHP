<?php 
    session_start();
    require_once ("../_app/Config.inc.php");

    use app\Models\Login;
    use app\Helpers\Session;
    use app\Helpers\ContarAcesso;
    use app\Models\Link;
    use app\Conn\Read;
    use app\Conn\Update;
    use app\Conn\Insert;

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Partituras musicais</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>

<div class="container-fluid ">
    <div class="header">
        <div class="container head">
            <div class="logo"><strong>PartiturasMusicais</strong></div>
            <div class="sair">sair</div>
        </div>
    </div>

<?php

  
  
    if( isset($_SESSION[ 'loginUser' ]) && isset($_SESSION[ 'senhaUser' ]) ){
			  			
        $mail = $_SESSION[ 'loginUser' ];
        $dataUser = new Read();
        $dataUser->readDb("cadastro", "WHERE email=:email","email={$mail}");
                             
        if($dataUser->getResult()){
             
            $user = $dataUser->getResult();
            $Link = new Link();

            if (!require($Link->getPatch())):

                ErroJMX('Erro ao incluir arquivo de navegação!', JMX_ERROR, true);

            endif;
        
        }else{

            echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
             alert ("A sessão foi expirada, faça o login novamente!") ; location.href = "http://localhost/EstruturaSite";
               </SCRIPT>';
        }
    }else{

        echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert ("A sessão foi expirada, faça o login novamente!") ; location.href = "http://localhost/EstruturaSite";
          </SCRIPT>';
    }

   

?>

</div>
    
</body>
</html>
