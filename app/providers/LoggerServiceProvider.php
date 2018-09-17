<?php

namespace Provider;

use Pimple\Container;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LoggerServiceProvider implements \Pimple\ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['srv.logger'] = function ($c) {
            return new Logger($c['srv.config']['application']['logger']['name'], [new StreamHandler(STORAGE_PATH . '/app.log')]);
        };
    }
}
