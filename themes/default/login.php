<?php 
ob_start();
require_once ("../_app/Config.inc.php");

 $session = new Session();
 use app\Helpers\Session;

    echo "efetuou login";
    var_dump($session);
 
?>