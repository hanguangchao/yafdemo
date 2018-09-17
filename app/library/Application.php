<?php

use Psr\Container\ContainerInterface;

class Application extends \yaf\Application
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        
    }
}
