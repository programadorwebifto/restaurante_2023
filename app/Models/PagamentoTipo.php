<?php

namespace Models;
use Core\Model;

class PagamentoTipo extends Model{
    protected $table = 'pagamentos_tipos';
    protected $columns = ['id',
                           'descricao',
                          ];
    protected $__protected_delete = true;
    protected $__audit_date = true;
}