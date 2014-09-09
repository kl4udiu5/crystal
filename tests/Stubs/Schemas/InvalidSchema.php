<?php

namespace Crystal\Tests\Stubs\Schemas;

use Crystal\Schema;

class InvalidSchema extends Schema
{
    protected function build()
    {
        $this->add('invalidType', new \DateTime());
    }
}
