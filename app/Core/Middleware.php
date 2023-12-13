<?php

namespace Core;

use Core\Interfaces\Middleware as InterfacesMiddleware;

abstract class Middleware implements InterfacesMiddleware
{


    public function exec()
    {
        if (!$this->check()) {
            $this->handle();
        }
    }

    public static function checkMiddlewares(array $middlewares)
    {
        $middlewaresconfig = Configs::getConfig('middlewares');
        foreach ($middlewares as $middleware) {
            if (array_key_exists($middleware, $middlewaresconfig)) {
                $middleware = $middlewaresconfig[$middleware];
            }
            $mid = new $middleware;
            if (!$mid->check()) {
                return false;
            }
        }
        return true;
    }

    public static function execMiddlewares(array $middlewares)
    {
        $middlewaresconfig = Configs::getConfig('middlewares');
        foreach ($middlewares as $middleware) {
            if (array_key_exists($middleware, $middlewaresconfig)) {
                $middleware = $middlewaresconfig[$middleware];
            }
            $mid = new $middleware;
            $mid->exec();
        }
        return true;
    }
}