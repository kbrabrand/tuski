<?php

namespace Vaffel\Tuski\Silex\Provider;

use Silex\Application;
use Vaffel\Tuski\Interfaces\StorageServiceInterface;

class TusBuilder
{
    public static function mountProviderIntoApplication($route, Application $app, StorageServiceInterface $storageService, $config = [])
    {
        $app->register(new TusServiceProvider($tokenService));

        $app->mount($route, (new TusControllerProvider($config))->setBaseRoute($route));
    }
}
