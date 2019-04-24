<?php

namespace app\home\model;

use app\common\model\Recruit as RecruitModel;
use think\Request;

/**
 * 模型
 * 
 */
class Recruit extends RecruitModel
{
    public function getDataList($mode_data)
    {
        $map = input();
        $_map = [];
        if ($mode_data == 'admin') {
            $_map['user_id'] = ['=', 0];
        }
        if (input('title')) {
            $_map['job_name'] = ['like', '%' . input('title') . '%'];
        }
        if (input('sort')) {
            $order = 'create_time ' . input('sort');
        } else {
            $order = 'create_time asc';
        }
        //                               
        $list =  $this->where($_map)->order($order)->paginate(10, false, [
            'query' => Request::instance()->request()
        ]);

        return compact('map', 'list');
    }
}
