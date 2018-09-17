<?php

use Yaf\Registry;

class IndexController extends Yaf\Controller_Abstract {

    public function init()
    {
        //Yaf\Dispatcher::getInstance()->disableView();
    }

    public function indexAction() {
        var_dump($_GET);
    }

    public function guzzleAction()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
        echo $res->getStatusCode();
    }

    public function diAction()
    {
        try {
            $container = Yaf\Registry::get('container');
            $um = $container->get('Lib\UserManager');
            
            $um->register('aaaa@11.cc', 'xddewwce**2---.se');
            // $um->mail('aaaa@11.cc', 'xddewwce**2---.se');
        } catch (\Exception $e) {
            echo '<pre><br>';
            echo $e->getMessage();
            echo $e->getFile();
            // echo $e->getLine();
            print_r($e->getTrace());
        }
        
    }

    public function pdiAction()
    {
        $log = Registry::get('di')['logger'];
        $log->info('123');
        $session = Registry::get('di')['session'];
    }

    public function srvAction()
    {
        try {
            $container = Registry::get('di');
            $container['srv.logger']->info('srv.logger:123');
            print_r($container['srv.config']);
        } catch (\Exception $e) {
            echo '<pre><br>';
            echo $e->getMessage();
            echo $e->getFile();
            // echo $e->getLine();
            print_r($e->getTrace());
        }
    }

    public function psrdiAction()
    {
        
    }
}
