<?php


namespace Controllers;

use Components\ToastsAlert;
use Core\Controller;
use Core\View;
use Models\Atendimento;

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
        $view = new View('atendimentos.mesa');
        $view->setTitle("Mesa $mesa")->show();
    }

}