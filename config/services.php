<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun'      => [
        'domain'   => env('MAILGUN_DOMAIN'),
        'secret'   => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme'   => 'https',
    ],

    'postmark'     => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses'          => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'paytm-wallet' => [
        'env'              => 'local', // values : (local | production)
        'merchant_id'      => setting('merchant_id'),
        'merchant_key'     => setting('merchant_key'),
        'merchant_website' => setting('merchant_website'),
        'channel'          => setting('channel'),
        'industry_type'    => setting('industry_type'),
    ],
    'heygen' => [
        'api_key' => env('HEYGEN_API_KEY', 'NTc3N2JiYmYyZTA5NDg5OGI3ODMxZDliY2Y3MWFlODUtMTczNDI4ODU5Ng=='),
        'avatar_id' => env('HEYGEN_AVATAR_ID', 'Elenora_IT_Sitting_public'),
    ],

];
