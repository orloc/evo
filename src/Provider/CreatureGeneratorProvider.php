<?php

namespace Evo\Provider;

use Cilex\Application;
use Cilex\ServiceProviderInterface;

use Evo\Generator\CreatureGenerator;

class CreatureGeneratorProvider implements ServiceProviderInterface {

    public function register(Application $app){
        $app['evo']['creature.generator'] = $app->share(function() use ($app) {
            if (!isset($app['evo_config']['creature'])){
                throw new \Exception('Configuratio not set');
            }
            // use setters
            $generator = new CreatureGenerator($app['evo_config']['creature'], true);

            return $generator;
        });
    }

}

