<?php

namespace app\common\model;

use think\Request;

/**
 * 用户模型类
 * Class User
 * @package app\common\model
 */
class UserCompany extends BaseModel
{
    protected $name = 'users_company';
        
    public static function detail($where)
    {
        return self::get($where);
    }
}
