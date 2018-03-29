<?php
/**
 * Created by PhpStorm.
 * User: zz
 * Date: 2018/3/28
 * Time: 19:25
 */
namespace App\HttpController;


use EasySwoole\Core\Http\Request;
use EasySwoole\Core\Http\Response;
use FastRoute\RouteCollector;

class Router extends \EasySwoole\Core\Http\AbstractInterface\Router
{

    function register(RouteCollector $routeCollector)
    {
        // TODO: Implement register() method.
        // /
        $routeCollector->get('/',function (Request $request ,Response $response){
            $response->write('this router index');
            $response->end();
        });
//        // /test/index.html
//        $routeCollector->get('/test/{name}',function (Request $request ,Response $response,$name){
//            $response->write("this router ".$name);
//            $response->end();
//        });
        // /user/1/index.html
        $routeCollector->get( '/user/{id:\d+}',function (Request $request ,Response $response,$id){
            $response->write("this is router user ,your id is {$id}");
            $response->end();
        });

        $routeCollector->addRoute('GET', '/test', '/Index/test');

    }
}