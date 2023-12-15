<?php

namespace Components;

use Core\FlashMessage;

class ToastsAlert
{
    private static $session_key = '__Toasts_Alert__';
    private function __construct()
    {
    }
    public static function addAlertInfo($body, $title = 'Informação')
    {
        self::addAlert($body, $title, 'info', 'info-circle');
    }
    public static function addAlertWarning($body, $title = 'Alerta')
    {
        self::addAlert($body, $title, 'warning', 'exclamation-triangle');
    }
    public static function addAlertError($body, $title = 'Erro')
    {
        self::addAlert($body, $title, 'danger', 'exclamation-circle');
    }
    public static function addAlertSuccess($body, $title = 'Sucesso')
    {
        self::addAlert($body, $title, 'success', 'check');
    }

    private static function addAlert($body, $title, $type, $icon)
    {
        $alert = new FlashMessage(self::$session_key);
        $data = [
            'body' => $body,
            'title' => $title,
            'type' => $type,
            'icon' => $icon
        ];
        $alert->addMessage($data);
    }

    public static function show()
    {
        $alert = new FlashMessage(self::$session_key);
        $alerts = $alert->flushMessages();
        if (count($alerts)) {
            echo '<script>';
            foreach ($alerts as $alert) {
                echo " $(document).Toasts('create', {
                            body: '{$alert['body']}',
                            title:'{$alert['title']}',
                            class: 'bg-{$alert['type']}',
                            icon: 'fas fa-{$alert['icon']} fa-lg',});\n";
            }
            echo '</script>';

        }
    }
}