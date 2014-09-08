<?php

namespace Crystal\Types;

use Crystal\Type;
use Crystal\Exceptions\PropertyNotFoundException;
use Crystal\Exceptions\PropertyAlreadyExistsException;
use Crystal\Exceptions\InvalidPropertyException;

class Object extends Structure
{

    public function add($key, Type $type)
    {
        $this->ensureKey($key);
        
        $this->properties[$key] = $type;
        
        return $this;
    }
    
    private function ensureKey($key)
    {
        $this->ensureKeyNameIsValid($key);
        $this->ensureKeyNotAlreadyExists($key);
    }
    
    private function ensureKeyNameIsValid($key)
    {
        if(is_string($key) === true && trim($key) !== '')
        {
            return true;
        }
        
        throw new InvalidPropertyException(sprintf('Property %s has to be a non empty string', $key));
    }
    
    private function ensureKeyNotAlreadyExists($key)
    {
        if($this->has($key) === true)
        {
            throw new PropertyAlreadyExistsException(sprintf('Property %s already exists', $key));
        }
    }
    
    public function has($key)
    {
        return array_key_exists($key, $this->properties);
    }
    
    public function get($key)
    {
        if($this->has($key) === false)
        {
            throw new PropertyNotFoundException(sprintf('Property %s does not exist', $key));
        }
        
        return $this->properties[$key];
    }
    
    public function isValid()
    {
        return true;
    }
}
