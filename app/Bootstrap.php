<?php

use Pimple\Container;

/**
 * @name Bootstrap
 * @author vagrant
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf\Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf\Bootstrap_Abstract
{
    public function _initLoader(Yaf\Dispatcher $dispatcher)
    {
        require APPLICATION_PATH . '/vendor/autoload.php';
    }

    public function _initConfig(Yaf\Dispatcher $dispatcher) {
        //把配置保存起来
        $arrConfig = Yaf\Application::app()->getConfig();
        Yaf\Registry::set('config', $arrConfig);
        

        $containerBuilder = new \DI\ContainerBuilder();
        $containerBuilder->addDefinitions(APPLICATION_PATH . 'conf/config.php');
        $container = $containerBuilder->build();
        Yaf\Registry::set('container', $container);
    }

    public function _initDi(Yaf\Dispatcher $dispatcher)
    {
        $container = new Pimple\Container();

        $container['config'] = function () {
            return \Yaf\Registry::get('config');
        };

        $container['logger'] = function ($c) {
            return new Monolog\Logger('app-log', [new Monolog\Handler\StreamHandler(STORAGE_PATH . '/app.log')]);
        };

        $container['session'] =  function ($c) {
            return \Yaf\Session::getInstance();
        };

        $container->register(new \Provider\ConfigServiceProvider());
        $container->register(new \Provider\LoggerServiceProvider());

        Yaf\Registry::set('di', $container);
    }

    public function _initPlugin(Yaf\Dispatcher $dispatcher) {
        //注册一个插件
        $objSamplePlugin = new SamplePlugin();
        $dispatcher->registerPlugin($objSamplePlugin);
    }

    public function _initRoute(Yaf\Dispatcher $dispatcher) {
        //在这里注册自己的路由协议,默认使用简单路由
    }

    public function _initView(Yaf\Dispatcher $dispatcher){
        //在这里注册自己的view控制器，例如smarty,firekylin
        $dispatcher->disableView();
    }

    public function _initHandleException(Yaf\Dispatcher $dispatcher)
    {

    }
}
