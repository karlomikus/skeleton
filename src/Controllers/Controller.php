<?php
namespace App\Controllers;

use App\User\User;
use Slim\Http\Response;
use Aura\Session\Segment;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;

class Controller
{
    protected $app;

    public function __construct(ContainerInterface $app)
    {
        $this->app = $app;
    }

    public function json(array $data, int $status = 200): ResponseInterface
    {
        return (new Response($status))->withJson($data);
    }

    public function getSession(string $segment = 'default'): Segment
    {
        return $this->app['session']->getSegment($segment);
    }

    public function getUser(): ?User
    {
        if ($this->app['auth']->isValid()) {
            return new User($this->app['auth']->getUserData());
        }

        return null;
    }
}
