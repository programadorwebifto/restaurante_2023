<?php

namespace Models;

use Core\Interfaces\AuthUser;
use Core\Model;
use Core\Session;
use Exception;

class Usuario extends Model implements AuthUser
{
    protected $table = 'usuarios';
    private $password;
    private $pessoa;
    protected $columns = ['id',
        'pessoas_id',
        'login',
        'ativo',
        'email_confirmacao'];

    protected $__protected_delete = true;

    protected $__audit_date = true;


    public function save(array $data = [])
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else if (isset($this->password)) {
            $data['password'] = password_hash($this->password, PASSWORD_DEFAULT);
            unset($this->password);
        }
        return parent::save($data);
    }

    protected function insert(array $data)
    {
        if (!array_key_exists('password', $data)) {
            $data['password'] = password_hash($data['login'], PASSWORD_DEFAULT);
        }
        return parent::insert($data);
    }

    public static function login(string $cpf, string $password)
    {
        $session = Session::getInstance();
        if (!$session->isLoged()) {
            $pessoa = Pessoa::getPessoaByCPF($cpf);
            if ($pessoa) {
                $usuario = new Usuario;
                $usuario->columns[] = 'password';
                $usuario = $usuario->where('pessoas_id', '=', $pessoa->id)->get();
                if ($usuario && password_verify($password, $usuario->password)) {
                    unset($usuario->password);
                    $session->registerUser($usuario);
                    return true;
                }
            }
            return false;
        }

    }

    public function logout()
    {
    }

    public function getPessoa(){
        if(is_null($this->pessoa) && $this->isStorage()){
            $this->pessoa = new Pessoa($this->pessoas_id);
        }
        return $this->pessoa;
    }

    public function changePassword($password,$newpassword){
            $usuario = new Usuario();
            $usuario->columns = ['id', 'password'];
            $usuario = $usuario->where('id', '=', $this->id)->get();
            if(password_verify($password,$usuario->password)){
                $usuario->save(['password' => $newpassword]);
                return true;
            }
        throw new Exception('Senha atual inválida!');

    }



}