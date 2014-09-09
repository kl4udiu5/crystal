<?php

use Crystal\Types;
use Crystal\Tests\Stubs;

class ObjectTest extends PHPUnit_Framework_TestCase
{
        
    private
        $object,
        $stubType;
    
    protected function setUp()
    {
        $this->object = new Types\Object();
        $this->stubType = new Stubs\Types\PonyType();
    }
    
    public function testAddValidType()
    {
        $this->assertFalse($this->object->has('pony'));
        
        $this->object->add('pony', $this->stubType);
        
        $this->assertTrue($this->object->has('pony'));
        $this->assertInstanceOf('Crystal\Type', $this->object->get('pony'));
    }
    
    public function testPropertyExists()
    {
        $this->object->add('pony', $this->stubType);
        
        $this->assertTrue($this->object->has('pony'));
    }
    
    /**
     * @expectedException Crystal\Exceptions\PropertyNotFoundException
     */
    public function testPropertyNotExists()
    {
        $this->object->get('unicornDoesNotExist');
    }
    
    /**
     * @expectedException Crystal\Exceptions\PropertyAlreadyExistsException
     */
    public function testCantOverrideProperty()
    {
        $this->object->add('pony', $this->stubType);
        $this->object->add('pony', $this->stubType);
    }
    
    /**
     * @expectedException Crystal\Exceptions\InvalidPropertyException
     * @dataProvider invalidPropertyNamesProvider
     */
    public function testInvalidPropertyName($key)
    {
        $this->object->add($key, $this->stubType);
    }
    
    public function invalidPropertyNamesProvider()
    {
        return array(
            array(1),
            array(1.5),
            array(''),
            array('    '),
        );
    }
    
    /**
     * @dataProvider validPropertyNamesProvider
     */
    public function testValidPropertyName($key)
    {
        $this->object->add($key, $this->stubType);
        
        $this->assertTrue($this->object->has($key));
        
    }
    
    public function validPropertyNamesProvider()
    {
        return array(
            array('1'),
            array('2.5'),
            array('pony-unicorn'),
        );
    }
    
    public function testCount()
    {
        $this->object->add('pony', $this->stubType);
        $this->object->add('unicorn', $this->stubType);
        $this->object->add('ponunicorn', $this->stubType);
        
        $this->assertSame(3, $this->object->count());
    }
}
