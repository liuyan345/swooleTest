<?php

namespace App\HttpController;

use EasySwoole\Core\Http\AbstractInterface\Controller;

class Hello extends Controller
{
    public function index()
    {
        $this->response()->write('Hello easySwoole!');
    }
    public function test(){
        $n = new N();
        $this->response()->write('this page is test!');
    }



}

