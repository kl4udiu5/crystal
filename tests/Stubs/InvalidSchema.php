<?php

namespace Crystal\Tests\Stubs;

use Crystal\Schema;

class InvalidSchema extends Schema
{
    protected function build()
    {
        $this->add('invalidType', new \DateTime());
    }
}
