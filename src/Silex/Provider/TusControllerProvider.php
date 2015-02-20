<?php

namespace Vaffel\Tuski\Silex\Provider;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Silex\ControllerProviderInterface;
use Silex\Application;

class TusControllerProvider implements ControllerProviderInterface
{
    public function setBaseRoute($baseRoute)
    {
        $this->baseRoute = $baseRoute;

        return $this;
    }

    public function connect(Application $app)
    {
        return $this->extractControllers($app);
    }

    private function extractControllers(Application $app)
    {
        $controllers = $app['controllers_factory'];

        // HEAD request for checking file upload status
        $controllers->head('/{resourceId}', function (Request $req, $resourceId) use ($app) {
            $fileStatus = $app[TusServiceProvider::GET_FILE_STATUS]($resourceId);

            if (!$fileStatus) {
                return new Response('Not Found', 404);
            }

            return new Response('', 200, ['Offset' => 1337])
        });

        return $controllers;
    }
}
