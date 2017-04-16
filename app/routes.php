<?php

$app->group('/auth', function () {
    $this->get('/', App\Controllers\AuthController::class . ':status');
    $this->get('/login', App\Controllers\AuthController::class . ':login');
    $this->get('/logout', App\Controllers\AuthController::class . ':logout');
});

$app->group('/users', function () {
    $this->get('/', App\Controllers\HomeController::class . ':index');
    $this->get('/{id:[0-9]+}', App\Controllers\HomeController::class . ':show');
})->add(new App\Middlewares\RedirectIfUnauthenticated($app->getContainer()));
