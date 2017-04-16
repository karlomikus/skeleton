<?php
namespace App\Controllers;

use Exception;

class AuthController extends Controller
{
    public function status()
    {
        return $this->json(['status' => $this->app['auth']->getStatus()]);
    }

    public function login($request)
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

    public function logout()
    {
        $this->app['logout_service']->logout($this->app['auth']);

        return $this->json(['status' => $this->app['auth']->getStatus()]);
    }
}
