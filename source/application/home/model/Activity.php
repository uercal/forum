<?php

namespace app\home\model;

use app\common\model\Activity as ActivityModel;
use think\Request;

/**
 * 模型 
 * @package app\store\model
 */
class Activity extends ActivityModel
{
    public function getDataList()
    {
        // 
        $request = Request::instance();

        $map = [];
        if (input('sort')) {
            $order = 'create_time ' . input('sort');
        } else {
            $order = 'create_time asc';
        }
        // 
        if (input('title')) {
            $map['title'] = ['like', '%' . input('title') . '%'];
        }
        $list = $this->where($map)->order($order)
            ->paginate(9, false, ['query' => $request->request()]);


        return compact('list');
    }
}
