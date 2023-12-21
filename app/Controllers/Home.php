<?php


namespace Controllers;

use Components\ToastsAlert;
use Core\Controller;
use Core\Request;
use Core\View;
use Models\Atendimento;
use Models\Pedido;
use Models\Produto;

class Home extends Controller{
    public function index()
    {
        $atendimento = new Atendimento();
        $atendimento->where('pagamento_data', 'is', null);
        $mesas = [];
        foreach($atendimento->all() as $registro){
            $mesas[$registro->mesa] = $registro;
        }
        $view = new View('home');
        $view->mesas = $mesas;
        $view->setTitle('Mesas')->show();
    }

    public function atendimento($mesa){
        $atendimento = new Atendimento();
        $atendimento->where('mesa','=',$mesa)->where('pagamento_data', 'is', null);
        $atendimento = $atendimento->get();
        if($atendimento == false){
            if($mesa<1 || $mesa > N_MESAS){
                ToastsAlert::addAlertError('Requisição Inválida');
                $this->redirect();
            }
            $atendimento = new Atendimento();
        }
        $atendimento->mesa = $mesa;
        $atendimento->save();
        $select  = new \Components\Select();
        $select->addAttr('class', 'form-control')->addAttr('name', 'produtos_id');
        $produtos = new Produto();
        $produtos->where('disponivel','=','1')->orderByAsc('nome');
        foreach($produtos->all() as $produto){
            $select->addOption($produto->id, $produto->nome . " " . $produto->money('valor_un'));
        }
        $view = new View('atendimentos.mesa');
        $view->atendimento = new Atendimento($atendimento->id);
        $view->produtosSelect = $select;
        $view->setTitle("Mesa $mesa")->show();
    }


    public function addPedido($id, Request $request){
        $atendimento = new Atendimento($id);
        $atendimento->addPedido($request->produtos_id, $request->quantidade);
        ToastsAlert::addAlertSuccess("Pedido Adicionado com sucesso!");
        $this->redirect('atendimento', 'GET', ['mesa' => $atendimento->mesa]);
    }

}