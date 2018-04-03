<?php

namespace App\HttpController;


use App\Utility\MysqlPool2;
use EasySwoole\Core\Http\AbstractInterface\Controller;
use EasySwoole\Core\Swoole\Coroutine\PoolManager;
use EasySwoole\Core\Swoole\ServerManager;

class Index extends Controller
{

    function index()
    {

        $pool = PoolManager::getInstance()->getPool(MysqlPool2::class);

        \go(function ()use($pool){
            $db = $pool->getObj();
            if($db){
//                var_dump($db);
                $ret = $db->rawQuery('select * from sw_test');
//                $ret = $db->rawQuery('select sleep(1)');
                var_dump($ret);
                $pool->freeObj($db);
                var_dump('1 finish at '.time());
            }else{
                var_dump('db not available');
            }
        });

        // TODO: Implement index() method.
//        $content = file_get_contents(__DIR__.'/websocket.html');
//        $this->response()->write($content);

        // 数据库测试
//        $test  = new Test();
//        $testInfo = $test->select();
//        var_dump($testInfo);die;

    }

    /*
     * 请调用who，获取fd
     * http://ip:9501/push/index.html?fd=xxxx
     */
    function push()
    {
        $fd = intval($this->request()->getRequestParam('fd'));
        $info = ServerManager::getInstance()->getServer()->connection_info($fd);
        if(is_array($info)){
            ServerManager::getInstance()->getServer()->push($fd,'push in http at '.time());
        }else{
            $this->response()->write("fd {$fd} not exist");
        }
    }

}

