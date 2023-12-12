<?php

namespace Core;

class FlashMessage{
    private $session_key;

    public function __construct($session_key){
        $this->session_key = $session_key;
    }

    public function addMessage($msg){
        $alerts = session::getInstance()->{$this->session_key};
        if(is_null($alerts)){
            $alerts = array();
        }
        array_push($alerts, $msg);
        session::getInstance()->{$this->session_key} = $alerts;
    }

    public function flushMessages(){
        $alerts = session::getInstance()->{$this->session_key};
        if(is_null($alerts)){
            $alerts = array();
        }
        unset(session::getInstance()->{$this->session_key});
        return $alerts;
    }

}