<?php

namespace Controllers\Usuarios;

use Components\ToastsAlert;
use Core\Controller;
use Core\Request;
use Core\Session;
use Core\View;
use Models\Usuario;

class Login extends Controller{
    public function index (){
        $view = new View('usuarios.login','blank');
        $view->setTitle('Login')->show();
    }

    public function logar(Request $request)
    {
        if(Usuario::login($request->cpf, $request->password)){
            ToastsAlert::addAlertSuccess('Bem vindo!');
            action(\Controllers\Home::class)->redirect();
        }
        ToastsAlert::addAlertWarning('Usuário e/ou Senha Inválida(s)','Falha de Login');
        $this->redirect();
    }

    public function logout(){
        Session::getInstance()->clearUser();
        $this->redirect();
    }
}