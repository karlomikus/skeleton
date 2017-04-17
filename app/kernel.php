<?php
declare(strict_types = 1);

$dotenv = new Dotenv\Dotenv('../');
$dotenv->load();

require 'helpers.php';

$config = require 'config.php';

$app = new App\Application($config);

$app->getContainer()['foundHandler'] = function() {
    return new Slim\Handlers\Strategies\RequestResponseArgs();
};

$app->registerServices();

$app->add(new App\Middlewares\ResumeAuthentication($app->getContainer()));

return $app;
