<?php

namespace Tcp;


use EasySwoole\Core\Socket\Response;
use EasySwoole\Core\Socket\TcpController;
use EasySwoole\Core\Swoole\ServerManager;
use EasySwoole\Core\Swoole\Task\TaskManager;

class Test extends TcpController
{
    function actionNotFound(?string $actionName)
    {
        $this->response()->write("{$actionName} not found");
    }

    function test()
    {
        var_dump("aa");
        $this->response()->write(time());
    }

    function args()
    {
        var_dump("bb");

        var_dump($this->request()->getArgs());
    }

    function delay()
    {
        var_dump("cc");
        $client = $this->client();
        TaskManager::async(function ()use($client){
            sleep(1);
            Response::response($client,'this is delay message at '.time());//为了保持协议一致，实际生产环境请调用Parser encoder
        });
    }

    function close()
    {
        var_dump("dd");
        $this->response()->write('you are goging to close');
        $client = $this->client();
        TaskManager::async(function ()use($client){
            sleep(2);
            ServerManager::getInstance()->getServer()->close($client->getFd());
        });
    }

    function who()
    {
        var_dump($this->client()->getFd());
        $this->response()->write('you fd is '.$this->client()->getFd());
    }
}