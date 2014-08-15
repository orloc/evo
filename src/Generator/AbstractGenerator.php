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

        $this->preGenerate();

        $validProperties = array_filter($reflector->getProperties(), function(\ReflectionProperty $property){
            return isset($this->config[$property->getName()]);
        });

        foreach( $validProperties as $p) {
            $name = $p->getName();
            if ($this->use_setters) {
                $action ='set'. self::camelize($name);
                $this->getEntity()->$action($this->getComputedValue($this->getConfig(), $name));
            } else {
                $this->getEntity()->$name = $this->getComputedValue($this->getConfig(), $name);
            }
        }

        return $this;
    }

    protected function preGenerate(){
        return;
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

    public static function camelize($word){
        $ret = '';
        foreach(explode('_', $word) as $k){
            $ret .= ucfirst($k);
        }

        return $ret;
    }
}
