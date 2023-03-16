<?php

namespace Jorisros\InfraPhp\Factory;

use Jorisros\InfraPhp\Config;
use JorisRos\NginxParser\NginxBuilder;
use JorisRos\NginxParser\NginxParser;

class StaticTemplate
{
    private Config $config;
    public function __construct(Config $config)
    {
        $this->config = $config;
    }
    public function create(
        string $path,
        string $domain,
        bool $isSSL
    ): NginxParser {
        $site = new NginxParser('server');
        $site->setPort(80);
        $site->setRoot($path);
        $site->setIndex('index.html index.htm index.nginx-debian.html');
        $site->setServer_name($domain);

        $location = new NginxParser('location', '/');
        $location
            ->setRoot('/usr/share/nginx/html')
            ->setIndex(array('index.html', 'index.htm'));
        $site->setLocation($location);

        if ($isSSL) {
            $site->setListen('443 ssl');
        }

        return $site;
    }
}
