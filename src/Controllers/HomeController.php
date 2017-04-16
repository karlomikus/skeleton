<?php
namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $this->getSession()->set('key', 'Session value');

        return $this->json(['Hello world']);
    }

    public function users()
    {
        $users = $this->app['repository.user']->findAll();

        return $this->json($users);
    }

    public function user($request, $response, $arg)
    {
        $userId = $arg['id'];
        $user = $this->app['repository.user']->findById($userId);

        if (!$user) {
            return $this->json(['message' => 'User not found'], 404);
        }

        return $this->json($user);
    }
}
