<?php

$dotenv = new Dotenv\Dotenv('../');
$dotenv->load();

require 'helpers.php';

$config = require 'config.php';

$app = new App\Application($config);

$app->registerServices();

return $app;
