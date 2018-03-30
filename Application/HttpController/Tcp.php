<?php
namespace App\HttpController;


use EasySwoole\Core\Http\AbstractInterface\Controller;
use EasySwoole\Core\Swoole\ServerManager;
use Tcp\Test;

class Tcp extends Controller
{

    function index()
    {
        // TODO: Implement index() method.
//        $this->actionNotFound(null);
//        $this->response()->write('this page is'.$this->getActionName());
//        $test = new Test();
//        $abc = $test->who();
//        $this->response()->write($abc);
    }

    /*
     * 请调用who，获取fd
     * http://ip:9501/tpc/push/index.html?fd=xxxx
     */
    function push()
    {
        $fd = intval($this->request()->getRequestParam('fd'));
        $info = ServerManager::getInstance()->getServer()->connection_info($fd);
        if(is_array($info)){
            ServerManager::getInstance()->getServer()->send($fd,'push in http at '.time());
        }else{
            $this->response()->write("fd {$fd} not exist");
        }
    }
}


