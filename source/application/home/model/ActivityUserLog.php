<?php

namespace app\home\model;

use think\Db;
use think\Cache;
use think\Request;
use app\common\model\ActivityUserLog as ActivityUserLogModel;

/**
 * 模型
 * Class 
 * @package app\common\model
 */
class ActivityUserLog extends ActivityUserLogModel
{
    public function getListByUser($user_id)
    {
        return $this->with(['activity' => ['cover']])->where(['user_id' => $user_id])->order('create_time desc')->select()->toArray();
    }
}
