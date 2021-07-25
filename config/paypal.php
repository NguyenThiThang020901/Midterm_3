<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    // 'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    // 'sandbox' => [
    //     'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', ''),
    //     'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', ''),
    //     'app_id'            => 'APP-80W284485P519543T',
    // ],
    // 'live' => [
    //     'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', ''),
    //     'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
    //     'app_id'            => '',
    // ],

    // 'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
    // 'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    // 'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
    // 'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    // 'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
    'client_id' => 'AdH3z6X9pZ8VtUCXo1XTMQe9-ollOuqPcREtBe_jZNRpMoh4naf29FU8FTAG8unZpv_jm_71P8vso0hj',
	'secret' => 'EIB7PuogM4xLp2lNF8eviz9LyH82NvSyuJceD7eTLWiEVwpnnXLgnL_St6eWZMQC_jeXDG32w6FnTyWq',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),
];
