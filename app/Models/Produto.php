<?php

namespace Models;
use Core\Model;


class Produto extends Model{
    protected $table = 'produtos';
    protected $columns = ['id',
                           'nome',
                           'descricao',
                           'valor_un',
                           'unidade_medida',
                           'disponivel',
                           'criacao_data',
                           'alteracao_data'];
    
    protected $__protected_delete = true;
}