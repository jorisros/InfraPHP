<?php

final class ConfigTest extends \PHPUnit\Framework\TestCase
{
    public function testNoCerticateLocation()
    {
        $this->expectExceptionMessage("Cant find the lets encrypt directory");
        $config = new \Jorisros\InfraPhp\Config(
            '',
            '',
            '',
            '',
        );
    }

    public function testNoNginx()
    {
        $this->expectExceptionMessage("Cant find nginx");
        $config = new \Jorisros\InfraPhp\Config(
            '/tmp',
            '',
            '',
            '',
        );
    }

    public function testOptionsSsl()
    {
        $this->expectExceptionMessage("Cant find the ssl options file");
        $config = new \Jorisros\InfraPhp\Config(
            '/tmp',
            '/tmp',
            '',
            '',
        );
    }

    public function testNoParam()
    {
        $this->expectExceptionMessage("Cant find the ssl param");
        $config = new \Jorisros\InfraPhp\Config(
            '/tmp',
            '/tmp',
            '/tmp',
            '',
        );
    }
    public function testGetters()
    {
        $config = new \Jorisros\InfraPhp\Config(
            '/tmp',
            '/tmp',
            '/tmp',
            '/tmp',
        );

        $this->assertEquals('/tmp', $config->getSslCertificateLocation());
        $this->assertEquals('/tmp', $config->getNginx());
        $this->assertEquals('/tmp', $config->getNginxOptionsSsl());
        $this->assertEquals('/tmp', $config->getNginxSslDhparam());
    }
}
