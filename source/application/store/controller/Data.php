<?php

namespace app\store\controller;

use app\store\model\Category as CategoryModel;
use app\common\model\ListMode;
use app\common\model\DetailMode;

/**
 * 商品管理控制器
 * Class Goods
 * @package app\store\controller
 */
class Data extends Controller
{
    public function index()
    {
        $model = new ArticleModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }
}
