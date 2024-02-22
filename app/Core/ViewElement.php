<?php
/**
 * Esse classe vai gerenciar as views da nossa aplicação
 */


namespace Core;

use Core\Interfaces\ViewElement as InterfaceView;

abstract class ViewElement implements InterfaceView
{
    protected $view;
    protected $data;

    public function __construct($view = null, $data = [])
    {
        $this->view = $view;
        $this->data = $data;
    }
    protected function createStringRequireView()
    {
        $view = preg_replace("(\.view.php$)", '', $this->view);
        $view = str_replace('.', '/', $view);
        return VIEWS_PATH . "/" . $view . ".view.php";
    }


    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function __get($name)
    {
        return (isset($this->data[$name])) ? $this->data[$name] : null;
    }

    public function setData(array $data){
        $this->data = $data;
    }


    public function show(array $data = [])
    {
        $data = array_merge($this->data, $data);
        extract($data);
        if ($this->view) {
            require $this->createStringRequireView();
        }

    }
}