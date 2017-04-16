<?php
namespace App\Middlewares;

use Slim\Http\Response;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Try to resume authentication
 */
class ResumeAuthentication
{
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, callable $next): ResponseInterface
    {
        $this->container['resume_service']->resume($this->container['auth']);

        return $next($request, $response);
    }
}
