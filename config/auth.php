<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],
    
    'guards' => [
        'web' => [
          'driver' => 'session',
        'provider' => 'users',
        ],
        'api' => [
          'driver' => 'token',
        'provider' => 'users',
        ],
         
        'etudiant' => [

            'driver' => 'session',

            'provider' => 'etudiants',
    ],

        'etudiant-api' => [
           'driver' => 'token',
           'provider' => 'etudiants',
       ],
    ],
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'etudiants' => [

            'driver' => 'eloquent',

            'model' => App\Etudiant::class,

        ]
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'etudiants' => [

            'provider' => 'etudiants',

            'table' => 'password_resets',

            'expire' => 60,

        ],
    ],

];
