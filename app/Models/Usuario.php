<?php

namespace Models;

use Core\Model;


class Usuario extends Model
{
    protected $table = 'usuarios';
    private $password;
    protected $columns = ['id',
        'pessoas_id',
        'login',
        'ativo',
        'email_confirmacao'];

    protected $__protected_delete = true;

    protected $__audit_date = true;

    public function __set($name, $value)
    {
        if ($name == 'password') {
            $this->password = password_hash($value, PASSWORD_DEFAULT);
        }else{
            parent::__set($name, $value);
        }
    }

    public function save(array $data = [])
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }else if(isset($this->password)){
            $data['password'] = $this->password;
        }
        return parent::save($data);
    }

    protected function insert(array $data){
        if(!array_key_exists('password',$data)){
            $data['password'] = password_hash($data['login'], PASSWORD_DEFAULT);
        }
        return parent::insert($data);
    }



}