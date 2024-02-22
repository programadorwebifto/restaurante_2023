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
                           'entrega_data',
                          ];
    protected $__protected_delete = true;
    protected $__audit_date = true;



    public function __construct($id = null){
        parent::__construct($id);
    }

    
    protected function insert(array $data){
        if(!array_key_exists('valor_un',$data)){
            $produto = new Produto($data['produtos_id']);
            $data['valor_un'] = $produto->valor_un;
        }
        return parent::insert($data);
    }

    public function getSubTotal($decimals = 2, $decimal_separator = ",", $thousands_separator = ".", $prefix = 'R$ '){
        return $prefix . number_format($this->quantidade*$this->valor_un, $decimals, $decimal_separator, $thousands_separator);
    }   
    public function getProduto()
    {
        if($this->isStorage()){
            return new Produto($this->produtos_id);
        }
        return null;
    }
}