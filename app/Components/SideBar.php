<?php

namespace Components;
use Core\Component;

class SideBar extends Component{
    private static $instance;
    private function __construct(){
        parent::__construct('menu');
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new SideBar();
        }
        return self::$instance;
    }
}