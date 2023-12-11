<?php

namespace Controllers\Usuarios;
use Core\Controller;
use Core\Request;
use Core\View;
use Models\Pessoa;

class Cadastro extends Controller{
    public function index(){
        $view = new View('usuarios.pesquisar');
        $view->setTitle('Cadastro de Usuário')->show();
    }

    public function save(Request $request){
        pre($request->all());
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
