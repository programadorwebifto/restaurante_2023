<?php

namespace Models;
use Core\Model;

class Atendimento extends Model{
    protected $table = 'atendimentos';
    protected $columns = ['id',
                           'pessoas_id',
                           'mesa',
                           'pagamento_data',
                           'valor_desconto',
                           'taxa_servico',
                          ];
    protected $__protected_delete = true;
    protected $__audit_date = true;

    public function getPedidos(){
        if($this->isStorage()){
            $pedidos = new Pedido;
            return $pedidos->where('atendimentos_id', '=', $this->id)->orderByAsc('criacao_data')->all();
        }
        return null;
    }

    public function addPedido($produtos_id, $quantidade)
    {
        $pedido = new Pedido();
        $pedido->produtos_id = $produtos_id;
        $pedido->quantidade = $quantidade;
        $pedido->atendimentos_id = $this->id;
        $pedido->save();
        return $pedido;
    }
}