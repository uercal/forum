<?php

namespace app\home\model;

use think\Db;
use think\Cache;
use think\Request;
use app\common\model\ActivitySupport as ActivitySupportModel;
use app\home\model\Activity;

/**
 * 模型
 * Class 
 * @package app\common\model
 */
class ActivitySupport extends ActivitySupportModel
{

    protected $error;


    public function getListByUser($user_id)
    {
        return $this->with(['activity' => ['cover']])->where(['user_id' => $user_id])->order('create_time desc')->select()->toArray();
    }

    public function support($data, $user_id)
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

    /**
     * 
     */
    public function getDataAjax($user_id)
    {
        $map = [];

        // 
        $r =  $this->with(['activity'])->where(['user_id' => $user_id])->paginate(1, false, [
            'query' => Request::instance()->request()
        ]);

        // 

        return $r;
    }
}
