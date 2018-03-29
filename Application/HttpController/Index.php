<?php

namespace App\HttpController;

//use EasySwoole\Core\Http\AbstractInterface\Controller;

class Index extends ViewController
{
    public function index()
    {
        $this->view("Index/index",['name'=>"easySwoole"]);
//        $this->response()->write('Hello easySwoole!');
    }
    public function test(){
        $this->response()->write('this is test route!');
    }



}

