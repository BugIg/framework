<?php

return [

    /*
    |--------------------------------------------------------------------------
    | AvoRed E commerce Package System Language Representation
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */

    'language' => [
        'title' => 'Language',
        'create-title' => 'Create Language',
        'edit-title' => 'Update Language',
        'form-info' => 'Please provide information about the language.',
        'basic-info' => 'Basic Information',
    ],
    'currency' => [
        'title' => 'Currency',
        'create-title' => 'Create Currency',
        'edit-title' => 'Update Currency',
        'form-info' => 'Please provide information about the currency.',
        'basic-info' => 'Basic Information',
    ],

    'configuration' => [
        'general' => [
            'form-info' => 'Please provide information about the general site information.',
            'basic-info' => 'Basic Information',
        ],
    ],

    'comms' => [
        'basic-info' => 'Basic Information',
        'identifier' => 'Identifier',
        'is_default' => 'Is Default',
        'options' => 'Options',
        'display_as' => 'Display as',
        'data_type' => 'Data Type',
        'field_type' => 'Field Type',
        'use_for_all_products' => 'Use for all products',
        'use_for_category_filter' => 'Use for category filter',
        'is_visible_frontend' => 'Is Visible Frontend',
        'sort_order' => 'Sort Order',
        'symbol' => 'Symbol',
        'conversation_rate' => 'Conversation Rate',
        'status' => 'Status',
        'id' => 'ID',
        'name' => 'Name',
        'role_id' => 'Role',
        'language' => 'Language',
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
        'code' => 'Code',
        'is_default' => 'Is Default',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'Email',
        'content' => 'Content',
        'slug' => 'Slug',
        'description' => 'Description',
        'meta-title' => 'Meta Title',
        'meta-description' => 'Meta Description',
        'action' => 'Action',
        'create' => 'Create',
        'save' => 'Save',
        'edit' => 'Edit',
        'destroy' => 'Delete',
        'previous' => 'Previous',
        'next' => 'Next',
        'cancel' => 'Cancel',
        'paginator-info' => 'Showing <span class="font-medium">1</span> to<span class="font-medium"> :perPage</span> of<span class="font-medium"> :total</span> results',
        'create-title' => 'Create :attribute',
        'edit-title' => 'Edit :attribute',
        'title' => ':attribute',
        'general_site_name' => 'Site Name'
    ],

    'terms' => [
        'menu' => 'Menu',
        'configuration' => 'Configuration'
    ],
    'dashboard' => [
        'title' => 'Dashboard'
    ],
    'admin-menus' => [
        'logout' => 'Logout',
        'dashboard' => 'Dashboard',
        'category' => 'Category',
        'admin-user' => 'Staff',
        'attribute' => 'Attribute',
        'catalog' => 'Catalog',
        'category' => 'Category',
        'currency' => 'Currency',
        'cms' => 'CMS',
        'menu' => 'Menu',
        'configuration' => 'Configuration',
        'language' => 'Language',
        'order' => 'Order',
        'order-status' => 'Order Status',
        'page' => 'Page',
        'product' => 'Product',
        'property' => 'Product Property',
        'role' => 'Role',
        'system' => 'System',
        'state' => 'State',
        'user' => 'User',
        'user-group' => 'User Group',
        'tax-group' => 'Tax Group',
        'tax-rate' => 'Tax Rate',
    ],

    'failed' => 'These credentials do not match our records.',
    'password' => 'Passwords must be at least eight characters and match the confirmation.',
    'reset' => 'Your password has been reset!',
    'sent' => 'We have e-mailed your password reset link!',
    'token' => 'This password reset token is invalid.',
    'user' => "We can't find a user with that e-mail address.",
    'empty_table' => 'Sorry there is no data to display. Please Click create to add more',

    'password' => 'Password',
    'email' => 'Email Address',
    'login-card' => 'AvoRed E commerce Admin Login',
    'login' => 'Login',
    'forget-password' => 'Forgot your password?',
    'notification' => [
        'store' => ':attribute Created successfully!',
        'updated' => ':attribute Updated successfully!',
        'delete' => ':attribute delete successfully!',
        'upload' => ':attribute successfully uploaded!',
        'save' => ':attribute save successfully!',
    ],
    'btn' => [
        'save' => 'Save',
        'cancel' => 'Cancel',
        'create' => 'Create'
    ],
    'admin-user' => [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'is_super_admin' => 'Is Administrator?',
        'email' => 'Email Address',
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
        'role_id' => 'Role',
        'language' => 'Language',
        'image_file' => 'Admin User Profile Image',
        'index' => [
            'title' => 'Admin User List'
        ],
        'create' => [
            'title' => 'Admin User Create'
        ],
        'edit' => [
            'title' => 'Admin User Edit'
        ],
    ],

    'permissions' => [
        'dashboard' => 'Dashboard',
        'page' => [
            'title' => 'Page Permissions',
            'list' => 'Page List',
            'create' => 'Create/Store Page',
            'edit' => 'Edit/Update Page',
            'destroy' => 'Destroy Page',
            'show' => 'Show Page'
        ],
        'category' => [
            'title' => 'Category Permissions',
            'list' => 'Category List',
            'create' => 'Create/Store Category',
            'edit' => 'Edit/Update Category',
            'destroy' => 'Destroy Category',
            'show' => 'Show Category'
        ],
        'tax-rate' => [
            'title' => 'Tax Rate Permissions',
            'list' => 'Tax Rate List',
            'create' => 'Create/Store Tax Rate',
            'edit' => 'Edit/Update Tax Rate',
            'destroy' => 'Destroy Tax Rate',
            'show' => 'Show Tax Rate'
        ],
        'language' => [
            'title' => 'Language Permissions',
            'list' => 'Language List',
            'create' => 'Create/Store Language',
            'edit' => 'Edit/Update Language',
            'destroy' => 'Destroy Language',
            'show' => 'Show Language'
        ],
        'product' => [
            'title' => 'Product Permissions',
            'list' => 'Product List',
            'create' => 'Create/Store Product',
            'edit' => 'Edit/Update Product',
            'destroy' => 'Destroy Product',
            'show' => 'Show Product'
        ],
        'attribute' => [
            'title' => 'Attribute Permissions',
            'list' => 'Attribute List',
            'create' => 'Create/Store Attribute',
            'edit' => 'Edit/Update Attribute',
            'destroy' => 'Destroy Attribute',
            'show' => 'Show Attribute'
        ],
        'property' => [
            'title' => 'Property Permissions',
            'list' => 'Property List',
            'create' => 'Create/Store Property',
            'edit' => 'Edit/Update Property',
            'destroy' => 'Destroy Property',
            'show' => 'Show Property'
        ],
        'user' => [
            'title' => 'User Permissions',
            'list' => 'User List',
            'create' => 'Create/Store User',
            'edit' => 'Edit/Update User',
            'destroy' => 'Destroy User',
            'show' => 'Show User'
        ],
        'user-group' => [
            'title' => 'User Group Permissions',
            'list' => 'User Group List',
            'create' => 'Create/Store User Group',
            'edit' => 'Edit/Update User Group',
            'destroy' => 'Destroy User Group',
            'show' => 'Show User Group'
        ],
        'admin_user' => [
            'title' => 'Admin User Permissions',
            'list' => 'Admin User List',
            'create' => 'Create/Store Admin User',
            'edit' => 'Edit/Update Admin User',
            'destroy' => 'Destroy Admin User',
            'show' => 'Show Admin User'
        ],
        'role' => [
            'title' => 'Role Permissions',
            'list' => 'Role List',
            'create' => 'Create/Store Role',
            'edit' => 'Edit/Update Role',
            'destroy' => 'Destroy Role',
            'show' => 'Show Role'
        ],
        'configuration' => [
            'title' => 'Configuration Permissions',
            'view' => 'View Configuration',
            'edit' => 'Store/Update Configuration',
        ],
        'currency' => [
            'title' => 'Site Currency Permissions',
            'list' => 'Site Currency List',
            'create' => 'Create/Store Site Currency',
            'edit' => 'Edit/Update Site Currency',
            'destroy' => 'Destroy Site Currency',
            'show' => 'Show Site Currency'
        ],
        'country' => [
            'title' => 'Country Permissions',
            'list' => 'Country List',
            'create' => 'Create/Store Country',
            'edit' => 'Edit/Update Country',
            'destroy' => 'Destroy Country',
            'show' => 'Show Country'
        ],
        'state' => [
            'title' => 'State Permissions',
            'list' => 'State List',
            'create' => 'Create/Store State',
            'edit' => 'Edit/Update State',
            'destroy' => 'Destroy State',
            'show' => 'Show State'
        ],
        'theme' => [
            'title' => 'Theme Permissions',
            'list' => 'Theme List Permissions',
            'create' => 'Store/Upload Theme Permissions',
            'activated' => 'Activated Theme Permissions',
            'deactivated' => 'Deactivated Theme Permissions',
        ],
        'module' => [
            'title' => 'Module Permissions',
            'list' => 'Module List Permissions',
            'upload' => 'Module Upload Permissions',
        ],
        'order' => [
            'title' => 'Menu Permissions',
            'list' => 'Order List',
            'view' => 'Order View',
            'sent_invoice_by_mail' => 'Order Sent Invoice By Email',
            'status_change' => 'Change Order Status'
        ],
        'order-status' => [
            'title' => 'Order Status Permissions',
            'list' => 'Order Status List',
            'create' => 'Create/Store Order Status',
            'edit' => 'Edit/Update Order Status',
            'destroy' => 'Destroy Order Status',
            'show' => 'Show Order Status'
        ],
        'menu' => [
            'title' => 'Menu Permissions',
            'front' => 'Front Menu Index',
            'save' => 'Save Front Menu',
        ],
    ],

    'breadcrumb' => [
        'dashboard' => 'Dashboard',
        'configuration' => 'Configuration',
        'category' => [
            'index' => 'Category',
            'edit' => 'Edit Category',
            'create' => 'Create Category',
        ],
        'tax-group' => [
            'index' => 'Tax Group',
            'edit' => 'Edit Tax Group',
            'create' => 'Create Tax Group',
        ],
        'tax-rate' => [
            'index' => 'Tax Rate',
            'edit' => 'Edit Tax Rate',
            'create' => 'Create Tax Rate',
        ],
        'user-group' => [
            'index' => 'User Group',
            'edit' => 'Edit User Group',
            'create' => 'Create User Group',
        ],
        'attribute' => [
            'index' => 'Attribute',
            'edit' => 'Edit Attribute',
            'create' => 'Create Attribute',
        ],
        'property' => [
            'index' => 'Property',
            'edit' => 'Edit Property',
            'create' => 'Create Property',
        ],
        'order-status' => [
            'index' => 'Status',
            'edit' => 'Edit Status',
            'create' => 'Create Status',
        ],
        'currency' => [
            'index' => 'Currency',
            'edit' => 'Edit Currency',
            'create' => 'Create Currency',
        ],
        'state' => [
            'index' => 'State',
            'edit' => 'Edit State',
            'create' => 'Create State',
        ],
        'admin-user' => [
            'index' => 'AdminUser',
            'edit' => 'Edit AdminUser',
            'create' => 'Create AdminUser',
        ],
        'language' => [
            'index' => 'Language',
            'edit' => 'Edit Language',
            'create' => 'Create Language',
        ],
        'page' => [
            'index' => 'Page',
            'edit' => 'Edit Page',
            'create' => 'Create Page',
        ],
        'role' => [
            'index' => 'Role',
            'edit' => 'Edit Role',
            'create' => 'Create Role',
        ],
    ]

];
