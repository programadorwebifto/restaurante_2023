<?php


namespace Core;

class Styles{
    private static $files = [];
    public static $block = [];
    private function __construct(){}


    public static function addStyle($css){
        self::$block[] = $css;
    }

    public static function addStyleFile($file_name){
        self::$files[] = $file_name;
    }

    public static function show(array $style_files = []){
        $style_files = array_merge(self::$files, $style_files);
        $styles = Configs::getConfig('styles');
        foreach($styles as $name => $style){
            if(in_array($name,$style_files)){
                echo "<link rel='stylesheet' href='$style'>\n";
            }
        }

        if (count(self::$block)) {
            echo "<style>";
            foreach (self::$block as $css) {
                echo $css;
            }
            echo "</style>";
        }

    }
}