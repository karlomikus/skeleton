<?php
namespace App;

use Slim\App;
use App\Providers\DatabaseServiceProvider;
use App\Providers\RepositoryServiceProvider;

class Application extends App
{
    private $providers = [
        DatabaseServiceProvider::class,
        RepositoryServiceProvider::class,
    ];

    public function registerServices()
    {
        foreach ($this->providers as $provider) {
            $serviceProvider = new $provider();
            $services = $serviceProvider->getServices();

            foreach ($services as $name => $callable) {
                $this->getContainer()[$name] = $callable;
            }
        }
    }
}
