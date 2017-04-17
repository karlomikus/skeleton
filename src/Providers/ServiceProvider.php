<?php
declare(strict_types = 1);
namespace App\Providers;

use Psr\Container\ContainerInterface;

/**
 * A service provider provides entries to a container.
 */
interface ServiceProvider
{
    /**
     * Returns a list of all container entries registered by this service provider.
     *
     * - the key is the entry name
     * - the value is a callable that will return the entry, aka the **factory**
     *
     * @return callable[]
     */
    public function getServices(): array;
}
