<?php

namespace app\common\model;

use think\Db;
use app\common\model\UploadFile;
use app\common\model\News;
use think\Cache;
use think\Request;


/**
 * 模型
 * Class 
 * @package app\common\model
 */
class Activity extends BaseModel
{
    protected $name = 'activity';
    protected $insert = ['wxapp_id' => 10001];

    protected $append = ['status'];

    public function cover()
    {
        return $this->hasOne('UploadFile', 'file_id', 'cover_id');
    }


    public function getStatusAttr($value, $data)
    {
        $now = time();
        if ($now < $data['sign_begin']) {
            // 未开始
            $status = 10;
        } elseif ($now > $data['sign_begin'] && $now < $data['sign_end']) {
            // 报名中
            $status = 20;
        } elseif ($now > $data['active_begin'] && $now < $data['active_end']) {
            // 进行中
            $status = 30;
        } else {
            // 已经结束
            $status = 40;
        }
        return $status;
    }

    public static function detail($id)
    {
        return self::get($id, ['cover']);
    }
}
