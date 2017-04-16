<?php
namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $users = $this->app['repository.user']->findAll();

        return $this->json($users);
    }

    public function show($request, $response, $arg)
    {
        $userId = $arg['id'];
        $user = $this->app['repository.user']->findById($userId);

        if (!$user) {
            return $this->json(['message' => 'User not found'], 404);
        }

        return $this->json($user);
    }
}
