<?php


namespace Controllers;
use Core\Controller;
use Core\View;

class Produtos extends Controller{
    public function index()
    {
        $view = new View('produtos.produtos');
        $view->show();
    }

}