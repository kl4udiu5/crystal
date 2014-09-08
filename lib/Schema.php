<?php

namespace Crystal;

abstract class Schema
{
    private
        $rootObject;
        
    final public function __construct()
    {
        $this->rootObject = new Types\Object();
        
        $this->build();
    }
    
    final public function getStructure()
    {
        return $this->rootObject;
    }
    
    final public function add($key, $child)
    {
        $this->ensureChildType($child);
        
        if($child instanceof Schema)
        {
            $child = $child->getStructure();
        }
        
        $this->rootObject->add($key, $child);
    }
    
    private function ensureChildType($child)
    {
        if(! $child instanceof Type && ! $child instanceof Schema)
        {
            throw new \InvalidArgumentException("add method : second argument must be an instance of Type or Schema");
        }
    }
    
    abstract protected function build();
}
