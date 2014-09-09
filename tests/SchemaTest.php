<?php

use Crystal\Types;
use Crystal\Tests\Stubs;

class SchemaTest extends PHPUnit_Framework_TestCase
{
        
    public function testSimpleSchema()
    {
        $schema = new Stubs\Schemas\PonySchema();
        
        $expectedObject = $this->getExpectedObject();
        
        $this->assertEquals($expectedObject, $schema->getStructure());
    }
    
    public function testNestedSchemas()
    {
        $schema = new Stubs\Schemas\UnicornSchema();
        
        $expectedObject = new Types\Object();
        $expectedObject->add('nested', $this->getExpectedObject());
        
        $this->assertEquals($expectedObject, $schema->getStructure());
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgument()
    {
        $schema = new Stubs\Schemas\InvalidSchema();
    }
    
    private function getExpectedObject()
    {
        $expectedObject = new Types\Object();
        $expectedObject->add('pony', new Stubs\Types\PonyType());
        $expectedObject->add('unicorn',
            (new Types\Object())
                ->add('nyancat', new Stubs\Types\PonyType())
                ->add('leprechaun', new Stubs\Types\PonyType())
        );
        
        return $expectedObject;
    }
}
