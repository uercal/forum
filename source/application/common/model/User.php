<?php

namespace app\common\model;

use think\Request;

/**
 * 用户模型类
 * Class User
 * @package app\common\model
 */
class User extends BaseModel
{
    protected $name = 'users';


    public function getRoleAttr($valu, $data)
    {
        return [0 => '普通会员', 1 => '个人会员', 2 => '专家会员', 3 => '单位会员'][$data['role']];
    }

    /**
     * 获取用户列表
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getList()
    {
        $request = Request::instance();
        return $this->order(['create_time' => 'desc'])
            ->paginate(15, false, ['query' => $request->request()]);
    }



    public function getListByRole($role)
    {
        $request = Request::instance();
        return $this->where([
            'role' => $role
        ])->order(['create_time' => 'desc'])
            ->paginate(15, false, ['query' => $request->request()]);
    }

    /**
     * 获取用户信息
     * @param $where
     * @return null|static
     * @throws \think\exception\DbException
     */
    public static function detail($where)
    {
        return self::get($where);
    }
}
