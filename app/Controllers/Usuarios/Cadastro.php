<?php

namespace Controllers\Usuarios;
use Core\Controller;
use Core\Request;
use Core\View;

class Cadastro extends Controller{
    public function index(){
        $view = new View('usuarios.cadastro','blank');
        $view->show();
    }

    public function salvar(Request $request){
        pre($request->all());
    }
}
