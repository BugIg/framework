<?php
/*
  |--------------------------------------------------------------------------
  | AvoRed Cart Products Session Identifier
  |--------------------------------------------------------------------------
 */
$tablePrefix = 'avored_';

return [
    'front_url' => 'avored',
    'admin_url' => 'admin',
    'table_prefix' => $tablePrefix,
    'graphql' => [
        'schema' => [
            'register' => __DIR__ . '/../graphql/schema.graphql'
        ],
        'namespaces' => [
            'models' => ['App', 'App\\Models', 'AvoRed\\Framework\\Catalog\\Models'],
            'queries' => 'App\\GraphQL\\Queries',
            'mutations' => 'App\\GraphQL\\Mutations',
            'subscriptions' => 'App\\GraphQL\\Subscriptions',
            'interfaces' => 'App\\GraphQL\\Interfaces',
            'unions' => 'App\\GraphQL\\Unions',
            'scalars' => 'App\\GraphQL\\Scalars',
            'directives' => ['App\\GraphQL\\Directives'],
        ],

    ],
    'auth' => [
        'guards' => [
            'admin' => [
                'driver' => 'session',
                'provider' => 'admin-users',
            ],
            'admin_api' => [
                'driver' => 'passport',
                'provider' => 'admin-users',
                'hash' => false,
            ],
        ],

        'providers' => [
            'admin-users' => [
                'driver' => 'eloquent',
                'model' => AvoRed\Framework\User\Models\AdminUser::class,
            ],
        ],

        'passwords' => [
            'adminusers' => [
                'provider' => 'admin-users',
                'table' => $tablePrefix . 'admin_password_resets',
                'expire' => 60,
            ],
        ],
    ],
];
