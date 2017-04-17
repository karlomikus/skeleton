<?php
declare(strict_types = 1);
namespace App\Controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function index(): ResponseInterface
    {
        $users = $this->app['repository.user']->findAll();

        return $this->json($users);
    }

    public function show(RequestInterface $request, ResponseInterface $response, int $id): ResponseInterface
    {
        $user = $this->app['repository.user']->findById($id);

        if (!$user) {
            return $this->json(['message' => 'User not found'], 404);
        }

        return $this->json((array) $user);
    }
}
