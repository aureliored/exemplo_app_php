<?php
return [
    'module' => [
        'Product',
        'Admin',
    ],
    'template' => [
        'path' => __APP_ROOT__ . '\\src\\Application\\View\\template',
        'default' => 'default.php',
    ],
    'api' => [
        'default' => [
            'host' => 'http://localhost/exemplo_api_php/',
        ],
        'correios' => [
            'host' => 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx',
            'parameters' => '?nCdEmpresa=&sDsSenha=&sCepOrigem=20081902&sCepDestino=[postcode]&nVlPeso=[weight]&nCdFormato=1&nVlComprimento=[length]&nVlAltura=[height]&nVlLargura=[width]&sCdMaoPropria=n&nVlValorDeclarado=[value]&sCdAvisoRecebimento=n&nCdServico=[method]&nVlDiametro=0&StrRetorno=xml',
            'method' => [
                'PAC' => 41106,
                'SEDEX' => 40010,
                'SEDEX 10' => 40215,
                'SEDEX A COBRAR' => 40045,
            ],
        ],
    ]
];