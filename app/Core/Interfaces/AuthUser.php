<?php

namespace Core\Interfaces;

interface AuthUser{
    public static function  login(string $login, string $senha);

    public function logout();
}