<?php
namespace App\Providers;

use Aura\Auth\AuthFactory;
use Psr\Container\ContainerInterface;
use Aura\Auth\Verifier\PasswordVerifier;

class AuthServiceProvider implements ServiceProvider
{
    public function getServices(): array
    {
        return [
            'auth_factory' => function (ContainerInterface $container) {
                return new AuthFactory($_COOKIE);
            },

            'auth' => function (ContainerInterface $container) {
                return $container['auth_factory']->newInstance();
            },

            'auth_pdo_adapter' => function (ContainerInterface $container) {
                $verifier = new PasswordVerifier(PASSWORD_BCRYPT);
                $cols = ['user.email', 'user.password', 'user.name AS name', 'user.last_name AS lastName'];
                $table = 'user';

                $pdoAdapter = $container['auth_factory']->newPdoAdapter(
                    $container['db'],
                    $verifier,
                    $cols,
                    $table
                );

                return $pdoAdapter;
            },

            'login_service' => function (ContainerInterface $container) {
                return $container['auth_factory']->newLoginService($container['auth_pdo_adapter']);
            },

            'resume_service' => function (ContainerInterface $container) {
                return $container['auth_factory']->newResumeService($container['auth_pdo_adapter']);
            },

            'logout_service' => function (ContainerInterface $container) {
                return $container['auth_factory']->newLogoutService($container['auth_pdo_adapter']);
            }
        ];
    }
}
