<?php

namespace Tcp;

use EasySwoole\Core\Socket\AbstractInterface\ParserInterface;
use EasySwoole\Core\Socket\Common\CommandBean;

class Parser implements ParserInterface
{

    public function decode($raw, $client): ?CommandBean
    {
        // TODO: Implement decode() method.
        $list = explode(":",trim($raw));
        $bean = new CommandBean();
        $controller = array_shift($list);
        if($controller == 'test'){
            $bean->setControllerClass(Test::class);
        }
        $bean->setAction(array_shift($list));
        $bean->setArg('test',array_shift($list));
        var_dump($bean->who());
        return $bean;
    }

    public function encode(string $raw, $client, $commandBean): ?string
    {
        // TODO: Implement encode() method.
        return $raw."\n";
    }
}


?>
