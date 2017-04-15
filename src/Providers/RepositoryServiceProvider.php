<?php
namespace App\Providers;

use App\User\UserRepository;
use Psr\Container\ContainerInterface;

class RepositoryServiceProvider implements ServiceProvider
{
    public function getServices()
    {
        return [
            'repository.user' => function (ContainerInterface $container) {
                return new UserRepository($container['db']);
            }
        ];
    }
}