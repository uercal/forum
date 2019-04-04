<?php

namespace app\common\model;

use think\Db;
use app\common\model\UploadFile;
use think\Cache;
use think\Request;
use app\common\model\ListMode;

/**
 * 模型
 * Class Detail
 * @package app\common\model
 */
class ListModel extends BaseModel
{
    protected $name = 'list';
    protected $insert = ['wxapp_id' => 10001];

    public function mode()
    {
        return $this->hasOne('ListMode', 'id', 'list_mode_id');
    }

    public static function getList($type)
    {
        $id = ListMode::where(['key_word' => $type])->value('id');
        return self::where(['list_mode_id' => $id])->order('id')->paginate(15, false, [
            'query' => Request::instance()->request()
        ]);
    }
}
