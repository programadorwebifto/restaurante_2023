<?php

namespace Components;
use Core\Component;
use Core\Model;

class Select extends Component{

    private $placeholder;
    private $value;

    private $options;
    public function __construct($data = []){
        parent::__construct(null, $data);
    }

    public function addAttr($name,$value){
        $this->$name = $value;
        return $this;
    }

    public function setPlaceholder($placeholder){
        $this->placeholder = $placeholder;
        return $this;
    }

    public function setValue($value){
        $this->value = $value;
        return $this;
    }

    public function generateOptions(){
        $html="";
        if($this->placeholder){
            $select = (empty($this->value)) ? ' selected' : '';
            $html .= "<option disabled$select value=''>{$this->placeholder}</option>";
        }
        foreach($this->options as $value=> $text){
            $select = ($this->value == $value) ? ' selected' : '';
            $html .= "<option value='$value'$select>{$text}</option>";
        }
        return $html;
    }


    public function addOption($value,$text){
        $this->options[$value] = $text;
        return $this;
    }

    public function addModel(Model $model, $value_column, $text_column){
        foreach($model->all() as $register){
            $this->addOption($register->$value_column, $register->$text_column);
        }
        return $this;
    }

    public function show(array $data = []){
        $data = array_merge($this->data, $data);
        $attrs = '';
        foreach($data as $key => $value){
            $attrs .= " $key='$value'";
        }
        echo "<select $attrs>";
        echo $this->generateOptions();
        echo "</select>";
    }

}


