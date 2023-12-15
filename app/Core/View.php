<?php
/**
 * Esse classe vai gerenciar as views da nossa aplicação
 */


namespace Core;

class View extends ViewElement
{
    private $template;

    private $template_subtitle = "";
    public function __construct($view, $template = TEMPLATE_DEFAULT, $data = [])
    {
        parent::__construct($view, $data);
        $this->template = $template;
    }
   
    private function createStringRequireTemplate()
    {
        $template = preg_replace("(\.template.php$)",'',$this->template);
        $template = str_replace('.', '/', $template);
        return TEMPLATES_PATH . "/" . $template . ".template.php";
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
        return $this;
    }



    public function show(array $data = [])
    {
        $template = $this->getTemplateConfigs();
        $user = Session::getInstance()->getUserAuth();
        if($user){
            $template['auth_user'] = $user->getPessoa()->nome;
        }
       
        ob_start();
        parent::show($data);
        $view = ob_get_clean();
        require $this->createStringRequireTemplate();
    }
}