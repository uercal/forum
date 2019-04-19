<?php

namespace app\common\model;

use think\Request;

/**
 * 用户模型类
 * Class User
 * @package app\common\model
 */
class UserPerson extends BaseModel
{
    protected $name = 'users_personal';
        
    public static function detail($where)
    {
        return self::get($where);
    }
}
