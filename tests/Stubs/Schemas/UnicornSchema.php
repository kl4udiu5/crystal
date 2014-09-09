<?php

namespace Crystal\Tests\Stubs\Schemas;

use Crystal\Schema;

class UnicornSchema extends Schema
{
    protected function build()
    {
        $this->add('nested', new PonySchema());
    }
}
