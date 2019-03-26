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
class DetailMode extends BaseModel
{
    protected $name = 'detail_mode';
    protected $insert = ['wxapp_id' => 10001];


    public function getTypeAttr($value, $data)
    {
        $type = [10 => '编辑器', 20 => '人物简历模板', 30 => '附件&链接'];
        return $type[$data['type']];
    }

    public static function getList()
    {
        return self::order('id')->select()->toArray();
    }
}
