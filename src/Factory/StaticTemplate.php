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

        $location = new NginxParser('location','/');
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

/*
 * server {
        #listen 80 default_server;
        #listen [::]:80 default_server;

        root /home/deploy/frontend-website/public;
        index index.html index.htm index.php index.nginx-debian.html;

        server_name www.organiseyou.com www.organiseyou.nl;

   location / {
       index index.html index.htm index.php;
   }

    listen 443 ssl; # managed by Certbot
    ssl_certificate /etc/letsencrypt/live/www.organiseyou.com/fullchain.pem; # managed by Certbot
    ssl_certificate_key /etc/letsencrypt/live/www.organiseyou.com/privkey.pem; # managed by Certbot
    include /etc/letsencrypt/options-ssl-nginx.conf; # managed by Certbot
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem; # managed by Certbot
}
 */