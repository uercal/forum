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
    public function getDataList($number = null)
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
        $_number = $number ? $number : 9;
        $list = $this->with(['cover'])->where($map)->order($order)
            ->paginate($_number, false, ['query' => $request->request()]);


        return compact('list');
    }
}
