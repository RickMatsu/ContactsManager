<?php

return [
    'custom' => [
        'name' => [
            'required' => 'O nome é obrigatório.',
            'min' => 'O nome deve ter pelo menos :min caracteres.',
        ],

        'contact' => [
            'required' => 'O contato é obrigatório.',
            'digits' => 'O contato deve ter exatamente :digits dígitos.',
        ],

        'email' => [
            'required' => 'O e-mail é obrigatório.',
            'email' => 'Insira um e-mail válido.',
            'unique' => 'Este e-mail já está cadastrado.',
        ],
    ],

    'attributes' => [
        'name' => 'nome',
        'contact' => 'contato',
        'email' => 'e-mail',
    ],
];
