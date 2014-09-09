<?php

namespace Crystal\Tests\Stubs\Types;

use Crystal\Type;

class PonyType implements Type
{
    
    public function isValid()
    {
        return true;
    }
} 