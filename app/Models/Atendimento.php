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

    public function addPagamento($pagamentos_tipos_id, $valor, $observacao = null){
        $pagamento = new Pagamento();
        $pagamento->atendimentos_id = $this->id;
        $pagamento->valor = $valor;
        $pagamento->pagamentos_tipos_id = $pagamentos_tipos_id;
        if(!empty($observacao)){
            $pagamento->observacao = $observacao;
        }
        $pagamento->save();
        return $pagamento;

    }
}