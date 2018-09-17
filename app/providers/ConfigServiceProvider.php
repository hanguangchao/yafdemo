<?php

namespace Provider;

use Pimple\Container;

class ConfigServiceProvider implements \Pimple\ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['srv.config'] = \Yaf\Registry::get('config');
    }
}
