<?php

use Core\Router;

Router::get("/", Controllers\Home::class);
Router::get("/produtos", Controllers\Produtos::class);
Router::get("/produto/{id}/{nome_usuario}", Controllers\Produtos::class,'produto');


