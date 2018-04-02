<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2018/4/1
 * Time: 20:36
 */
namespace App\WebSocket;


use EasySwoole\Core\Socket\Response;
use EasySwoole\Core\Socket\WebSocketController;
use EasySwoole\Core\Swoole\Task\TaskManager;
use App\Models\Test as TestModel;


class Test extends WebSocketController
{
    function actionNotFound(?string $actionName)
    {
        $this->response()->write("action call {$actionName} not found");
    }

    function hello()
    {
        $this->response()->write('call hello with arg:'.$this->request()->getArg('content'));
    }
    function insert(){
        $test = new TestModel();
        $data['test'] = $this->request()->getArg("content");
        $id = $test->insertGetId($data);
        $fd = $this->client()->getFd();
        $this->response()->write("insert id is ".$id.", fd is ".$fd);
    }

    public function who(){
        $this->response()->write('your fd is '.$this->client()->getFd());
    }

    function delay()
    {
        $this->response()->write('this is delay action');
        $client = $this->client();
        //测试异步推送
        TaskManager::async(function ()use($client){
            sleep(1);
            Response::response($client,'this is async task res'.time());
        });
    }
}