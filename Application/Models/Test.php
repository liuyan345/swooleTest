<?php

namespace App\Models;

use think\Model;

class Test extends Model
{
//    protected $name = 'test';
    protected $pk = 'id';
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'datetime';
    // 定义时间戳字段名
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
    // 返回值类型
    protected $resultSetType = "array";
}