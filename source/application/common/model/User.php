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

    protected $append = ['show_name', 'avatar', 'role_name'];
    protected $role_attr = [
        0 => '普通会员', 1 => '个人会员', 2 => '专家会员', 3 => '单位会员', 4 => '供应商'
    ];

    // 个人关联
    public function person()
    {
        return $this->hasOne('UserPerson', 'user_id', 'user_id');
    }


    // 单位关联
    public function company()
    {
        return $this->hasOne('UserCompany', 'user_id', 'user_id');
    }


    // 专家关联
    public function expert()
    { }


    // 供应商关联








    public function avatar()
    {
        return $this->hasOne('UploadApiFile', 'file_id', 'avatar');
    }

    public function getShowNameAttr($value, $data)
    {
        $name = $data['user_name'];
        switch ($data['role']) {
            case 1:
                # code...
                break;

            case 2:
                # code...
                break;

            case 3:
                # code...
                break;
        }
        return $name;
    }


    public function getRoleNameAttr($valu, $data)
    {
        $role = explode(',', $data['role']);
        $role_name = '';
        foreach ($role as $key => $value) {
            $role[$key] = $this->role_attr[$value];
        }
        $role = implode(',', $role);
        return $role;
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
        return self::get($where, ['avatar', 'company', 'person']);
    }
}
