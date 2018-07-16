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
       
       
    ],
    'post' => [
        [
            'path' => 'admin/produto/',
            'callback' => [
                "Admin\\Controller\\ProductController",
                'saveAction',
            ],
        ],
    ],
    'put' => [
        [
            'path' => 'admin/produto/',
            'callback' => [
                "Admin\\Controller\\ProductController",
                'editAction',
            ],
        ],
    ],
    'delete' => [
        [
            'path' => 'admin/produto/',
            'callback' => [
                "Admin\\Controller\\ProductController",
                'deleteAction',
            ],
        ],
    ],
];