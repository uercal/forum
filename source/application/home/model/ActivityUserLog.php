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
    protected $error;

    public function getListByUser($user_id)
    {
        return $this->with(['activity' => ['cover']])->where(['user_id' => $user_id])->order('create_time desc')->limit(2)->select()->toArray();
    }


    public function getAllListByUser($user_id, $num)
    {
        return $this->with(['activity' => ['cover']])->where(['user_id' => $user_id])->order('create_time desc')->paginate($num, false, [
            'query' => Request::instance()->request()
        ]);
    }

    public function sign($data, $user_id)
    {
        $obj = $this->where([
            'user_id' => $user_id, 'act_id' => $data['act_id']
        ])->find();
        if ($obj) {
            $this->error = '你已赞助过该活动！';
            return false;
        } else {
            $data['user_id'] = $user_id;
            return $this->allowField(true)->save($data);
        }
    }
}
