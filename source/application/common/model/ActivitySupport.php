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
class ActivitySupport extends BaseModel
{
    protected $name = 'activity_support';
    protected $insert = ['wxapp_id' => 10001];

    public static function detail($id)
    {
        return self::get($id);
    }

    public function activity()
    {
        return $this->belongsTo('Activity', 'act_id', 'id');
    }

    public function user()
    {
        return $this->hasOne('User', 'user_id', 'user_id');
    }


    public function company()
    {
        return $this->hasOne('UserCompany', 'user_id', 'user_id')->bind([
            'company_name',
            'company_tel',
            'email'
        ]);
    }
   
    public static function isExist($user_id, $act_id)
    {
        $data = self::where([
            'user_id' => $user_id,
            'act_id' => $act_id
        ])->select()->toArray();

        return !empty($data);
    }
}
