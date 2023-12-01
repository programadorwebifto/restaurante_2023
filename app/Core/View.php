<?php
/**
 * Esse classe vai gerenciar as views da nossa aplicação
 */


namespace Core;

class View
{
    private $view;
    private $template;
    private $data;

    private $template_subtitle = "";
    public function __construct($view, $template = TEMPLATE_DEFAULT, $data = [])
    {
        $this->view = $view;
        $this->template = $template;
        $this->data = $data;
    }
    private function createStringRequireView()
    {
        $view = preg_replace("(\.view.php$)",'',$this->view);
        $view = str_replace('.', '/', $view);
        return VIEWS_PATH . "/" . $view . ".view.php";
    }
    private function createStringRequireTemplate()
    {
        $template = preg_replace("(\.template.php$)",'',$this->template);
        $template = str_replace('.', '/', $template);
        return TEMPLATES_PATH . "/" . $template . ".template.php";
    }

    public function __set($name,$value){
        $this->data[$name] = $value;
    }
    public function __get($name){
        return (isset($this->data[$name]))?$this->data[$name]:null;
    }

    private function getTemplateConfigs(){
        $template = Configs::getConfig('templates');
        if(!empty($this->template_subtitle) && (!isset($template['subtitle']) || $template['subtitle'])){
            if(isset($template['prefix']) && !empty($template['prefix'])){
                $template['title'] .= $template['prefix'] . $this->template_subtitle;
            } else if(isset($template['suffix']) && !empty($template['suffix'])){
                $template['title'] = $this->template_subtitle.$template['suffix'].$template['title'];
            }else{
                $template['title'] = $this->template_subtitle;
            }
        }
        $template['subtitle'] = $this->template_subtitle;
        return $template;
    }

    public function setTitle($title){
        $this->template_subtitle = $title;
    }



    public function show($data = [])
    {
        $data = array_merge($this->data, $data);
        extract($data);
        $template = $this->getTemplateConfigs();
        ob_start();
        require $this->createStringRequireView();
        $view = ob_get_clean();
        require $this->createStringRequireTemplate();
    }
}