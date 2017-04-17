<?php
declare(strict_types = 1);
namespace App\Providers;

use PDO;
use Psr\Container\ContainerInterface;

class DatabaseServiceProvider implements ServiceProvider
{
    public function getServices(): array
    {
        return [
            'db' => function (ContainerInterface $container) {
                $config = $container['settings']['db'];

                $pdo = new PDO($config['driver'] . ':dbname='. $config['name'] .';host=' . $config['host'], $config['user'], $config['pass']);

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

                return $pdo;
            }
        ];
    }
}
