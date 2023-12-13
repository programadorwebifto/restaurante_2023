<?php

namespace Components;

use Core\Action;
use Core\Component;
use Core\Configs;
use Core\Middleware;

class SideBar extends Component
{
    private static $instance;
    private function __construct()
    {
        parent::__construct('sidebar');
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new SideBar();
        }
        return self::$instance;
    }

    private function createMenuItem($label, $link, $icone, $blank,$active)
    {
        $blank = ($blank)?'target="_blank"':'';
        $active = ($active)?' active':'';
        return "<li class='nav-item'>
                    <a href='$link' class='nav-link$active'$blank>
                    <i class='nav-icon $icone'></i>
                    <p>
                        $label
                    </p>
                    </a>
                </li>";
    }

    private function createMenus()
    {
        $html = "";
        foreach (Configs::getConfig('menu') as $menu) {
            $blank = true;
            $active = false;
            if ($menu['link'] instanceof Action) {
                if (!$menu['link']->checkMiddlewares()) {
                    continue;
                }
                $active = $menu['link']->isRunning();
                $blank = false;
            }
            if(array_key_exists('middlewares',$menu)){
                if(!Middleware::checkMiddlewares($menu['middlewares'])){
                    continue;
                }
            }
            $html .= $this->createMenuItem($menu['label'], $menu['link'], $menu['icon'],$blank,$active);
        }
        return $html;
    }

    public function show(array $data = [])
    {
        $data['menu'] = $this->createMenus();
        parent::show($data);
    }
}