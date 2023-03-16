<?php

namespace Factory;

require_once __DIR__ . '/../vendor/autoload.php';

use Jorisros\InfraPhp\Config;
use Jorisros\InfraPhp\Factory\StaticTemplate;
use JorisRos\NginxParser\NginxParser;
use PHPUnit\Framework\TestCase;

final class StaticTemplateTest extends TestCase
{
    public function testTemplateNoSSL()
    {
        $config = new Config('/tmp', '/tmp', '/tmp', '/tmp');

        $builder = new StaticTemplate($config);
        $s = $builder->create('/location','jorisros.nl', false);

        $this->assertInstanceOf(NginxParser::class, $s);
        $values = $s->getValues();
        $this->assertEquals(80, $values['port']);
        $this->assertEquals('/location', $values['root']);
        $this->assertEquals('index.html index.htm index.nginx-debian.html', $values['index']);
        $this->assertEquals('jorisros.nl', $values['server_name']);
    }
}