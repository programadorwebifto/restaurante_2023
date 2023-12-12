<?php

namespace Core;

use Core\Interfaces\Middleware as InterfacesMiddleware;

abstract class Middleware implements InterfacesMiddleware{


    public function exec(){
        if(!$this->check()){
            $this->handle();
        }
    }
}