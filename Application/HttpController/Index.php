<?php

namespace App\HttpController;

use EasySwoole\Core\Http\AbstractInterface\Controller;

class Index extends Controller
{
    public function index()
    {
        $this->response()->write('Hello easySwoole!');
    }
    public function test(){
        $this->response()->write('this is test route!');
    }



}

