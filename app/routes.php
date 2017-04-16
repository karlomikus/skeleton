<?php

$app->get('/', function ($request, $response) {
    dump($this['auth']);
    dump(new App\User\User($this['auth']->getUserData()));
    dump($this['session']);
    dump($this['db']);
});

$app->group('/auth', function () {
    $this->get('/', App\Controllers\AuthController::class . ':status');
    $this->get('/login', App\Controllers\AuthController::class . ':login');
    $this->get('/logout', App\Controllers\AuthController::class . ':logout');
});

$app->group('/users', function () {
    $this->get('/', App\Controllers\HomeController::class . ':index');
    $this->get('/{id:[0-9]+}', App\Controllers\HomeController::class . ':show');
})->add(new App\Middlewares\RedirectIfUnauthenticated($app->getContainer()));
