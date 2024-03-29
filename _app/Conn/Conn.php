<?php

namespace app\Conn;

use \PDO;

abstract class Conn {

    private static $Host = HOST;
    private static $User = USER;
    private static $Pass = PASS;
    private static $DB = DB;

   
    private static $Connect = null;

   
    protected static function ConnectDb() {
       
        try {
            if (self::$Connect == null):
             
                $dsn = 'mysql:host=' . self::$Host . ';dbname=' . self::$DB;
                $options = [ PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                self::$Connect = new PDO($dsn , self::$User, self::$Pass, $options);

              
            endif;

        } catch (PDOException $e) {
               PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
               die;
        }

        self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$Connect;
    }

   
    protected static function getConn() {
        return self::ConnectDb();
    }

}
