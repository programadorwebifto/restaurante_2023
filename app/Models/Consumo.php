<?php

namespace Models;
use Core\Model;

class Consumo extends Model{
    protected $table = 'cosumos';
    protected $columns = ['atendimentos_id',
                           'valor_pedidos',
                           'taxa_servico',
                           'valor_desconto',
                           'valor_pago',
                           'pagamento_data',
                          ];
    public function save(array $data = []){

    }
}