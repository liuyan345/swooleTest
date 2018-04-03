<?php

namespace App\Utility;

use EasySwoole\Config;
use EasySwoole\Core\Swoole\Coroutine\AbstractInterface\CoroutinePool;
use EasySwoole\Core\Swoole\Coroutine\Client\Redis;

class RedisPool extends CoroutinePool
{
    public function __construct()
    {
        $conf = Config::getInstance()->getConf('REDIS');
        $min = $conf['pool']['min'];
        $max = $conf['pool']['max'];
        parent::__construct($min, $max);
    }

    public function getObj($timeOut = 0.1):?Redis
    {
        return parent::getObj($timeOut); // TODO: Change the autogenerated stub
    }

    protected function createObject()
    {
        $conf = Config::getInstance()->getConf('REDIS');
        $redis = new Redis($conf['host'], $conf['port'], $conf['serialize'], $conf['auth']);
        if (is_callable($conf['errorHandler'])) {
            $redis->setErrorHandler($conf['errorHandler']);
        }
        $redis->exec('select', $conf['db_name']);
        return $redis;
    }
}



?>