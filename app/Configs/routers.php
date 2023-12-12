<?php

use Core\Router;


//rotas do sistema;
Router::get("/", Controllers\Home::class);
Router::get("/404", Controllers\ErrorController::class, 'page404');
Router::get("/500", Controllers\ErrorController::class, 'page500');
Router::get('/login', Controllers\Usuarios\Login::class);
Router::post('/login', Controllers\Usuarios\Login::class,'logar');
//rotas de usuário
Router::get('/usuarios/novo', \Controllers\Usuarios\Cadastro::class);
Router::post('/usuarios/novo', \Controllers\Usuarios\Cadastro::class,'save');
Router::post('/usuarios/buscar', \Controllers\Usuarios\Cadastro::class,'find');



//rotas do negocio
Router::get("/produtos", Controllers\Produtos::class);
Router::get("/produto", Controllers\Produtos::class,'produto');
Router::get("/produto/{id}/novo", Controllers\Produtos::class,'produto');
Router::get("/produto/{id}/{nome_usuario}", Controllers\Produtos::class,'produto');





