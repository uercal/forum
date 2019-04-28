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
    protected $append = ['status', 'status_name'];

    public function cover()
    {
        return $this->hasOne('UploadFile', 'file_id', 'cover_id');
    }


    // 
    public function activityUserLog()
    {
        return $this->hasMany('ActivityUserLog', 'act_id', 'id');
    }


    public function activitySupport()
    {
        return $this->hasMany('ActivitySupport', 'act_id', 'id');
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

    public function getStatusNameAttr($value, $data)
    {
        $now = time();
        if ($now < $data['sign_begin']) {
            // 未开始
            $status = '未开始';
        } elseif ($now > $data['sign_begin'] && $now < $data['sign_end']) {
            // 报名中
            $status = '报名中';
        } elseif ($now > $data['active_begin'] && $now < $data['active_end']) {
            // 进行中
            $status = '进行中';
        } else {
            // 已经结束
            $status = '已结束';
        }
        return $status;
    }

    public static function detail($id)
    {
        return self::get($id, ['cover']);
    }
}
