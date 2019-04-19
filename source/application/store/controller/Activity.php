<?php

namespace app\store\controller;

use app\store\model\Activity as ActivityModel;

/**
 * 商品管理控制器
 * Class Goods
 * @package app\store\controller
 */
class Activity extends Controller
{
    public function index()
    {
        $model = new ActivityModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    public function add()
    {
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
        $model = new ActivityModel;
        if ($model->add($this->postData('activity'))) {
            return $this->renderSuccess('添加成功', url('activity/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }


    public function edit($id)
    {
        // 商品详情
        $model = ActivityModel::detail($id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
        // 更新记录
        if ($model->edit($this->postData('activity'))) {
            return $this->renderSuccess('更新成功', url('activity/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

    public function delete($id)
    {
        $model = ActivityModel::get($id);
        if (!$model->remove()) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }
}
