<?php

namespace Crystal\Tests\Stubs;

use Crystal\Type;

class StubType implements Type
{
    
    public function isValid()
    {
        return true;
    }
} 