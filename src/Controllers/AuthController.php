<?php
declare(strict_types = 1);
namespace App\Controllers;

use Exception;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class AuthController extends Controller
{
    public function status(): ResponseInterface
    {
        return $this->json(['status' => $this->app['auth']->getStatus()]);
    }

    public function login(RequestInterface $request): ResponseInterface
    {
        $email = $request->getQueryParams()['email'];
        $pass = $request->getQueryParams()['pass'];

        try {
            $this->app['login_service']->login($this->app['auth'], [
                'username' => $email,
                'password' => $pass
            ]);
        } catch (Exception $e) {
            return $this->json(['message' => 'Login failed']);
        }

        return $this->json(['status' => $this->app['auth']->getStatus()]);
    }

    public function logout(): ResponseInterface
    {
        $this->app['logout_service']->logout($this->app['auth']);

        return $this->json(['status' => $this->app['auth']->getStatus()]);
    }
}
