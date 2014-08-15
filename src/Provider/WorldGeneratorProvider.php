<?php

namespace Evo\Provider;

use Cilex\Application;
use Cilex\ServiceProviderInterface;

use Evo\Generator\CreatureGenerator;

class WorldGeneratorProvider implements ServiceProviderInterface {

    public function register(Application $app){
        $app['evo.world.generator'] = $app->share(function() use ($app){
            if (!isset($app['evo_config']['world'])){
                throw new \Exception('Configuratio not set');
            }
            // use setters
            $generator = new WorldGenerator($app['evo_config']['world'], true);

            return $generator;
        });
    }
}

