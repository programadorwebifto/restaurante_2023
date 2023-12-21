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

    private $pedidos = [];

    private $pagamentos = [];

    public function getPedidos(){
        if($this->isStorage() && count($this->pedidos) == 0){
            $pedidos = new Pedido;
            $this->pedidos = $pedidos->where('atendimentos_id', '=', $this->id)->orderByAsc('criacao_data')->all();
        }
        return $this->pedidos;
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
    
    public function getPagamentos(){
        if($this->isStorage() && count($this->pagamentos) == 0){
            $pagamentos = new Pagamento;
            $this->pagamentos = $pagamentos->where('atendimentos_id', '=', $this->id)->orderByAsc('criacao_data')->all();
        }
        return $this->pagamentos;
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

    public function getValorTotal(){
        $total = 0;
        foreach($this->getPedidos() as $pedido){
            $total += $pedido->quantidade * $pedido->valor_un;
        }
        foreach($this->getPagamentos() as $pagamento){
            $total -= $pagamento->valor;
        }
        return $total;
    }
}