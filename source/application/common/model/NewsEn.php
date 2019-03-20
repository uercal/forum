<?php

namespace app\common\model;

use think\Db;
use app\common\model\Article;
use app\common\model\UploadFile;
use think\Cache;
use think\Request;


/**
 * 新闻模型
 * Class Article
 * @package app\common\model
 */
class NewsEn extends BaseModel
{
    protected $name = 'news_en';
    // protected $insert = ['wxapp_id' => 10001];


    public function parent()
    {
        return $this->hasOne('ArticleEn', 'id', 'pid');
    }


    public function cover()
    {
        return $this->hasOne('UploadFile', 'file_id', 'cover_id');
    }


    public static function detail($id)
    {
        return self::get($id, ['parent' => ['parent' => ['child']]]);
    }


    public function getList($map = [])
    {
        return self::where($map)->order('sort desc')->select();
    }

    public static function getPTree()
    {
        return ArticleEn::where(['type' => 3])->select();
    }

    // 
    public function incRead()
    {
        // 开启事务
        Db::startTrans();
        try {
            $this->setInc('read_count', 1);
            Db::commit();            
        } catch (\Exception $e) {
            Db::rollback();
        }        
    }
}
