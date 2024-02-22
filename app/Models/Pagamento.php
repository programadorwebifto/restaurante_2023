<?php

namespace Models;

use Core\Model;

class Pagamento extends Model
{
    protected $table = 'pagamentos';
    protected $columns = ['id',
        'atendimentos_id',
        'pagamentos_tipos_id',
        'valor',
        'observacao',
    ];
    protected $__protected_delete = true;
    protected $__audit_date = true;


    public function getPagamentoTipo(){
        return new PagamentoTipo($this->pagamentos_tipos_id);
    }
}