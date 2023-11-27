<?php

namespace Core;

abstract class Model
{


    /**
     * Nome da tabela no banco de dados
     * @var 
     */
    protected $table;

    protected $columns = [];

    private $__data = [];

    private $where = []; 

    protected $pk = 'id';

    public function __construct($id = null){
        if(isset($id)){
            $this->load($id);
        }
    }
    public function __set(string $name, $value){
        if(in_array($name,$this->columns)){
            $this->__data[$name] = $value;
        }
    }

    public function __get(string $name)
    {
        return (array_key_exists($name,$this->__data))?$this->__data[$name]:null;
    }


    public function query(string $sql, array $data = [])
    {
        $conn = Connection::getInstance();
        $stm = $conn->prepare($sql);
        $stm->execute($data);
        return $stm;
    }
    private function load($id){
        $this->where($this->pk, '=', $id);
        $stm = $this->select();
        $result = $stm->fetch(\PDO::FETCH_ASSOC);
        if($result){
            $this->__data = $result;
        }
    }


    /**
     * Insererir no banco de dados
     * @return int
     */
    public function insert(array $data = [])
    {
        $data = array_merge($this->__data, $data);
        $columns = implode(', ',array_keys($data));
        $values = implode(', :',array_keys($data));
        $sql = "INSERT INTO  $this->table ($columns) values (:$values);";
        $this->query($sql, $data);
        $id = $this->getLastInsertId();
        $pk = $this->pk;
        $this->__data = $data;
        $this->$pk = $id;
        return $id;
    }

    public function getLastInsertId(){
        $conn = Connection::getInstance();
        return $conn->lastInsertId($this->table);
    }

    public function update()
    {
    }
    public function delete()
    {
    }

    private function select(){
        $columns = implode(', ',$this->columns);
        [$where, $data] = $this->flushWhere();
        $sql = "SELECT $columns FROM $this->table$where;";
        return $this->query($sql,$data);
    }
    public function all()
    {
        return $this->select()->fetchAll(\PDO::FETCH_CLASS,get_class($this));
    }
    public function get()
    {
        return $this->select()->fetchObject(get_class($this));
    }


    public function where($column, $comparison, $value)
    {
        $this->where[] = ['AND', $column, $comparison, $value];
        return $this;
    }
    public function orWhere($column,$comparison,$value){
        $this->where[] = ['OR', $column, $comparison,$value];
        return $this;
    }

    private function flushWhere(){
        $where = '';
        $data = [];
        if(count($this->where)>0){
            $this->where[0][0] = 'WHERE';
            foreach($this->where as $w){
                $where .= " $w[0] $w[1] $w[2] :$w[1]";
                $data[$w[1]] = $w[3];
            }
            $this->where = [];
        }
        return [$where, $data];
    }


}