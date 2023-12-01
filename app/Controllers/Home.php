<?php


namespace Controllers;
use Core\Controller;
use Core\View;

class Home extends Controller{
    public function index()
    {
        $view = new View('home','main');
        $view->setTitle('Dash Board');
        $view->show();
    }

}