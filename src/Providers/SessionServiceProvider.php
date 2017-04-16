<?php
namespace App\Providers;

use Aura\Session\SessionFactory;
use Psr\Container\ContainerInterface;

class SessionServiceProvider implements ServiceProvider
{
    public function getServices(): array
    {
        return [
            'session' => function (ContainerInterface $container) {
                $sessionFactory = new SessionFactory;
                $session = $sessionFactory->newInstance($_COOKIE);

                return $session;
            }
        ];
    }
}
