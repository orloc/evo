<?php

namespace Evo\Generator;

class CreatureGenerator extends AbstractGenerator implements GeneratorInterface {

    protected $point_total;

    public function getName(){
        return '\Evo\Model\Creature';
    }

    public function getComputedValue(array $config, $property){
        var_dump($config);
    }
}
