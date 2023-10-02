<?php

return [
    'roles' => [
        'user' => 'user_role',
        'admin' => 'admin_role'
    ],
    'messages' => [
        'auth' => [
            'login_success' => 'You have successfully logged in',
            'login_fail' => 'invalid credentials',
            'register_success' => 'You have registered successfully, please wait for admin confirmation',
            'logout_success' => 'You have logged out successfully'
        ],
        'users' => [
            'user_activation_success' => 'user account activated successfully',
            'user_deactivation_success' => 'user account deactivated successfully',
            'user_activation_needed' => 'please wait until one of ore admins activate your account'
        ],
        'adds' => [
            'add_deletion_success' => 'add deleted successfully',
            'add_updated_success' => 'add updated successfully',
            'add_added_success' => 'add added successfully'
        ],
        'comments' => [
            'comment_success' => 'comment added successfully'
        ]
    ]
];
