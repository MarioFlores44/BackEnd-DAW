<?php

require_once '../MODEL/model.php';
require_once '../CONTROLADOR/session.php';
include_once '../hybridauth/src/autoload.php';
require_once 'git-constants.php';

$config = [
    'callback' => 'http://localhost/BackEnd-DAW/Practica%205/CONTROLADOR/modificar.php',

    'keys' => ['id' => CLIENT_ID, 'secret' => CLIENT_SECRET],
];

try {
    $adapter = new Hybridauth\Provider\Github($config);

    $adapter->authenticate();

    $tokens = $adapter->getAccessToken();
    $userProfile = $adapter->getUserProfile();

    // print_r($tokens);
    // print_r($userProfile);
    crearUsuarioGitHub($userProfile->email, $token);

    $adapter->disconnect();
} catch (Exception $e) {
    echo $e->getMessage();
}


?>