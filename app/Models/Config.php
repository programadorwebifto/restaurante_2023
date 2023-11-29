<?php

namespace Models;
use Core\Model;


class Config extends Model{
    protected $table = 'configs';
    protected $columns = ['id','name','value'];

}