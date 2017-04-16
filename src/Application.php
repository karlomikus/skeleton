<?php
namespace App;

use Slim\App;
use App\Providers\AuthServiceProvider;
use App\Providers\SessionServiceProvider;
use App\Providers\DatabaseServiceProvider;
use App\Providers\RepositoryServiceProvider;

/**
 * Application
 */
class Application extends App
{
    /**
     * Service providers
     *
     * @var array
     */
    private $providers = [
        SessionServiceProvider::class,
        DatabaseServiceProvider::class,
        RepositoryServiceProvider::class,
        AuthServiceProvider::class,
    ];

    /**
     * Register all services
     *
     * @return void
     */
    public function registerServices(): void
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
