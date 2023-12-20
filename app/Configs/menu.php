<?php

return
    [
        [
            'label' => 'Mesas',
            'link' => action(\Controllers\Home::class),
            'icon' => 'fas fa-utensils'
        ],

        [
            'label' => 'Ícones',
            'link' => 'https://fontawesome.com/v5/search?o=r&m=free',
            'icon' => 'fas fa-flag',
            'middlewares' => ['development'],
        ],
        [
            'label' => 'Produtos',
            'link' => action(\Controllers\Produtos::class),
            'icon' => 'fas fa-shopping-cart',
        ],
    ];