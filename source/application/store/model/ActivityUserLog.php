<?php

namespace app\store\model;

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
    public function getReportList($act_id)
    {
        return $this->with(['user' => ['person', 'company','supplier']])->where(['act_id' => $act_id])->paginate(15, false, [
            'query' => Request::instance()->request()
        ]);
    }
}
