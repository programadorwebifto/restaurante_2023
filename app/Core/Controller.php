<?php

namespace Core;

class Controller{

    public function redirect($action='index',$method = 'GET',$paramters = []){
            action(get_class($this), $action, $method, $paramters)->redirect();
    }
    
}