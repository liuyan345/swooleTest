<?php

namespace App\HttpController;

//use EasySwoole\Core\Http\AbstractInterface\Controller;
use App\ViewController;
//use duncan3dc\Laravel\BladeInstance;
//use EasySwoole\Core\Component\Di;
//use EasySwoole\Core\Component\SysConst;

class Index extends ViewController
//class Index extends Controller
{
    public function index()
    {
//        echo 1111;die;
//        $tempPath   = Di::getInstance()->get(SysConst::DIR_TEMP);    # 临时文件目录
//        $this->view = new BladeInstance(EASYSWOOLE_ROOT . '/Views', "{$tempPath}/templates_c");
        $content = $this->view->render("Index/index",['name'=>"easySwoole"]);
        $this->response()->write($content);

//                $this->response()->write('Hello easySwoole!!');

    }
    public function test(){
        $this->response()->write('this is test route!');
    }



}

