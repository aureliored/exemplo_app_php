<?php
return [
    'get' => [
        [
            'path' => '',
            'callback' => [
                "Product\\Controller\\ProductController",
                'indexAction',
            ],
        ],
        [
            'path' => 'details/',
            'callback' => [
                "Product\\Controller\\ProductController",
                'detailsAction',
            ],
        ],
       
    ],
    'post' => [
        [
            'path' => 'frete',
            'callback' => [
                "Product\\Controller\\ProductController",
                'getShipmentAction',
            ],
        ],
    ],
];