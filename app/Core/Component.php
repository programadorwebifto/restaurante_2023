<?php

namespace Core;

class Component extends ViewElement{
    protected function createStringRequireView()
    {
        $view = preg_replace("(\.view.php$)", '', $this->view);
        $view = str_replace('.', '/', $view);
        return COMPONENTS_PATH . "/" . $view . ".view.php";
    }
}