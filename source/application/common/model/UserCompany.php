<?php

namespace app\common\model;

use app\common\model\UploadApiFile;

/**
 * 用户模型类
 * Class User
 * @package app\common\model
 */
class UserCompany extends BaseModel
{
    protected $name = 'users_company';
    protected $append = ['company_logo_path', 'license_file_path', 'build_time_text',
        'eng_cate_text', 'goods_cate_text', 'server_cate_text',
        'eng_cate_name', 'goods_cate_name', 'server_cate_name',
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
        $obj['build_time'] = date('Y-m-d', $obj['build_time']);
        $obj['eng_cate'] = json_decode($obj['eng_cate'], true);
        $obj['goods_cate'] = json_decode($obj['goods_cate'], true);
        $obj['server_cate'] = json_decode($obj['server_cate'], true);
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

    // 网址过滤
    public function getCompanySiteAttr($value,$data){
        if(!empty($data['company_site'])){
            if(strpos($data['company_site'],'https://') ===false && strpos($data['company_site'],'http://') ===false){
                $data['company_site'] = 'http://'.$data['company_site'];
            }
        }
        return $data['company_site'];
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

    //
    public function getEngCateTextAttr($value, $data)
    {
        $arr = json_decode($data['eng_cate'], true);
        $res = [];
        foreach ($arr as $key => $value) {
            $index = $key + 1;
            $res[] = '资质标准类别' . $index . ':' . $value['cate'] . ' , ' . '资质类别等级' . $index . ':' . $value['level'];
        }
        return implode(' | ', $res);
    }

    public function getEngCateNameAttr($value, $data)
    {
        $arr = json_decode($data['eng_cate'], true);
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
        if (empty($cates[0])||$cates[0]=='()') {
            return [];
        }
        return [implode(',', $cates), implode(',', $values)];
    }

    public function getGoodsCateTextAttr($value, $data)
    {
        $arr = json_decode($data['goods_cate'], true);
        $res = [];
        foreach ($arr as $key => $value) {
            $index = $key + 1;
            $res[] = '生产销售许可' . $index . ':' . $value['permit'] . ' , ' . '供应内容' . $index . ':' . $value['content'];
        }
        return implode(' | ', $res);
    }

    public function getGoodsCateNameAttr($value, $data)
    {
        $arr = json_decode($data['goods_cate'], true);
        if (empty($arr)) {
            return [];
        }
        $res = [];
        $cates = [];
        $values = [];
        foreach ($arr as $key => $value) {
            $cates[] = $value['permit'].'('.$value['content'].')';
            $values[] = $value['content'];
        }
        if (empty($cates[0])||$cates[0]=='()') {
            return [];
        }
        return [implode(',', $cates), implode(',', $values)];
    }

    public function getServerCateTextAttr($value, $data)
    {
        if (!isset($data['server_cate'])) {
            return '';
        }
        $arr = json_decode($data['server_cate'], true);
        $res = [];
        foreach ($arr as $key => $value) {
            if (empty($value['major'])||empty($value['level'])||empty($value['area'])) {
                continue;
            }
            $index = $key + 1;
            $res[] = '资质资格资信专业' . $index . ':' . $value['major'] . ' , ' . '资质类别等级'
                . $index . ':' . $value['level'] . ' , ' . '业务领域' . $index . ':' . implode(',', $value['area']);
        }
        if (empty($res)) {
            return '';
        } else {
            return implode(' | ', $res);
        }
    }

    public function getServerCateNameAttr($value, $data)
    {
        if (!isset($data['server_cate'])) {
            return '';
        }
        $arr = json_decode($data['server_cate'], true);
        $res = [];
        $cates = [];
        $values = [];
        $areas = [];
        foreach ($arr as $key => $value) {
            $cates[] = $value['major'].'('.$value['level'].')';
            $values[] = $value['level'];
            $areas[] = isset($value['area'])?implode(',', $value['area']):'';
        }
        if (empty($cates[0])||$cates[0]=='()') {
            return [];
        }
        return [implode(',', $cates), implode(',', $values),implode(',', $areas)];
    }
}
