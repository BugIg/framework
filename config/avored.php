<?php
/*
  |--------------------------------------------------------------------------
  | AvoRed Cart Products Session Identifier
  |--------------------------------------------------------------------------
 */
$tablePrefix = 'avored_';

return [
    'admin_url' => 'admin',
    'table_prefix' => $tablePrefix,
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
