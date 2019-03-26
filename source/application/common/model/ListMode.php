<?php

namespace app\common\model;

use think\Db;
use app\common\model\UploadFile;
use think\Cache;
use think\Request;


/**
 * 模型
 * Class Detail
 * @package app\common\model
 */
class ListMode extends BaseModel
{
    protected $name = 'list_mode';
    protected $insert = ['wxapp_id' => 10001];


    public function getDataSourceAttr($value, $data)
    {
        // 根据keyword 进行 查询



        return [];
    }



    public static function getList()
    {
        return self::order('id')->select()->toArray();
    }
}
