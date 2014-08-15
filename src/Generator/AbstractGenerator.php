<?php

namespace Evo\Generator;

abstract class AbstractGenerator {

    protected $config;

    protected $use_setters;

    protected $entity;

    public function __construct(array $config = [], $use_setters = true){
        $this->config = $config;
        $this->use_setters = $use_setters;
    }

    public function generate(){
        $reflector = new \ReflectionClass($this->getName());
        $entityName = $this->getName();

        $this->entity = new $entityName();

        $validProperties = array_filter($reflector->getProperties(), function(\ReflectionProperty $property){
            return isset($this->config[$property->getName()]);
        });

        foreach( $validProperties as $p) {
            $name = $p->getName();
            if ($this->use_setters) {
                $action ='set'.$this->camelize($name);
                $this->entity->$action(static::getComputedValue($this->getConfig(), $name));
            } else {
                $this->entity->$name = static::getComputedValue($this->getConfig(), $name);
            }
        }

        return $entity;
    }

    protected function getComputedValue(array $config, $property){
        return mt_rand(min($config[$property]), max($config[$property]));
    }

    public function getConfig(){
        return array_merge($this->config, [
            'use_setters' =>$this->use_setters
        ]);
    }

    public function getEntity(){
        return $this->entity;
    }

    public function camelize($word){
        $ret = '';
        foreach(explode('_', $word) as $k){
            $ret .= ucfirst($k);
        }

        return $ret;
    }
}
