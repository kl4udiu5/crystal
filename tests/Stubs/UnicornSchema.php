<?php

namespace Crystal\Tests\Stubs;

use Crystal\Schema;

class UnicornSchema extends Schema
{
    protected function build()
    {
        $this->add('nested', new PonySchema());
    }
}
