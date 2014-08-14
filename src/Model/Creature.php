<?php

namespace Evo\Model;

class Creature extends AbstractEntity { 

    protected $strength;

    protected $speed;

    protected $constitution;

    protected $health;

    protected $energy;

    protected $age;

    protected $birth_day;

    public function __construct(array $attributes){
        $this->strength = $attributes['strength'];
        $this->constitution = $attributes['constitution'];
        $this->strength = $attributes['strength'];
        $this->age = 0;

        $this->birth_day = new \DateTime();
    }

}
