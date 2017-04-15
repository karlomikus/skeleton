<?php
namespace App\Controllers;

use Slim\Http\Response;
use Psr\Container\ContainerInterface;

class Controller
{
    protected $app;

    public function __construct(ContainerInterface $app)
    {
        $this->app = $app;
    }

    public function json($data, $status = 200)
    {
        return (new Response($status))->withJson($data);
    }
}
