<?php

namespace app\store\controller;

use app\store\model\Article as ArticleModel;
use app\store\model\Category as CategoryModel;
use app\common\model\ListMode;
use app\common\model\DetailMode;

/**
 * 商品管理控制器
 * Class Goods
 * @package app\store\controller
 */
class Article extends Controller
{
    /**
     * 商品列表(出售中)
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $model = new ArticleModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }


    public function parent()
    {
        $model = new ArticleModel;
        $list = $model->getPList();
        return $this->fetch('parent', compact('list'));
    }

    public function category()
    {
        $model = new CategoryModel;
        $list = $model->getCacheTree();
        return $this->fetch('category', compact('list'));
    }


    public function category_add()
    {
        $model = new CategoryModel;
        if (!$this->request->isAjax()) {
            // 获取所有地区
            $list = $model->getCacheTree();
            // 获取列表模式列表            
            $list_mode_list = ListMode::getList();
            // 获取详情模式列表            
            $detail_type_list = DetailMode::getList();            
            return $this->fetch('category_add', compact('list', 'list_mode_list', 'detail_type_list'));
        }
        // 新增记录
        if ($model->add($this->postData('category'))) {
            return $this->renderSuccess('添加成功', url('article/category'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    public function category_edit($category_id)
    {
        // 模板详情
        $model = CategoryModel::get($category_id, ['image', 'detail']);
        // halt($model['detail']['attachment']);
        if (!$this->request->isAjax()) {
            // 获取所有地区
            $list = $model->getCacheTree();
            // 获取列表模式列表            
            $list_mode_list = ListMode::getList();
            // 获取详情模式列表            
            $detail_type_list = DetailMode::getList();

            return $this->fetch('category_edit', compact('model', 'list', 'list_mode_list', 'detail_type_list'));
        }
        // 更新记录
        if ($model->edit($this->postData('category'))) {
            return $this->renderSuccess('更新成功', url('article/category'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

    /**
     * 添加商品
     * @return array|mixed
     */
    public function add()
    {
        if (!$this->request->isAjax()) {
            $p_list = ArticleModel::getPTree();
            return $this->fetch('add', compact('p_list'));
        }
        $model = new ArticleModel;
        if ($model->add($this->postData('article'))) {
            return $this->renderSuccess('添加成功', url('article/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }


    public function parent_add()
    {
        if (!$this->request->isAjax()) {
            $type = ArticleModel::getTypeTree();
            return $this->fetch('parent_add', compact('type'));
        }
        $model = new ArticleModel;
        if ($model->add($this->postData('article'))) {
            return $this->renderSuccess('添加成功', url('article/parent'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    /**
     * 删除商品
     * @param $goods_id
     * @return array
     * @throws \think\exception\DbException
     */
    public function delete($article_id)
    {
        $model = ArticleModel::get($article_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    /**
     * 商品编辑
     * @param $goods_id
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    public function edit($id)
    {
        // 商品详情
        $model = ArticleModel::detail($id);
        if (!$this->request->isAjax()) {
            if ($model['pid'] == 0) {
                // parent
                return $this->fetch('parent_edit', compact('model'));
            } else {
                $p_list = ArticleModel::getPTree();
                return $this->fetch('edit', compact('model', 'p_list'));
            }
        }
        // 更新记录
        if ($model->edit($this->postData('article'))) {
            return $this->renderSuccess('更新成功', url('article/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
}
