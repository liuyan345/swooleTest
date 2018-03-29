<?php

namespace App\HttpController;

use EasySwoole\Core\Http\AbstractInterface\Controller;

use App\ViewController;

class Index extends Controller
{
    public function index()
    {
//        $this->render('index');
//        $this->response()->write('Hello easySwoole!!');
    }
    public function test(){
        $this->response()->write('this is test route!');
    }

    protected function actionNotFound($action): void
    {
        $this->response()->write('actionNotFound!');
    }

    protected function afterAction($action): void
    {
        $this->response()->write('afterAction!');
    }

}

