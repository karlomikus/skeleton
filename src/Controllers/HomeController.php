<?php
namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return $this->json(['Hello world']);
    }

    public function users()
    {
        $users = $this->app['repository.user']->findAll();

        return $this->json((array) $users);
    }
}
