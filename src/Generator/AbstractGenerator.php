<?php

namespace Evo\Generator;

abstract class AbstractGenerator { 

    protected $config;

    public function __construct(array $config = []){
        $this->config = $config;
    }

    public function generate(){
        $reflector = new \ReflectionClass($this->getName());
        $entityName = $this->getName();

        $entity = new $entityName();

        $validProperties = array_filter($reflector->getProperties(), function(\ReflectionProperty $property){
            return isset($this->config[$property->getName()]);
        }); 

        foreach( $validProperties as $p) { 
            $name = $p->getName();
            $action = 'set'.$this->camelize($name);
            $value = mt_rand(min($this->config[$name]), max($this->config[$name]));
            
            $entity->$action($value);
        }

        return $entity;
    }

    public function camelize($word){
        $ret = '';
        foreach(explode('_', $word) as $k){
            $ret .= ucfirst($k);
        }

        return $ret;
    }
}
