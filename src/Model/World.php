<?php

namespace Evo\Model;

class World { 
    protected $population;

    protected $resources;

    protected $created_at;

    public function __construct(){
        $this->created_at = new \DateTime();
        $this->population = $this->resources = [];
    }

    public function getPopulation(){
        return $this->population;
    }
}
