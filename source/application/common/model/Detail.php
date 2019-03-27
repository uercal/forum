<?php

namespace app\common\model;

use think\Db;
use app\common\model\UploadFile;
use think\Cache;
use think\Request;


/**
 * 模型
 * Class Detail
 * @package app\common\model
 */
class Detail extends BaseModel
{
    protected $name = 'detail';
    protected $insert = ['wxapp_id' => 10001];
    protected $updateTime = false;

    public function category()
    {
        return $this->belongsTo('Category', 'category_id', 'category_id');
    }

    public function detail_mode()
    {
        return $this->hasOne('DetailMode', 'id', 'detail_mode_id');
    }

    public function getAttachmentAttr($value, $data)
    {
        if (empty($data['attachment_ids'])) {
            return [];
        } else {
            return UploadFile::whereIn('file_id', $data['attachment_ids'])->select()->toArray();
        }
    }

    public static function detail($id)
    {
        return self::get($id, ['category' => ['child' => function ($query) {
            $query->order('sort asc');
        }]]);
    }
}
