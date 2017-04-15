<?php

require '../vendor/autoload.php';

$app = require '../app/kernel.php';

require '../app/routes.php';

$app->run();
