<?php

namespace Crystal\Types;

use Crystal\Type;

abstract class Structure implements Type, \Countable, \Iterator
{
    protected
        $properties;
        
    public function __construct()
    {
        $this->properties = array();
    }
        
    public function count()
    {
        return count($this->properties);
    }
    
    public function rewind()
    {
        return reset($this->properties);
    }
    
    public function current()
    {
        return current($this->properties);
    }
  
    public function key()
    {
        return key($this->properties);
    }
  
    public function next()
    {
        return next($this->properties);
    }
  
    public function valid()
    {
        return key($this->properties) !== null;
    }
    
    abstract public function isValid();
}
