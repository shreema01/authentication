<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Default guard এবং password broker define করা আছে।
    | Teacher বা অন্য guard থাকলেও default থাকবে 'web'।
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | এখানে সব guard define করা হয়।
    | প্রতিটি guard এর নিজস্ব provider থাকে।
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'teacher' => [
            'driver' => 'session',
            'provider' => 'teachers',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | এখানে define করা হয় কে কোন model/table থেকে user data আনবে।
    | তুমি আলাদা provider ব্যবহার করছো Teachers এর জন্য।
    |
    | Supported drivers: "eloquent", "database"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'teachers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Teacher::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | এখানে প্রতিটি provider এর জন্য আলাদা password reset broker থাকে।
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'teachers' => [
            'provider' => 'teachers',
            'table' => 'teacher_password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Password confirm কত সেকেন্ড পর expire করবে।
    |
    */

    'password_timeout' => 10800,

];
