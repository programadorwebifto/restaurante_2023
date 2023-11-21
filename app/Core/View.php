<?php
/**
 * Esse classe vai gerenciar as views da nossa aplicação
 */


namespace Core;

class View{
    private $view;
    private $template;
    public function __construct($view,$template){
        $this->view = $view;
        $this->template = $template;
    }


    public function show(){
        require $this->template; 
    }
}   