<?php

namespace app\store\controller;

use app\store\model\User as UserModel;

/**
 * 用户管理
 * Class User
 * @package app\store\controller
 */
class User extends Controller
{
    /**
     * 用户列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $model = new UserModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    public function role($role)
    {
        $model = new UserModel;
        $list = $model->getListByRole($role);
        switch ($role) {
            case 0:
                $name = '普通会员';
                break;
            case 1:
                $name = '个人会员';
                break;
            case 2:
                $name = '专家会员';
                break;
            case 3:
                $name = '单位会员';
                break;
        }

        return $this->fetch('role', compact('role', 'name', 'list'));
    }
}
