<?php
namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return $this->json(['Hello world']);
    }
}
