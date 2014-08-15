<?php

namespace Evo\Model;

class World { 

    protected $population;

    protected $resources;

    protected $point_limit;

    protected $year_length;

    protected $population_cap;

    protected $starting_population;

    protected $growth_rate;

    protected $created_at;

    public function __construct(){
        $this->created_at = new \DateTime();
        $this->population = $this->resources = [];
    }

    public function getPopulation(){
        return $this->population;
    }


    public function getPointLimit(){
        return $this->point_limit;
    }

    public function setPointLimit($limit){
        $this->point_limit = $limit;
        return $this;
    }

    public function getYearLength(){
        return $this->year_length;
    }

    public function getPopulationCap(){
        return $this->population_cap;
    }

    public function getStartingPopulation(){
        return $this->starting_population;
    }

    public function getGrowthRate(){
        return $this->growth_rate;
    }
}
