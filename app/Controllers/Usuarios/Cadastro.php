<?php

namespace Controllers\Usuarios;
use Core\Controller;
use Core\Request;
use Core\View;
use Models\Pessoa;
use Models\Usuario;

class Cadastro extends Controller{
    public function index(){
        $view = new View('usuarios.pesquisar');
        $view->setTitle('Cadastro de Usuário')->show();
    }

    public function save(Request $request){
        //verificar se usuario existe na base dados;
        $pessoa = new Pessoa($request->pessoas_id);
        $pessoa->save([
            'nome'=>$request->nome,
            'telefone' => $request->telefone,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'rg_expedidor' => $request->rg_expedidor,
            'email' => $request->email,
        ]);
        $pessoa->promoteUser();
        \Components\ToastsAlert::addAlertSuccess("Castrado  de $request->nome realizado com sucesso!", 'Confirmação de Cadastro');
        $this->redirect();
    }
    public function find(Request $request){
        $pessoa = new Pessoa();
        $data = array
        (
            'cpf'=>$request->cpf,
            'email'=>$request->email
        );
        $pessoa = $pessoa->where('cpf', '=', $request->cpf)->orWhere('email', '=', $request->email)->get();
        if($pessoa){
            $data = $pessoa->getData();
            $data['pessoas_id'] = $data['id'];
            unset($data['id']);
            $usuario = $pessoa->getUser();
            if($usuario){
                $data = array_merge($data, $usuario->getData());
            }
        }
       
    
        $view = new View('usuarios.cadastro');
        $view->setTitle('Cadastro de Usuário')->show($data);
    }
}
