<?php

require_once('../app/application.php');
use Core\Request;

Request::getInstance()->getAction()->run();







