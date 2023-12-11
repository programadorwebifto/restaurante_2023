<?php

namespace Models;
use Core\Model;


class Usuario extends Model{
    protected $table = 'usuarios';
    protected $columns = ['id',
                           'pessoas_id',
                           'login',
                           'password',
                           'ativo',
                           'email_confirmacao'];
    
    protected $__protected_delete = true;

    protected $__audit_date = true;

   
}