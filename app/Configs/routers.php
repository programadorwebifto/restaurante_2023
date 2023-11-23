<?php

use Core\Router;

Router::get("/", Controllers\Home::class);
Router::get("/produtos", Controllers\Produtos::class);