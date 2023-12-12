<?php

namespace Models;
use Core\Model;


class Pessoa extends Model{
    protected $table = 'pessoas';
    private $user;
    protected $columns = ['id',
                           'nome',
                           'telefone',
                           'cpf',
                           'rg',
                           'rg_expedidor',
                           'email'];
    
    protected $__protected_delete = true;

    protected $__audit_date = true;

    public function getUser(){
        if(!$this->user instanceof Usuario && $this->isStorage()){
            $usuario = new Usuario();
            $this->user = $usuario->where('pessoas_id', '=', $this->id)->get();
        }
        return $this->user;
    }

    public function isUser(){
        return ($this->getUser() instanceof Usuario);
    }

    public function promoteUser(){
        $user = $this->getUser();
        if(!$user instanceof Usuario){
            $this->user = new Usuario();
        }
        $this->user->pessoas_id = $this->id;
        $this->user->login = $this->cpf;
        $this->user->save();
    }

    public static function getPessoaByCPF($cpf){
        $pessoa = new Pessoa();
        return $pessoa->where('cpf', '=', $cpf)->get();
    }
}