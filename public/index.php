<?php
require_once('../app/application.php');
use Core\View;

$tela = new View('produtos.produtos','main');
$tela->show();
