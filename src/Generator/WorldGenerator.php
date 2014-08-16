<?php

namespace Evo\Generator;

use Evo\Model;

class WorldGenerator extends AbstractGenerator implements GeneratorInterface {

    public function getName(){
        return '\Evo\Model\World';
    }

    public function getComputedValue(array $config, $property) {
        return isset($config[$property]) ? $config[$property] : 0;
    }
}
