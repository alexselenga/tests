<?php

require dirname(__DIR__) . '/vendor/autoload.php';

$params = [
    'db' => [
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'dbname' => 'quizer',
    ],
];

$app = new box\Box($params);
$app->run();
