<?php

namespace app\home\model;

use app\common\model\ListDetail as ListDetailModel;
use think\Cache;
use think\Request;
use think\Db;


/**
 * 商品分类模型
 * Class Category
 * @package app\store\model
 */
class ListDetail extends ListDetailModel
{
    public function getListDetail($list_id, $key_word)
    {
        $map = [];
        if (input('title')) {
            $map['title'] = ['like', '%' . input('title') . '%'];
        }
        if (input('sort')) {
            $order = 'create_time ' . input('sort');
        } else {
            $order = 'create_time asc';
        }
        $map['list_id'] = ['=', $list_id];

        // 
        switch ($key_word) {
            case 'news':
                $pageNum = 6;
                break;
            case 'mag':
                $pageNum = 10;
                break;
            case 'user_news':
                $pageNum = 10;
                input('option_id') ? $map['option_id'] = ['like', '%' . input('option_id') . '%'] : '';
                break;
            default:
                $pageNum = 10;
                break;
        }        

        // $r = $this->with(['cover'])->where($map)->order($order)->fetchSql(true)->select();
        // halt($r);
        // 
        return $this->with(['cover'])->where($map)->order($order)->paginate($pageNum, false, [
            'query' => Request::instance()->request()
        ]);
    }
}
