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
    protected $append = ['company_logo_path', 'license_file_path', 'build_time_text'];



    public static function detail($where)
    {
        return self::get($where);
    }

    public static function detailDate($where)
    {
        $obj = self::get($where);
        if (!$obj) {
            return null;
        }
        $obj = $obj->toArray();
        $obj['build_time'] = date('Y-m-d', $obj['build_time']);
        unset($obj['create_time']);
        unset($obj['update_time']);
        // 
        settype($obj['manager_phone'], 'integer');
        // 
        return $obj;
    }

    public function user()
    {
        return $this->hasOne('User', 'user_id', 'user_id');
    }

    public function getBuildTimeTextAttr($value, $data)
    {
        return date('Y-m-d', $data['build_time']);
    }

    public function getCompanyLogoPathAttr($value, $data)
    {
        return UploadApiFile::getFilePath($data['company_logo']);
    }

    public function getLicenseFilePathAttr($value, $data)
    {
        return UploadApiFile::getFilePath($data['license_file']);
    }
}
