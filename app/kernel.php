<?php

$dotenv = new Dotenv\Dotenv('../');
$dotenv->load();

require 'helpers.php';

$config = require 'config.php';

$app = new App\Application($config);

$app->registerServices();

$app->add(new App\Middlewares\ResumeAuthentication($app->getContainer()));

return $app;
