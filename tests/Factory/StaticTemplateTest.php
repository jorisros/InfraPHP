<?php

namespace Factory;

use Jorisros\InfraPhp\Factory\StaticTemplate;
use PHPUnit\Framework\TestCase;

class StaticTemplateTest extends TestCase
{
    public function testTemplate()
    {
        $s = StaticTemplate::create('/location','jorisros.nl', true);

        //var_dump($s->build());
    }
}