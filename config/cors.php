<?php

return [

'paths' => ['api/*', 'sanctum/csrf-cookie'],

'allowed_methods' => ['*'], // Allow all methods (GET, POST, PUT, DELETE, etc.)

'allowed_origins' => ['*'], // Allow requests from any domain

'allowed_origins_patterns' => [],

'allowed_headers' => ['*'], // Allow all headers

'exposed_headers' => [],

'max_age' => 0,

'supports_credentials' => false,

];
