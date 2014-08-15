<?php

namespace Evo\Provider;

use Cilex\Application;
use Cilex\ServiceProviderInterface;

use Evo\Generator\CreatureGenerator;

class CreatureGeneratorProvider implements ServiceProviderInterface {

    public function register(Application $app){

        $app['evo.creature.generator'] = $app->share(function() use ($app) {
            if (!isset($app['evo_config']['creature'])){
                throw new \Exception('Configuration not set');
            }
            // use setters
            $config = $app['evo_config']['creature'];
            $generator = new CreatureGenerator($config, true);

            $generator->setPointLimit(isset($config['point_limit']) ? $config['point_limit'] : 20);

            return $generator;
        });
    }
}

