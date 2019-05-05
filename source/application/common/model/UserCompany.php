<?php

namespace app\common\model;

use app\common\model\UploadApiFile;
use think\Request;

/**
 * 用户模型类
 * Class User
 * @package app\common\model
 */
class UserCompany extends BaseModel
{
    protected $name = 'users_company';
    protected $append = ['company_logo_path'];



    public static function detail($where)
    {
        return self::get($where);
    }

    public function user()
    {
        return $this->hasOne('User', 'user_id', 'user_id');
    }


    public function getCompanyLogoPathAttr($value, $data)
    {
        return UploadApiFile::getFilePath($data['company_logo']);
    }
}
