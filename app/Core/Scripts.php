<?php


namespace Core;

class Scripts{
    private static $files = [];
    public static $block = [];
    private function __construct(){}


    public static function addScript($script){
        self::$block[] = $script;
    }

    public static function addScriptFile($file_name){
        self::$files[] = $file_name;
    }

    public static function show(array $script_files = []){
        $script_files = array_merge(self::$files, $script_files);
        $scripts = Configs::getConfig('scripts');
        foreach($scripts as $name => $script){
            if(in_array($name,$script_files)){
                echo "<script src='$script'></script>\n";
            }
        }

        if (count(self::$block)) {
            echo "<script>";
            foreach (self::$block as $script) {
                echo $script;
            }
            echo "</script>";
        }

    }
}