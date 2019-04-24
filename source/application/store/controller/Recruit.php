<?php

namespace app\store\controller;

use app\store\model\Recruit as RecruitModel;

/**
 * 商品管理控制器
 * Class Goods
 * @package app\store\controller
 */
class Recruit extends Controller
{
    public function index()
    {
        $model = new RecruitModel;
        $data = $model->getList();
        $map = $data['map'];
        $list = $data['list'];
        return $this->fetch('index', compact('list', 'map'));
    }

    public function add()
    {
        if (!$this->request->isAjax()) {
            return $this->fetch('add');
        }
        $model = new RecruitModel;
        if ($model->add($this->postData('recruit'))) {
            return $this->renderSuccess('添加成功', url('recruit/index'));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }


    public function edit($id)
    {
        // 商品详情
        $model = RecruitModel::detail($id);
        if (!$this->request->isAjax()) {
            return $this->fetch('edit', compact('model'));
        }
        // 更新记录
        if ($model->edit($this->postData('recruit'))) {
            return $this->renderSuccess('更新成功', url('recruit/index'));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }

    public function delete($id)
    {
        $model = RecruitModel::get($id);
        if (!$model->remove()) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }
}
