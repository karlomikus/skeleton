<?php

require 'helpers.php';

$config = require 'config.php';

$app = new App\Application($config);

return $app;
