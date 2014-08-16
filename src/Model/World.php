<?php

namespace Evo\Model;

class World {

    protected $creatures;

    protected $resources;

    protected $year_length;

    protected $population_cap;

    protected $starting_population;

    protected $growth_rate;

    protected $created_at;

    public function __construct(){
        $this->created_at = new \DateTime();
        $this->population = $this->resources = [];
    }

    public function getCreatures(){
        return $this->creatures;
    }

    public function addCreature(Creature $creature){
        $this->creatures[] = $creature;
    }

    public function removeCreature(Creature $creature){

    }

    public function getResources(){
        return $this->resources;
    }

    public function addResource(Resource $resource){
        $this->resources[] = $resource;
    }

    public function getYearLength(){
        return $this->year_length;
    }

    public function setYearLength($length){
        $this->year_length = $length;
    }

    public function getPopulationCap(){
        return $this->population_cap;
    }

    public function setPopulationCap($cap){
        $this->population_cap = $cap;
        return $this;
    }

    public function getStartingPopulation(){
        return $this->starting_population;
    }

    public function setStartingPopulation($population) {
        $this->starting_population = $population;
        return $population;
    }

    public function getGrowthRate(){
        return $this->growth_rate;
    }
}
