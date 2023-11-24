<?php



namespace Core;
use \PDO;
class Connection{
    private static $conncetion;
    private function __construct(){}

    public static function getInstance(){
        if (!isset(self::$conncetion)) {
            $database = Configs::getConfig("database");
            $dns = "{$database['driver']}:host={$database['host']};port={$database['port']};dbname={$database['database']}";
            $parameters = self::{$database['driver']}();
            try{
                self::$conncetion = new PDO($dns,$database['user'],$database['password'],$parameters);  
            } catch (\PDOException $e) {
                if(APPLICATION_ENV == 'production'){
                    die('erro 500');
                }
                throw $e;
            }
           
        }
        return self::$conncetion;
    }

    private static function mysql(){
        return [
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ];
    }
}