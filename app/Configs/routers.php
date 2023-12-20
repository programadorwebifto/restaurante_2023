<?php

use Core\Router;


//rotas do sistema;
Router::get("/", Controllers\Home::class)->addMiddleware('auth');
Router::get("/404", Controllers\ErrorController::class, 'page404');
Router::get("/500", Controllers\ErrorController::class, 'page500');
Router::get('/login', Controllers\Usuarios\Login::class)->addMiddleware('noAuth');
Router::get('/logout', Controllers\Usuarios\Login::class,'logout')->addMiddleware('auth');
Router::post('/login', Controllers\Usuarios\Login::class,'logar')->addMiddleware('noAuth');


Router::get('/perfil', Controllers\Usuarios\Perfil::class)->addMiddleware('auth');
Router::post('/perfil', Controllers\Usuarios\Perfil::class,'update')->addMiddleware('auth');
Router::post('/perfil/alterarsenha', Controllers\Usuarios\Perfil::class,'changePassword')->addMiddleware('auth');


//rotas de usuário
Router::get('/usuarios/novo', \Controllers\Usuarios\Cadastro::class);
Router::post('/usuarios/novo', \Controllers\Usuarios\Cadastro::class,'save');
Router::post('/usuarios/buscar', \Controllers\Usuarios\Cadastro::class,'find');



//rotas do negocio
Router::get("/produtos", Controllers\Produtos::class)->addMiddleware('auth');
Router::post('/produtos/disponivel', Controllers\Produtos::class, 'disponivel')->addMiddleware('auth');
Router::get("/produtos/novo", Controllers\Produtos::class,'novo')->addMiddleware('auth');
Router::get('/produto/{id}', Controllers\Produtos::class, 'edit')->addMiddleware('auth');
Router::post('/produto', Controllers\Produtos::class, 'update')->addMiddleware('auth');





