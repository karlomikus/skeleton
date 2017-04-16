<?php
namespace App\Middlewares;

use Slim\Http\Response;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RedirectIfUnauthenticated
{
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $next): ResponseInterface
    {
        $auth = $this->container['auth'];

        if (!$auth->isValid()) {
            return $response->withStatus(302)->withHeader('Location', '/auth/');
        }

        return $next($request, $response);
    }
}
