<?php

namespace Crystal\Tests\Stubs;

use Crystal\Schema;
use Crystal\Types;

class PonySchema extends Schema
{
    protected function build()
    {
        $this->add('pony', new StubType());
        $this->add('unicorn',
            (new Types\Object())
            ->add('nyancat', new StubType())
            ->add('leprechaun', new StubType())
        );
    }
}
