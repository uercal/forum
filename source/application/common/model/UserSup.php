<?php

namespace app\common\model;

use app\common\model\UploadApiFile;
use think\Request;
use function Qiniu\json_decode;

/**
 * 用户模型类
 * Class User
 * @package app\common\model
 */
class UserSup extends BaseModel
{
    protected $name = 'users_sup';
    protected $append = ['id_photo_path', 'person_file_path', 'sup_eng_cate_text', 'sup_goods_cate_text', 'sup_server_cate_text', 'sup_build_time_text'];

    public static function detail($where)
    {
        return self::get($where);
    }

    public function user()
    {
        return $this->hasOne('User', 'user_id', 'user_id');
    }

    // 
    public function getSupEngCateTextAttr($value, $data)
    {
        $arr = json_decode($data['sup_eng_cate'], true);
        $res = [];
        foreach ($arr as $key => $value) {
            $index = $key + 1;
            $res[] = '资质标准类别' . $index . ':' . $value['cate'] . ' , ' . '资质类别等级' . $index . ':' . $value['level'];
        }
        return implode(' | ', $res);
    }

    public function getSupGoodsCateTextAttr($value, $data)
    {
        $arr = json_decode($data['sup_goods_cate'], true);
        $res = [];
        foreach ($arr as $key => $value) {
            $index = $key + 1;
            $res[] = '生产销售许可' . $index . ':' . $value['permit'] . ' , ' . '供应内容' . $index . ':' . $value['content'];
        }
        return implode(' | ', $res);
    }

    public function getSupServerCateTextAttr($value, $data)
    {
        $arr = json_decode($data['sup_server_cate'], true);
        $res = [];
        foreach ($arr as $key => $value) {
            $index = $key + 1;
            $res[] = '资质资格资信专业' . $index . ':' . $value['major'] . ' , ' . '资质类别等级' . $index . ':' . $value['level'];
        }
        return implode(' | ', $res);
    }

    public function getSupBuildTimeTextAttr($value, $data)
    {
        return date('Y-m-d', $data['sup_build_time']);
    }
    // 
    public function getIdPhotoPathAttr($value, $data)
    {
        return UploadApiFile::getFilePath($data['id_photo']);
    }

    public function getPersonFilePathAttr($value, $data)
    {
        return UploadApiFile::getFilePath($data['person_file']);
    }
}
