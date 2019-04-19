<?php

namespace app\home\model;

use app\common\model\User as UserModel;
use app\common\model\UserCompany;
use app\common\model\UserPerson;
use think\Request;

/**
 * 用户模型
 * Class User
 * @package app\store\model
 */
class User extends UserModel
{
    public function getUsersList($mode_data)
    {
        // 
        $request = Request::instance();

        $map = [];
        if (input('sort')) {
            $order = 'create_time ' . input('sort');
        } else {
            $order = 'create_time asc';
        }

        if (input('type')) {
            $mode_data = input('type');
        } else {
            $mode_data = 'normal';
        }
        // 
        switch ($mode_data) {
            case 'normal':
                if (input('title')) {
                    $map['user_name'] = ['like', '%' . input('title') . '%'];
                }
                $list = $this->where($map)->order($order)
                    ->paginate(10, false, ['query' => $request->request()]);
                break;
            case 'person':
                # code...
                break;
            case 'expert':
                # code...
                break;
            case 'company':
                # code...
                break;
            case 'supplier':
                # code...
                break;
            default:
                # code...
                break;
        }



        return compact('list');
    }
}
