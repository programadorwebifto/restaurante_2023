<?php

namespace Controllers\Usuarios;

use Components\ToastsAlert;
use Core\Controller;
use Core\Request;
use Core\Session;
use Core\View;
use Exception;
use Models\Usuario;

class Perfil extends Controller
{
    public function index()
    {
        $auth_user = Session::getInstance()->getUserAuth();
        $usuario = new Usuario($auth_user->id);
        $view = new View('usuarios.perfil');
        ToastsAlert::addAlertInfo('Para atualizar as informações desabilitadas contate a administração da empresa');
        $view->setTitle('Perfil')->show($usuario->getPessoa()->getData());
        
    }

    public function update(Request $request)
    {
        $auth_user = Session::getInstance()->getUserAuth();
        $usuario = new Usuario($auth_user->id);
        $usuario->getPessoa()->save(
            [
                'telefone' => $request->telefone,
                'email' => $request->email,
            ]
        );
        ToastsAlert::addAlertSuccess('Dados do usuário autalizados!');
        $this->redirect();
    }

    public function changePassword(Request $request)
    {
        if ($request->newpassword != $request->confirmacao) {
            ToastsAlert::addAlertWarning('Senha e Confirmação não são iguais.');
            $this->redirect();
        }
        $auth_user = Session::getInstance()->getUserAuth();
        $usuario = new Usuario($auth_user->id);
        try{
            $usuario->changePassword($request->password, $request->newpassword);
        }catch(Exception $e){
            ToastsAlert::addAlertWarning($e->getMessage());
            $this->redirect();
        }
        ToastsAlert::addAlertSuccess("Senha Alterada!");
        $this->redirect();
       
    }
}