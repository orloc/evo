<?php

namespace Evo\Model;

class Creature extends AbstractEntity {

    protected $strength;

    protected $speed;

    protected $constitution;

    protected $health;

    protected $energy;

    protected $age;

    protected $point_limit;

    protected $birth_date;

    public function __construct(){
        $this->age = 0;
        $this->health = 100;
        $this->energy = 20;
        $this->birth_date = new \DateTime();
    }

    public function getCurrentPoints() {
        return $this->getConstitution() + $this->getSpeed() + $this->getStrength();
    }

    public function hasExtraPoints(){
        return  $this->getCurrentPoints() <= $this->getPointLimit();
    }

    public function getPointLimit(){
        return $this->point_limit;
    }

    public function setPointLimit($point_limit){
        $this->point_limit = $point_limit;
        return $this;
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

    public function getAge(){
        return $this->age;

    }

    public function setAge($age){
        $this->age = $age;
        return $this;
    }

    public function getBirthDate(){
        return $this->birth_day;
    }

    public function setBirthDate($date){
        $this->birth_date = $date;
        return $this;
    }
}
