<?php
/**
 * Build a configuration array to pass to `Hybridauth\Hybridauth`
 */
include_once 'git-constants.php';

$config = [
    /**
     * Set the Authorization callback URL to https://path/to/hybridauth/examples/example_06/callback.php.
     * Understandably, you need to replace 'path/to/hybridauth' with the real path to this script.
     */
    'callback' => 'http://localhost/BackEnd-DAW/Practica%205/hybridauth/examples/example_06/callback.php',
    'providers' => [
        'Twitter' => [
            'enabled' => false,
            'keys' => [
                'key' => '...',
                'secret' => '...',
            ],
        ],
        'LinkedIn' => [
            'enabled' => false,
            'keys' => [
                'id' => '...',
                'secret' => '...',
            ],
        ],
        'Github' => [
            'enabled' => true,
            'keys' => [
                'id' => CLIENT_ID,
                'secret' => CLIENT_SECRET,
            ],
        ],
    ],
];
