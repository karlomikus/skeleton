<?php

$app->get('/', App\Controllers\HomeController::class . ':index');
$app->get('/users', App\Controllers\HomeController::class . ':users');
