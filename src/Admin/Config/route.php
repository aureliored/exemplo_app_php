<?php
return [
    'get' => [
        [
            'path' => 'admin/',
            'callback' => [
                "Admin\\Controller\\ProductController",
                'indexAction',
            ],
        ],
        [
            'path' => 'admin/produto/',
            'callback' => [
                "Admin\\Controller\\ProductController",
                'getAction',
            ],
        ],
        [
            'path' => 'admin/produto/novo/',
            'callback' => [
                "Admin\\Controller\\ProductController",
                'newAction',
            ],
        ],
        [
            'path' => 'admin/produto/deletar/',
            'callback' => [
                "Admin\\Controller\\ProductController",
                'deleteAction',
            ],
        ],

       
       
    ],
    'post' => [
        [
            'path' => 'admin/produto/',
            'callback' => [
                "Admin\\Controller\\ProductController",
                'saveAction',
            ],
        ],
        [
            'path' => 'admin/produto/editar/',
            'callback' => [
                "Admin\\Controller\\ProductController",
                'editAction',
            ],
        ],
        [
            'path' => 'admin/produto/remove/',
            'callback' => [
                "Admin\\Controller\\ProductController",
                'removeAction',
            ],
        ],
    ],
];