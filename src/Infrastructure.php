<?php declare(strict_types=1);

namespace Jorisros\InfraPhp;

use Jorisros\InfraPhp\Factory\StaticTemplate;
use League\Container\Container;

class Infrastructure
{
    private Container $container;
    public function run()
    {

    }

    private function register(): void
    {
       // $this->container->add(StaticTemplate::class)
        //    ->addArgument()
    }

    public function getContainer(): Container
    {
        return $this->container;
    }
}