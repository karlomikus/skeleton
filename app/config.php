<?php
declare(strict_types = 1);

return [
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => getenv('DB_HOST'),
            'user' => getenv('DB_USER'),
            'pass' => getenv('DB_PASS'),
            'name' => getenv('DB_NAME'),
        ]
    ],
];
