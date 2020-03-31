<?php

namespace app\common\model;

use app\common\model\UploadApiFile;
use function Qiniu\json_decode;

/**
 * 用户模型类
 * Class User
 * @package app\common\model
 */
class UserSup extends BaseModel
{
    protected $name = 'users_sup';
    protected $append = [
        'id_photo_path', 'person_file_path',
        'sup_eng_cate_text', 'sup_goods_cate_text', 'sup_server_cate_text',
        'sup_eng_cate_name', 'sup_goods_cate_name', 'sup_server_cate_name',
        'sup_build_time_text',
    ];

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
        $obj['sup_eng_cate'] = json_decode($obj['sup_eng_cate'], true);
        $obj['sup_goods_cate'] = json_decode($obj['sup_goods_cate'], true);
        $obj['sup_server_cate'] = json_decode($obj['sup_server_cate'], true);
        $obj['sup_build_time'] = $obj['sup_build_time_text'];
        //
        unset($obj['create_time']);
        unset($obj['update_time']);
        settype($obj['sup_company_tel'], 'integer');
        settype($obj['sup_manager_phone'], 'integer');
        return $obj;
    }

    public function user()
    {
        return $this->hasOne('User', 'user_id', 'user_id');
    }

    //
    public function getSupEngCateTextAttr($value, $data)
    {
        if (!isset($data['sup_eng_cate'])) {
            return '';
        }
        $arr = json_decode($data['sup_eng_cate'], true);
        $res = [];
        foreach ($arr as $key => $value) {
            $index = $key + 1;
            $res[] = '资质标准类别' . $index . ':' . $value['cate'] . ' , ' . '资质类别等级' . $index . ':' . $value['level'];
        }
        return implode(' | ', $res);
    }

    public function getSupEngCateNameAttr($value, $data)
    {
        if (!isset($data['sup_eng_cate'])) {
            return '';
        }
        $arr = json_decode($data['sup_eng_cate'], true);
        if (empty($arr)) {
            return [];
        }
        $res = [];
        $cates = [];
        $values = [];
        foreach ($arr as $key => $value) {
            $cates[] = $value['cate'].'('.$value['level'].')';
            $values[] = $value['level'];
        }
        if (empty($cates[0])) {
            return [];
        }
        return [implode(',', $cates), implode(',', $values)];
    }

    public function getSupGoodsCateTextAttr($value, $data)
    {
        if (!isset($data['sup_goods_cate'])) {
            return '';
        }
        $arr = json_decode($data['sup_goods_cate'], true);
        $res = [];
        foreach ($arr as $key => $value) {
            $index = $key + 1;
            $res[] = '生产销售许可' . $index . ':' . $value['permit'] . ' , ' . '供应内容' . $index . ':' . $value['content'];
        }
        return implode(' | ', $res);
    }

    public function getSupGoodsCateNameAttr($value, $data)
    {
        if (!isset($data['sup_goods_cate'])) {
            return '';
        }
        $arr = json_decode($data['sup_goods_cate'], true);
        if (empty($arr)) {
            return [];
        }
        $res = [];
        $cates = [];
        $values = [];
        foreach ($arr as $key => $value) {
            $cates[] = $value['permit'];
            $values[] = $value['content'];
        }
        if (empty($cates[0])) {
            return [];
        }
        return [implode(',', $cates), implode(',', $values)];
    }

    public function getSupServerCateTextAttr($value, $data)
    {
        if (!isset($data['sup_server_cate'])) {
            return '';
        }
        $arr = json_decode($data['sup_server_cate'], true);
        $res = [];
        foreach ($arr as $key => $value) {
            if (empty($value['major']) && empty($value['level']) && empty($value['area'])) {
                continue;
            }
            $index = $key + 1;
            $_res = [];
            if (!empty($value['major'])) {
                $_res[] = '资质资格资信专业' . $index . ':' . $value['major'];
            }
            if (!empty($value['level'])) {
                $_res[] = '资质类别等级' . $index . ':' . $value['level'];
            }
            if (!empty($value['area'])) {
                $_res[] = '业务领域' . $index . ':' . $value['area'];
            }
            $res[] = implode(',', $_res);
        }
        if (empty($res)) {
            return '';
        } else {
            return implode(' | ', $res);
        }
    }

    public function getSupServerCateNameAttr($value, $data)
    {
        if (!isset($data['sup_server_cate'])) {
            return '';
        }
        $arr = json_decode($data['sup_server_cate'], true);
        // return $arr;
        $res = [];
        $cates = [];
        $values = [];
        $areas = [];
        foreach ($arr as $key => $value) {
            $cates[] = $value['major'] . '(' . $value['level'] . ')';
            $values[] = $value['level'];
            $area[] = isset($value['area']) ? $value['area'] : '';
        }
        if (empty($cates[0])) {
            return [];
        }
        return [implode(',', $cates), implode(',', $values)];
    }

    public function getSupBuildTimeTextAttr($value, $data)
    {
        if (!isset($data['sup_build_time'])) {
            return '';
        }
        return date('Y-m-d', $data['sup_build_time']);
    }
    //
    public function getIdPhotoPathAttr($value, $data)
    {
        return UploadApiFile::getFilePath($data['id_photo']);
    }

    public function getPersonFilePathAttr($value, $data)
    {
        if (!isset($data['person_file'])) {
            return '';
        }
        return UploadApiFile::getFilePath($data['person_file']);
    }
}
