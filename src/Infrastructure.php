<?php

declare(strict_types=1);

namespace Jorisros\InfraPhp;

use Jorisros\InfraPhp\Factory\StaticTemplate;
use League\Container\Container;

class Infrastructure
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }
    public function run(): static
    {
        $this->register();
        return $this;
    }

    public function setSettings(string $settingFile): void
    {
        $settings = include $settingFile;

        $this->container->add(Config::class)
            ->addArgument($settings['ssl_certificate'])
            ->addArgument($settings['nginx'])
            ->addArgument($settings['nginx_options_ssl'])
            ->addArgument($settings['nginx_ssl_dhparam']);
    }

    public function setSites(string $sites): void
    {
        //@TODO to implement
    }

    private function register(): void
    {
        $this->container->add(StaticTemplate::class)
            ->addArgument(Config::class);
    }

    public function getContainer(): Container
    {
        return $this->container;
    }
}
