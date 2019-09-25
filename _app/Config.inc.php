<?php
// CONFIGRAÇÕES DO BANCO ####################
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'partituras');

// DEFINE SERVIDOR DE E-MAIL ################
define('MAILUSER', 'envio@construgessorj.com.br');
define('MAILPASS', '@123456@');
define('MAILPORT', '587');
define('MAILHOST', 'www.construgessorj.com.br');
define('DESTMAIL', 'construgessorj@gmail.com');
define('NAMEMAIL', 'construgesso rj');

// DEFINE IDENTIDADE DO SITE ################
define('SITENAME', 'Construgesso RJ - tudo em gesso, drywall e materiais de construção. ');
define('SITEDESC', 'Venha conhecer a construgesso rj, temos gesso, drywall e muito mais.
');

// DEFINE A BASE DO SITE ####################
define('BASE', 'http://localhost/EstruturaSite/');
define('HOME', 'http://localhost/EstruturaSite');
define('THEME', 'default');

define('INCLUDE_PATH', HOME . '/part/area/');
define('REQUIRE_PATH','area/');

// AUTO LOAD DE CLASSES ####################

require_once('../vendor/autoload.php');

// TRATAMENTO DE ERROS #####################
//CSS constantes :: Mensagens de Erro
define('JMX_ACCEPT', 'accept');
define('JMX_INFO', 'info');
define('JMX_ALERT', 'alert');
define('JMX_ERROR', 'error');

//WSErro :: Exibe erros lançados :: Front
function ErroJMX($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? JMX_INFO : ($ErrNo == E_USER_WARNING ? JMX_ALERT : ($ErrNo == E_USER_ERROR ? JMX_ERROR : $ErrNo)));
    echo "<div class=\"box-alert {$CssClass}\">{$ErrMsg}<span class=\"ajax_close\"></span></div>";

    if ($ErrDie):
        die;
    endif;
}

//PHPErro :: personaliza o gatilho do PHP
function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? JMX_INFO : ($ErrNo == E_USER_WARNING ? JMX_ALERT : ($ErrNo == E_USER_ERROR ? JMX_ERROR : $ErrNo)));
    echo "<p class=\"trigger {$CssClass}\">";
    echo "<b>Erro na Linha: #{$ErrLine} ::</b> {$ErrMsg}<br>";
    echo "<small>{$ErrFile}</small>";
    echo "<span class=\"ajax_close\"></span></p>";

    if ($ErrNo == E_USER_ERROR):
        die;
    endif;
}

set_error_handler('PHPErro');
