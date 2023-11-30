<?php


namespace Core;

class Configs{
    private function __construct(){}
    private static $configs = array();
    public static function getConfig($config){
        $file_name = preg_replace("(\.php$)", '', $config);
        $parameters = explode('.', $file_name);
        $file_name = array_shift($parameters);
        if(!array_key_exists($file_name,self::$configs)){
            self::$configs[$file_name] = require(CONFIGS_PATH . "/$file_name.php");
        }
        $configs = self::$configs[$file_name];
        foreach($parameters as $param){
            if (is_array($configs) && array_key_exists($param, $configs)) {
                $configs = $configs[$param];
            }else{
                $configs = null;
                break;
            }

        }
        return $configs;
    }

    /**
     * Criar constantes espelho da tabela config do banco de dados;
     * @return void
     */
    public static function createConfigsDB(){
        if(defined('CONFIGS_DB')){
            $model = "\\Models\\".CONFIGS_DB;
            $configs = new $model();
            foreach($configs->all() as $config){
                defined($config->name) || define($config->name, $config->value);
            }
        }
    }
}