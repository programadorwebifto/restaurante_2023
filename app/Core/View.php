<?php
/**
 * Esse classe vai gerenciar as views da nossa aplicação
 */


namespace Core;

class View
{
    private $view;
    private $template;
    public function __construct($view, $template)
    {
        $this->view = $view;
        $this->template = $template;
    }
    private function createStringRequireView()
    {
        $view = str_replace(".php", '', $this->view);
        $view = str_replace('.view', '', $view);
        $view = str_replace('.', '/', $view);
        return VIEWS_PATH . "/" . $view . ".view.php";
    }
    private function createStringRequireTemplate()
    {
        $template = str_replace(".", "/", 
        str_replace(".template", "", 
        str_replace(".php", "", $this->template)));
        return TEMPLATES_PATH . "/" . $template . ".template.php";
    }



    public function show()
    {
        ob_start();
        require $this->createStringRequireView();
        $view = ob_get_clean();
        require $this->createStringRequireTemplate();
    }
}