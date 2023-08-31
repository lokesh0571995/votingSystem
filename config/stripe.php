<?php
use Illuminate\Support\Str;
return [
    'api_keys' => [
        'secret_key' => env('STRIPE_SECRET_KEY', null)
    ]
];