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

    public function __construct(){
        $this->age = 0;
        $this->health = 100;
        $this->energy = 20;

        $this->birth_day = new \DateTime();
    }

    public function getStrength(){
        return $this->strength;
    }

    public function setStrength($str){
        $this->strength = $str;
        return $this;
    }

    public function getConstitution(){
        return $this->constitution;
    }

    public function setConstitution($cst){
        $this->constitution = $cst;
        return $this;
    }

    public function getSpeed(){
        return $this->speed;
    }

    public function setSpeed($spd){
        $this->speed = $spd;
        return $this;
    }

}
