<?php

namespace Core\Interfaces;

interface Middleware{
    /**
     * Metódo que vai verificar se o middle está sendo atendido
     * @return bool
     */
    public function check();
    
    /**
     * ação que deve ser executa no caso de falha do middle.
     * @return void
     */
    public function handle();
    /**
     * executa o handle caso o check seja falso.
     * @return void
     */
    public function exec();




}