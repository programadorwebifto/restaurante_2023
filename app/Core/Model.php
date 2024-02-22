<?php

namespace Core;

use DateTime;

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

    private $orderby = [];

    protected $pk = 'id';

    private $__storage = false;

    protected $__protected_delete = false;

    private $__protected_delete_column = 'exclusao_data';
    protected $__audit_date = false;

    private $__audit_date_columns = ['create'=>'criacao_data','alter'=>'alteracao_data'];

    public function __construct($id = null){
        if(isset($id)){
            $this->load($id);
        }
    }

    private function getColumns(){
        if($this->__audit_date){
            $this->columns = array_merge($this->columns,array_values($this->__audit_date_columns));
            $this->__audit_date = false;
            
        }
        return $this->columns;
    }

    public function __set(string $name, $value){
        if(in_array($name,$this->getColumns())){
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
            $this->__storage = true;
        }
    }


    /**
     * Insererir no banco de dados
     * @return self
     */
    protected function insert(array $data)
    {
        $columns = implode(', ',array_keys($data));
        $values = implode(', :',array_keys($data));
        $sql = "INSERT INTO  $this->table ($columns) values (:$values);";
        $this->query($sql, $data);
        $id = $this->getLastInsertId();
        $pk = $this->pk;
        $this->__data = $data;
        $this->__storage = true;
        $this->$pk = $id;
        return $this;
    }

    public function getLastInsertId(){
        $conn = Connection::getInstance();
        return $conn->lastInsertId($this->table);
    }

    protected function update(array $data)
    {
        if($this->__audit_date){
            $data[$this->__audit_date_columns['alter']] = Date('Y-m-d H:i:s');
        }
        $sql = "UPDATE $this->table SET";
        $comma = '';
        foreach($data as $key => $value){
            $sql .= "$comma $key = :$key";
            $comma = ',';
        }
        $sql .= " WHERE $this->pk = :w0";
        $this->query($sql, array_merge($data,['w0'=>$this->{$this->pk}]));
        $this->__data = $data;
        return $this;
    }
    public function save(array $data = []){
        $data = array_merge($this->__data, $data);
        if($this->__storage){
            return $this->update($data);
        }else{
            return $this->insert($data);
        }
    }

    public function delete()
    {
      
        if($this->__storage){
            if ($this->__protected_delete) {
                $this->update([$this->__protected_delete_column => date('Y-m-d H:i:s')]);
            }else{
                $sql = "DELETE FROM $this->table WHERE $this->pk = :$this->pk;";
                $this->query($sql, [$this->pk => $this->{$this->pk}]);
            }
            $this->__storage = false;
            return true;
        }
        return false;      
    }

    private function select(){
        $columns = implode(', ',$this->getColumns());
        [$where, $data] = $this->flushWhere();
        $order = $this->flushOrderBy();
        $sql = "SELECT $columns FROM $this->table$where$order;";
        return $this->query($sql,$data);
    }
    public function all()
    {
        $result = $this->select()->fetchAll(\PDO::FETCH_CLASS,get_class($this));
        array_walk($result,function(&$obj){
            $obj->__storage = true;
        });
        return $result;
    }
    public function get()
    {
        $result = $this->select()->fetchObject(get_class($this));
        if($result){
            $result->__storage = true;
        }
        return $result;
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
            $this->where[0][0] = '';
            foreach($this->where as $key => $w){
                $where .= " $w[0] $w[1] $w[2] :w$key";
                $data["w$key"] = $w[3];
            }
            $this->where = [];
        }
        if($this->__protected_delete){
            if(empty($where)){
                $where = " WHERE $this->__protected_delete_column IS NULL";
            }else{
                $where = " WHERE ($this->__protected_delete_column IS NULL) AND ($where)";
            }
        }else if(!empty($where)){
            $where = " WHERE $where";
        }
        return [$where, $data];
    }


    public function orderByAsc($column){
        $this->orderby($column);
        return $this;
    }   
    public function orderByDesc($column){
        $this->orderby($column,'DESC');
        return $this;
    }   

    private function orderby($column, $order = 'ASC'){
        $this->orderby[] = ['column' => $column, 'order' => $order];
    }

    private function flushOrderBy(){
        $sql = '';
        $comma = ' ORDER BY';
        foreach($this->orderby as $order){
            $sql .= "$comma {$order['column']} {$order['order']}";
            $comma = ',';
        }
        
        return $sql;
    }

    public function getData(){
        return $this->__data;
    }

    public function isStorage(){
        return $this->__storage;
    }

    public function date($column,$format = 'H:i:s d/m/Y'){
        return (new DateTime($this->$column))->format($format);
    }

    public function money($column, $decimals = 2, $decimal_separator = ",", $thousands_separator = ".", $prefix = 'R$ '){
        return $prefix . number_format($this->$column, $decimals, $decimal_separator, $thousands_separator);
    }   
}