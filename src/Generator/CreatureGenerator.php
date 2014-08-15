<?php

namespace Evo\Generator;

use Evo\Model\Creature;

class CreatureGenerator extends AbstractGenerator implements GeneratorInterface {

    protected $point_limit;

    public function getName(){
        return '\Evo\Model\Creature';
    }

    public function setPointLimit($limit) {
        $this->point_limit = $limit;
        return $this;
    }

    public function getPointLimit() {
        return $this->point_limit;
    }

    protected function preGenerate() {
        $entity = $this->getEntity();
        $entity->setPointLimit($this->getPointLimit());
    }

    protected function getComputedValue(array $config, $property){
        $creature = $this->getEntity();
        if ($creature->hasExtraPoints()){
            $newPoint = $this->calculatePoints($config[$property]);
            while ($newPoint == 0 || ($newPoint + $creature->getCurrentPoints() > $creature->getPointLimit())) {
                $this->balancePoints($creature, $property);
                $newPoint = $this->calculatePoints($config[$property]);
            }
            return $newPoint;
        }
    }

    protected function balancePoints(Creature $creature, $property){
        $valid_keys = [
            'strength',
            'constitution',
            'speed'
        ];

        if (in_array($property, $valid_keys)){
            if (isset($valid_keys[$property]) && !is_numeric($valid_keys[$property])){
                unset($valid_keys[$property]);
            }

            $reflectionCreature = new \ReflectionClass($creature);
            foreach ($valid_keys as $v){
                $name = parent::camelize($property);
                $oldVal = $reflectionCreature->getMethod(sprintf('get%s', $name))
                    ->invoke($creature);

                $newVal = $oldVal - ($oldVal * .2);

                $reflectionCreature->getMethod(sprintf('set%s', $name))
                    ->invoke($creature, $newVal);
            }
        }
    }

    protected function calculatePoints(array $range){
        return mt_rand($range[0], $range[1]);
    }

}
