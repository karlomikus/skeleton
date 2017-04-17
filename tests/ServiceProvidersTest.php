<?php
namespace Tests;

use App\User\UserRepository;
use PHPUnit\Framework\TestCase;
use App\Providers\AuthServiceProvider;
use App\Providers\SessionServiceProvider;
use App\Providers\DatabaseServiceProvider;
use App\Providers\RepositoryServiceProvider;

class ServiceProvidersTest extends TestCase
{
    public function testDatabaseServiceProvider()
    {
        $services = (new DatabaseServiceProvider())->getServices();

        $this->assertEquals(['db'], array_keys($services));
    }

    public function testAuthenticationServiceProvider()
    {
        $services = (new AuthServiceProvider())->getServices();

        $this->assertEquals([
            'auth_factory',
            'auth',
            'auth_pdo_adapter',
            'login_service',
            'resume_service',
            'logout_service'
        ], array_keys($services));
    }

    public function testRepositoryServiceProvider()
    {
        $services = (new RepositoryServiceProvider())->getServices();

        $this->assertEquals(['repository.user'], array_keys($services));
    }

    public function testSessionServiceProvider()
    {
        $services = (new SessionServiceProvider())->getServices();

        $this->assertEquals(['session'], array_keys($services));
    }
}
