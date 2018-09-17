<?php


return [

    'config' => function () {
        return \Yaf\Registry::get('config');
    },

    'logger' => function ($c) {
        return new Monolog\Logger('app-log', [new Monolog\Handler\StreamHandler(RUNTIME_PATH . '/app.log')]);
    },

    'session' =>  function ($c) {
        return \Yaf\Session::getInstance();
    },
];
