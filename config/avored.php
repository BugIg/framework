<?php
/*
  |--------------------------------------------------------------------------
  | AvoRed Cart Products Session Identifier
  |--------------------------------------------------------------------------
 */
return [
    'admin_url' => 'admin',
    'table_prefix' => 'avored_',
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
                'table' => 'admin_password_resets',
                'expire' => 60,
            ],
        ],
    ],
];
