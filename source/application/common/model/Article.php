<?php

namespace app\common\model;

use think\Db;
use app\common\model\UploadFile;
use app\common\model\News;
use think\Cache;
use think\Request;


/**
 * 文章分类模型
 * Class Article
 * @package app\common\model
 */
class Article extends BaseModel
{
    protected $name = 'article';
    protected $insert = ['wxapp_id' => 10001];


    public function parent()
    {
        return $this->hasOne('Article', 'id', 'pid');
    }


    public function child()
    {
        return $this->hasMany('Article', 'pid', 'id');
    }

    public function getImageAttr($value, $data)
    {
        $ids = $data['pic_ids'];
        if (empty($ids)) {
            return [];
        } else {
            $ids = json_decode($ids, true);
            $_ids = [];
            foreach ($ids as $key => $value) {
                $_ids[] = $value['id'];
            }
            $imgs = Db::name('upload_file')->whereIn('file_id', $_ids)->select()->toArray();
            foreach ($imgs as $key => $value) {
                foreach ($ids as $k => $v) {
                    if ($v['id'] == $value['file_id']) {
                        $ids[$k]['src'] = self::$base_url . 'uploads/' . $value['file_name'];
                    }
                }
            }
            return $ids;
        }
    }


    public function getBannerAttr($value, $data)
    {
        $id = $data['banner_id'];
        if (empty($id)) {
            return [];
        } else {
            $ids = json_decode($id, true);
            $_id = $ids[0];
            $img = Db::name('upload_file')->where('file_id', $_id['id'])->find();
            $ids[0]['src'] = self::$base_url . 'uploads/' . $img['file_name'];
            return $ids[0];
        }
    }


    public static function detail($id)
    {
        return self::get($id, ['parent' => ['child' => function ($query) {
            $query->order('sort asc');
        }]]);
    }

    public static function getTypeTree()
    {
        return [1 => '图文', 2 => '多图相册', 3 => '新闻列表', 4 => '左图右文'];
    }

    public function getIsChildTextAttr($value, $data)
    {
        $attr = [0 => '不含', 1 => '包含'];
        return $attr[$data['is_child']];
    }

    public function getTypeTextAttr($value, $data)
    {
        $type = [0 => '无', 1 => '图文', 2 => '多图相册', 3 => '新闻列表', 4 => '左图右文'];
        return $type[$data['type']];
    }


    public static function getPTree()
    {
        return self::where(['pid' => 0, 'is_child' => 1])->select();
    }

    public function getList()
    {
        return self::field(['id', 'pid', 'is_child', 'name', 'sort'])->order('sort asc')->select();
    }


    public function getMenuList()
    {
        return self::with(['child' => function ($query) {
            $query->order('sort asc');
        }])->where(['pid' => 0])->order('sort asc')->select();
    }




    public function getImagePage()
    {
        $upload = new UploadFile;
        $ids = $this->pic_ids;
        $ids = json_decode($ids, true);
        $_ids = [];
        if (empty($ids)) return [];
        foreach ($ids as $key => $value) {
            $_ids[] = $value['id'];
        }
        $imgs = $upload->whereIn('file_id', $_ids)->paginate(9, false, [
            'query' => Request::instance()->request()
        ]);
        foreach ($imgs as $key => $value) {
            foreach ($ids as $k => $v) {
                if ($v['id'] == $value->file_id) {
                    $value->title = $v['title'];
                    $value->project_id = $v['project_id'];
                }
            }
        }
        // halt($imgs);
        return $imgs;
    }


    public function getNews()
    {
        $news = new News;
        $pid = $this->id;
        $list = $news->with(['cover'])->where('pid', $pid)->order('sort asc')->paginate(5, false, [
            'query' => Request::instance()->request()
        ]);
        return $list;
    }
}
