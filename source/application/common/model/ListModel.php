<?php

namespace app\common\model;

use think\Db;
use app\common\model\UploadFile;
use think\Cache;
use think\Request;
use app\common\model\ListMode;
use app\home\model\UserNewsOption;

/**
 * 模型
 * Class Detail
 * @package app\common\model
 */
class ListModel extends BaseModel
{
    protected $name = 'list';
    protected $insert = ['wxapp_id' => 10001];
    protected $append = ['options', 'options_arr'];

    public function category()
    {
        return $this->hasOne('Category', 'list_id', 'id');
    }

    public function mode()
    {
        return $this->hasOne('ListMode', 'id', 'list_mode_id');
    }

    public function userNewsOption()
    {
        return $this->hasMany('UserNewsOption', 'list_id', 'id');
    }

    public function listDetail()
    {
        return $this->hasMany('ListDetail', 'list_id', 'id');
    }

    public function getOptionsAttr($value, $data)
    {
        $arr = UserNewsOption::where(['list_id' => $data['id']])->column('name');
        $str = implode(',', $arr);
        return $str;
    }

    public function getOptionsArrAttr($value, $data)
    {
        $arr = UserNewsOption::where(['list_id' => $data['id']])->column('name');
        return $arr;
    }

    public static function getList($type)
    {
        $id = ListMode::where(['key_word' => $type])->value('id');
        return self::where(['list_mode_id' => $id])->order('id')->paginate(15, false, [
            'query' => Request::instance()->request()
        ]);
    }
}
