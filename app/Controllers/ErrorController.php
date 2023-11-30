<?php

namespace Controllers;
use Core\Controller;
use Core\View;
class ErrorController extends Controller{
    public function Page404()
    {
        $view = new View("page404", "blank");
        $view->show();
    }

    public function Page500(){
        $view = new View("page500", "blank");
        $view->show();
    }
}