<?php

namespace app\common\model;

use think\Request;
use function Qiniu\json_decode;

/**
 * 用户子站类
 * Class User
 * @package app\common\model
 */
class UserSite extends BaseModel
{
    protected $name = 'users_site';
    protected $updateTime = false;

    public static function detail($where)
    {
        return self::get($where);
    }

    public function user()
    {
        return $this->hasOne('User', 'user_id', 'user_id');
    }

    public function company()
    {
        return $this->hasOne('UserCompany', 'id', 'user_company_id');
    }
     
}
