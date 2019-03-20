<?php

namespace app\store\controller;

use app\store\model\NewsEn as NewsModel;


/**
 * 控制器
 * Class News
 * @package app\store\controller
 */
class NewsEn extends Controller
{
    public function index()
    {
        $model = new NewsModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }


    public function add()
    {
        if (!$this->request->isAjax()) {
            $p_list = NewsModel::getPTree();            
            return $this->fetch('add', compact('p_list'));
        }
        $model = new NewsModel;
        if ($model->add($this->postData('news'))) {
            return $this->renderSuccess('添加成功', url('news_en/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    public function delete($article_id)
    {
        $model = NewsModel::get($article_id);
        if (!$model->remove()) {
            return $this->renderError('删除失败');
        }
        return $this->renderSuccess('删除成功');
    }

    public function edit($id)
    {
        // 商品详情
        $model = NewsModel::detail($id);
        if (!$this->request->isAjax()) {
            $p_list = NewsModel::getPTree();
            return $this->fetch('edit', compact('model', 'p_list'));
        }
        // 更新记录
        if ($model->edit($this->postData('news'))) {
            return $this->renderSuccess('更新成功', url('news_en/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }
}
