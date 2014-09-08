<?php

use Crystal\Types;
use Crystal\Tests\Stubs;

class SchemaTest extends PHPUnit_Framework_TestCase
{
        
    public function testSimpleSchema()
    {
        $schema = new Stubs\PonySchema();
        
        $expectedObject = $this->getExpectedObject();
        
        $this->assertEquals($expectedObject, $schema->getStructure());
    }
    
    public function testNestedSchemas()
    {
        $schema = new Stubs\UnicornSchema();
        
        $expectedObject = new Types\Object();
        $expectedObject->add('nested', $this->getExpectedObject());
        
        $this->assertEquals($expectedObject, $schema->getStructure());
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgument()
    {
        $schema = new Stubs\InvalidSchema();
    }
    
    private function getExpectedObject()
    {
        $expectedObject = new Types\Object();
        $expectedObject->add('pony', new Stubs\StubType());
        $expectedObject->add('unicorn',
            (new Types\Object())
                ->add('nyancat', new Stubs\StubType())
                ->add('leprechaun', new Stubs\StubType())
        );
        
        return $expectedObject;
    }
}
