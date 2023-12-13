<?php

namespace Core;

class Action
{
    private $router;

    public function __construct($controller = null, $action = 'index', $method = 'GET', $parameters = [])
    {
        if (!empty($controller)) {
            $this->router = Router::getRouterByController($controller, $action, $method, $parameters);
        }
    }

    public function getUrl()
    {
        if ($this->router) {
            return APPLICATION_URL . $this->router->getUrl();
        }
        throw new \Exception('Action sem rota não gera URL');
    }

    public function __toString()
    {
        return $this->getUrl();
    }
    public static function createActionByUrl($url, $method = "GET")
    {
        $router = Router::getRouterByUrl($url, $method);
        $action = new Action();
        $action->router = $router;
        return $action;
    }

    public function run()
    {
        if ($this->router) {
            $this->router->execMiddlewares();
            $controller = $this->router->getController();
            call_user_func_array(
                [
                    new $controller,
                    $this->router->getAction()
                ],
                array_merge(
                    array_values($this->router->getParameters())
                    ,[
                        Request::getInstance()
                    ]
                , )
            );
            return;
        }

        if (defined('PAGE_404')) {
            $controller = PAGE_404;
            $action = 'index';
            if (is_array($controller)) {
                $controller = array_values($controller);
                $action = $controller[1];
                $controller = $controller[0];
            }
            $action = new Action($controller, $action);
            $action->redirect();
            // call_user_func_array(
            //     [
            //         new $controller,
            //         $action
            //     ],
            //     []);
            return;
        }

        die('ERROR 404 - NOT FOUND');

    }

    public function redirect()
    {
        header('location:' . $this);
        die();
    }

    public function isRunning(){
        $running = Request::getInstance()->getAction();
        return $running->router->getController() == $this->router->getController()
            && $running->router->getAction() == $this->router->getAction();
    }

    public function checkMiddlewares(){
        if($this->router){
            return $this->router->checkMiddlewares();
        }
        return false;
    }
}