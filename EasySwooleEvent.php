<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/1/9
 * Time: 下午1:04
 */

namespace EasySwoole;

use App\Parser;
use \EasySwoole\Core\AbstractInterface\EventInterface;
use EasySwoole\Core\Swoole\EventHelper;
use \EasySwoole\Core\Swoole\ServerManager;
use \EasySwoole\Core\Swoole\EventRegister;
use \EasySwoole\Core\Http\Request;
use \EasySwoole\Core\Http\Response;
use EasySwoole\Core\Swoole\Task\TaskManager;
use think\Db;

//use Tcp\Parser;

Class EasySwooleEvent implements EventInterface {

    public function frameInitialize(): void
    {
        // TODO: Implement frameInitialize() method.
        date_default_timezone_set('Asia/Shanghai');
    }

    public function mainServerCreate(ServerManager $server,EventRegister $register): void
    {
        // 全局初始化数据库
        $dbConf = Config::getInstance()->getConf('database');
        Db::setConfig($dbConf);

        // TODO: Implement mainServerCreate() method.
        EventHelper::registerDefaultOnMessage($register,new Parser());
//        $tcp = $server->addServer('tcp',9502);
//        EventHelper::registerDefaultOnReceive($register,new \Tcp\Parser(),function($errorType,$clientData,$client){
//            //第二个回调是可有可无的，当无法正确解析，或者是解析出来的控制器不在的时候会调用
//            TaskManager::async(function ()use($client){
//                sleep(3);
//                \EasySwoole\Core\Socket\Response::response($client,"Bye");
//                ServerManager::getInstance()->getServer()->close($client->getFd());
//            });
//            return "{$errorType} and going to close";
//        });
    }

    public function onRequest(Request $request,Response $response): void
    {
        // TODO: Implement onRequest() method.
    }

    public function afterAction(Request $request,Response $response): void
    {
        // TODO: Implement afterAction() method.
    }
}