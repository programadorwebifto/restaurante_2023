<?php

namespace Core;

use Core\Interfaces\AuthUser;

class Session{
    private static $instance;

    private $session_key = '__data__';
    private $user_key = '__user__';
    private function __construct(){
        session_name(SESSION_NAME);
        session_start();
        if(!array_key_exists($this->session_key,$_SESSION)){
            $_SESSION[$this->session_key] = array();
        }

    }

    public function __get($name){
        return (array_key_exists($name, $_SESSION[$this->session_key]))?
        $_SESSION[$this->session_key][$name]
        :null;
    }

    public function __set($name,$value){
        $_SESSION[$this->session_key][$name] = $value;
    }

    public function __isset($name){
        return array_key_exists($name, $_SESSION[$this->session_key]);
    }


    public function __unset($name){
        unset($_SESSION[$this->session_key][$name]);
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Session();
        }
        return self::$instance;
    }

    public function destory(){
        session_destroy();
    }

    public function registerUser(AuthUser $user){
        $_SESSION[$this->user_key] = $user;
    }

    public function getUserAuth(){
        return isset($_SESSION[$this->user_key])?$_SESSION[$this->user_key]:null;
    }

    public function isLoged(){
        return isset($_SESSION[$this->user_key]);
    }

    public function clearUser(){
        $usuario = $this->getUserAuth();
        $usuario->logout();
        unset($_SESSION[$this->user_key]);
    }
}