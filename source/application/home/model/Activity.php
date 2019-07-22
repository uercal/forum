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

    protected $append = ['active_time', 'status_name', 'status'];

    public function getActiveTimeAttr($value, $data)
    {
        return date('Y/m/d', $data['active_begin']) . '~' . date('Y/m/d', $data['active_end']);
    }

    public function getDataList($number = null)
    {
        //
        $request = Request::instance();

        $map = [];
        if (input('sort')) {
            $order = 'create_time ' . input('sort');
        } else {
            $order = 'sort desc';
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
