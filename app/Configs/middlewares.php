<?php

return [
    'auth' => \Middlewares\Authenticate::class,
    'noAuth'=> \Middlewares\NoAuthenticate::class,
    'development'=> \Middlewares\Development::class,
];