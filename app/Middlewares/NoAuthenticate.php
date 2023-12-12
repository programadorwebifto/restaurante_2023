<?php

namespace Middlewares;

use Core\Action;
use Core\Middleware;
use Core\Session;

class NoAuthenticate extends Middleware{
    public function check(){
        return !Session::getInstance()->isLoged();
    }


    public function handle(){
        $action = new Action(\Controllers\Home::class);
        $action->redirect();
    }
}