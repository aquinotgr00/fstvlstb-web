<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'midtrans' => [
        // Midtrans server key
        'serverKey'     => env('MIDTRANS_SERVERKEY'),
        // Midtrans client key
        'clientKey'     => env('MIDTRANS_CLIENTKEY'),
        // Isi false jika masih tahap development dan true jika sudah di production, default false (development)
        'isProduction'  => env('MIDTRANS_IS_PRODUCTION', false),
        'isSanitized'   => env('MIDTRANS_IS_SANITIZED', true),
        'is3ds'         => env('MIDTRANS_IS_3DS', true),                
    ],
    'twitter' =>[
        //key using to access twitter app
        'consumer_key'      => env('twitter_consumer_key','UoPGgarYjxhm6aBBhCnvaRSIC'),
        'consumer_secret'   => env('twitter_consumer_secret','rpieLT3nRHAVBE6xtwBEKAgwvFxSsCvyOzNsgNPmCVUzWTSvEI'),
 
        //url login and callback
        'url_login'         => env('twitter_url_login','https://staging-env.fstvlst.id/twitter/auth'),
        'url_callback'      => env('twitter_url_callback','https://staging-env.fstvlst.id/twitter/callback'),
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID','421539265311963'),         // Your Facebook App Client ID
        'client_secret' => env('FACEBOOK_CLIENT_SECRET','26e590d3b7a7680c90f418672501b6d3'), // Your Facebook App Client Secret
        'redirect' => env('FACEBOOK_REDIRECT','http://localhost:8000/facebook/callback'), // Your application route used to redirect users back to your app after authentication
        'default_graph_version' => 'v3.2',
    ],

];
