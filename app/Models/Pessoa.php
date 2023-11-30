<?php

namespace Models;
use Core\Model;


class Pessoa extends Model{
    protected $table = 'produtos';
    protected $columns = ['id',
                           'nome',
                           'telefone',
                           'cpf',
                           'rg',
                           'email'];
    
    protected $__protected_delete = true;

    protected $__audit_date = true;
}