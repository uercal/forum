<?php

namespace app\common\model;

/**
 * @package app\common\model
 */
class Projects extends BaseModel
{
    protected $name = 'projects';
    protected $append = ['region_span'];

    public function getCates()
    {
        $server_cate = self::$server_cate;
        $eng_cate = self::$eng_cate;
        return compact('server_cate', 'eng_cate');
    }

    public function cover()
    {
        return $this->hasOne('UploadFile', 'file_id', 'cover_id');
    }

    public static $server_cate = [
        '1' => '投资咨询',
        '2' => '招标代理',
        '3' => '勘察',
        '4' => '规划计划',
        '5' => '监理',
        '6' => '造价',
        '7' => '项目管理',
        '8' => '其他服务'
    ];

    public static $eng_cate = [
        'a' => '农业林业',
        'b' => '水利水电',
        'c' => '电力',
        'd' => '煤炭',
        'e' => '石油天然气',
        'f' => '公路',
        'g' => '轨道交通',
        'h' => '民航',
        'i' => '水运',
        'j' => '电子信息',
        'k' => '冶金',
        'l' => '石化化工医药',
        'm' => '核工业',
        'n' => '机械',
        'o' => '轻工纺织',
        'p' => '建材',
        'q' => '建筑',
        'r' => '市政公用',
        's' => '生态环境',
        't' => '水文地质岩土',
        'u' => '其他工程'
    ];

    /**
     * 地区名称
     * @param $value
     * @param $data
     * @return array
     */
    public function getRegionSpanAttr($value, $data)
    {
        return [
            'province' => Region::getNameById($data['province_id']),
            'city' => Region::getNameById($data['city_id']),
            'region' => Region::getNameById($data['region_id']),
        ];
    }

    public function getServerCateAttr($value, $data)
    {
        $arr = explode(',', $data['server_cate']);
        $_arr = [];
        foreach ($arr as $key => $value) {
            $_arr[] = self::$server_cate[$value];
        }
        return $_arr;
    }

    public function getEngCateAttr($value, $data)
    {
        $arr = explode(',', $data['eng_cate']);
        $_arr = [];
        foreach ($arr as $key => $value) {
            $_arr[] = self::$eng_cate[$value];
        }
        return $_arr;
    }

    public static function detail($id)
    {
        return self::get($id);
    }
}
