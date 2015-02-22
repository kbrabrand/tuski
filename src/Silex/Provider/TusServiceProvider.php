<?php

namespace Vaffel\Tuski\Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Vaffel\Tuski\Interfaces\StorageServiceInterface;

class TusServiceProvider implements ServiceProviderInterface
{
    const GET_FILE_OFFSET = 'tus.file.offset';

    private $storageService;

    public function __construct(StorageServiceInterface $storageService)
    {
        $this->storageService = $storageService;
    }

    public function register(Application $app)
    {
        $app[self::GET_FILE_OFFSET] = $app->protect(function ($resourceId) {
            return $this->getFileOffset($resourceId);
        });
    }

    public function boot(Application $app)
    {
    }

    private function getFileOffset($resourceId)
    {
        return $this->storageService->getFileOffset($resourceId);
    }
}
