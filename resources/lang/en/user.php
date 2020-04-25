<?php

return [

    /*
    |--------------------------------------------------------------------------
    | AvoRed E commerce Package CMS Language Representation
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */
    'role' => [
        'title' => 'Role',
        'create-title' => 'Create Role',
        'edit-title' => 'Update Role',
        'form-info' => 'Please provide information about the role.',
        'permission-info' => 'Please select all the permissions attached with this role.',
        'permission' => 'User Permissions'
    ],
    'user-group' => [
        'title' => 'UserGroup',
        'create-title' => 'Create UserGroup',
        'edit-title' => 'Update UserGroup',
        'form-info' => 'Please provide information about the user group.',
        'permission' => 'UserGroup Permissions'
    ],

    'auth' => [
        'login' => [
            'title' => 'Login to your Avored Admin',
            'email' => 'Email Address',
            'password' => 'Password',
            'remember-me' => 'Remember me',
            'forgot-password' => 'Forgot Password',
            'sign-in' => 'Sign In',
        ],
        'reset' => [
            'title' => 'Reset Password',
            'reset-btn' => 'Send Password Reset Link'
        ],
        'update' => [
            'title' => 'Reset your password',
            'email' => 'Email Address',
            'password' => 'Password',
            'confirm-password' => 'Confirm passowrd',
            'reset-btn' => 'Reset Password'
        ],
    ],
];
