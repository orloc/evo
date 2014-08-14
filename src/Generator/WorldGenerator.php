<?php

namespace Evo\Generator;

use Evo\Model;

class WorldGenerator { 

    protected $config;

    public function __construct(array $config){
        $this->config = $config;
    }

    public function generate(){
        $world = new Model\World;


    }


}
