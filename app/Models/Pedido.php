<?php

namespace Models;
use Core\Model;

class Pedido extends Model{
    protected $table = 'pedidos';
    protected $columns = ['id',
                           'atendimentos_id',
                           'produtos_id',
                           'quantidade',
                           'valor_un',
                           'situacao',
                           'saida_data',
                           'entraga_data',
                          ];
    protected $__protected_delete = true;
    protected $__audit_date = true;
}