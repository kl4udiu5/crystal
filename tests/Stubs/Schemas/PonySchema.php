<?php

namespace Crystal\Tests\Stubs\Schemas;

use Crystal\Schema;
use Crystal\Types;
use Crystal\Tests\Stubs;

class PonySchema extends Schema
{
    protected function build()
    {
        $this->add('pony', new Stubs\Types\PonyType());
        $this->add('unicorn',
            (new Types\Object())
            ->add('nyancat', new Stubs\Types\PonyType())
            ->add('leprechaun', new Stubs\Types\PonyType())
        );
    }
}
