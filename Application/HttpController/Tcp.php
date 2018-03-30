<?php
namespace App\HttpController;

use EasySwoole\Core\Http\AbstractInterface\Controller;
use EasySwoole\Core\Swoole\ServerManager;

class Tcp extends Controller{

    function index(){
        $this->actionNotFound(null);
    }

    function push(){
        echo 1;die;
        $fd = intval($this->request()->getRequestParam('fd'));
        $info = ServerManager::getInstance()->getServer()->connection_info($fd);
        if(is_array($info)){
            ServerManager::getInstance()->getServer()->send($fd,"push in http at ".time());
        }else{
            $this->response()->write("fd ".$fd . " not exist");
        }

    }
}


