<?php

namespace app\common\model;

use think\Db;
use app\common\model\UploadFile;
use think\Cache;
use think\Request;


/**
 * 模型
 * Class 
 * @package app\common\model
 */
class ActivityUserLog extends BaseModel
{
    protected $name = 'activity_user_log';
    protected $insert = ['wxapp_id' => 10001];


    public static function detail($id)
    {
        return self::get($id);
    }

    public function activity(){
        return $this->belongsTo('Activity','id','act_id');
    }
}
