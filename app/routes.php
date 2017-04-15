<?php

$app->get('/', App\Controllers\HomeController::class . ':index');
$app->get('/users', App\Controllers\HomeController::class . ':users');
$app->get('/users/{id:[0-9]+}', App\Controllers\HomeController::class . ':user');
