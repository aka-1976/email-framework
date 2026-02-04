<?php

return [
    'default' => env('EMAIL_TRANSPORT', 'smtp'),
    
    'transports' => [
        'smtp' => [
            'host' => env('EMAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('EMAIL_PORT', 587),
            'username' => env('EMAIL_USERNAME'),
            'password' => env('EMAIL_PASSWORD'),
            'encryption' => env('EMAIL_ENCRYPTION', 'tls'),
            'timeout' => 30,
        ],
        
        'mailgun' => [
            'domain' => env('MAILGUN_DOMAIN'),
            'secret' => env('MAILGUN_SECRET'),
            'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        ],
        
        'ses' => [
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'version' => 'latest',
        ],
    ],
    
    'queue' => [
        'driver' => env('EMAIL_QUEUE_DRIVER', 'sync'),
        'connection' => env('EMAIL_QUEUE_CONNECTION', 'default'),
    ],
    
    'templates' => [
        'driver' => env('EMAIL_TEMPLATE_DRIVER', 'blade'),
        'paths' => [
            resource_path('views/emails'),
        ],
    ],
    
    'from' => [
        'address' => env('EMAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('EMAIL_FROM_NAME', 'Example'),
    ],
];
