<?php

namespace Middlewares;

use Core\Action;
use Core\Middleware;
use Core\Session;

class Authenticate extends Middleware{
    public function check(){
        return Session::getInstance()->isLoged();
    }


    public function handle(){
        $action = new Action(\Controllers\Usuarios\Login::class);
        $action->redirect();
    }
}