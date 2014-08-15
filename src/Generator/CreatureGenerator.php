<?php

namespace Evo\Generator;

use Evo\Model\Creatrue;

class CreatureGenerator extends AbstractGenerator implements GeneratorInterface {

    protected $point_total;

    public function getName(){
        return '\Evo\Model\Creature';
    }

    public function getComputedValue(array $config, $property){
        $creature = $this->getEntity();

        if ($creature->hasExtraPoints()){
            $newPoints =  $this->calculatePoints($config);
        }



    }

    protected function balancePoints(Creature $entity, $property){
        $valid_keys = [
            'strength',
            'constitution',
            'speed'
        ];

        if (in_array($property, $valid_keys)){
            unset($valid_keys[$property]);

        }


    }

    protected function calculatePoints(array $range){
        $min = min($range);
        $max = max($range);

        return mt_rand($min, $max);
    }
}
