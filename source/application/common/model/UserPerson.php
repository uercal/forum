<?php

namespace app\common\model;

use app\common\model\UploadApiFile;
use think\Request;

/**
 * 用户模型类
 * Class User
 * @package app\common\model
 */
class UserPerson extends BaseModel
{
    protected $name = 'users_personal';
    protected $append = ['id_photo_path', 'gender_name', 'person_file_path', 'education_date'];

    public static function detail($where)
    {
        return self::get($where);
    }

    public static function detailDate($where)
    {
        $obj =  self::get($where);
        if(!$obj){
            return null;
        }
        $obj = $obj->toArray();        
        $obj['positio_time'] = date('Y-m-d', $obj['positio_time']);
        $obj['education_time'] = date('Y-m-d', $obj['education_time']);        
        $obj['area'] = explode(',',$obj['area']);
        $obj['positio'] = explode(',',$obj['positio']);        
        unset($obj['create_time']);
        unset($obj['update_time']);
        settype($obj['gender'], 'string');
        return $obj;
    }

    public function user()
    {
        return $this->hasOne('User', 'user_id', 'user_id');
    }

    public function getGenderNameAttr($value, $data)
    {
        return $data['gender'] == 1 ? '女' : '男';
    }

    public function getEducationDateAttr($value, $data)
    {
        return date('Y-m-d', $data['education_time']);
    }

    public function getIdPhotoPathAttr($value, $data)
    {
        return UploadApiFile::getFilePath($data['id_photo']);
    }

    public function getPersonFilePathAttr($value, $data)
    {
        return UploadApiFile::getFilePath($data['person_file']);
    }
}
