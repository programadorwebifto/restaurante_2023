<?php

namespace Middlewares;

use Core\Action;
use Core\Middleware;

class Development extends Middleware{
    public function check(){
        return APPLICATION_ENV == 'development';
    }


    public function handle(){
        $action = new Action(\Controllers\Home::class);
        $action->redirect();
    }
}