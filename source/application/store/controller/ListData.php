<?php

namespace app\store\controller;

use app\store\model\ListMode;
use app\common\model\DetailMode;
use app\store\model\ListDetail;
use app\store\model\ListModel;
use app\common\model\JobSort;
use app\store\model\UserNewsOption;


/**
 * 列表数据控制器
 * Class Goods
 * @package app\store\controller
 */
class ListData extends Controller
{
    // 列表
    public function index($mode)
    {
        $model = new ListModel;
        $list = $model->getList($mode);
        $mode = ListMode::where(['key_word' => $mode])->find();
        return $this->fetch('index', compact('list', 'mode'));
    }

    public function list_add($mode_id)
    {
        $mode = ListMode::get($mode_id);
        if (!$this->request->isAjax()) {
            return $this->fetch('list_add', compact('mode'));
        }
        $model = new ListModel;
        if ($model->add($this->postData('list'))) {
            return $this->renderSuccess('添加成功', url('list_data/index&mode=') . $mode['key_word']);
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    public function list_edit($id)
    {
        $model = ListModel::get($id, ['mode']);
        if (!$this->request->isAjax()) {
            return $this->fetch('list_edit', compact('model'));
        }
        // 更新记录
        if ($model->edit($this->postData('list'))) {
            return $this->renderSuccess('更新成功', url('list_data/index&mode=') . $model['mode']['key_word']);
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }


    // 列表下详情
    public function list_detail($id)
    {
        $model = ListModel::get($id);
        $list_detail_model = new ListDetail;
        $list = $list_detail_model->getList(['list_id' => $model['id']]);
        return $this->fetch('list_detail', compact('model', 'list'));
    }


    public function user_project(){
        
    }








    //职务列表模式的职位排序
    public function job_sort($list_id)
    {
        $model = ListModel::get($list_id);
        $jobModel = new JobSort;
        if (!$this->request->isAjax()) {
            $data = $jobModel->getInfo($list_id);
            return $this->fetch('job_sort', compact('data', 'model'));
        }
        // 更新记录
        if ($jobModel->updateData($list_id, $this->postData('data'))) {
            return $this->renderSuccess('更新成功', url('list_data/list_detail', ['id' => $list_id]));
        }
        $error = $jobModel->getError() ?: '更新失败';
        return $this->renderError($error);
    }



    // 会员文章列表下 是否详情有类别 以及类别选项
    // public function list_detail_category($list_id)
    // {
    //     $model = ListModel::get($list_id);
    //     $jobModel = new JobSort;
    //     if (!$this->request->isAjax()) {
    //         $data = $jobModel->getInfoForUser($list_id);
    //         return $this->fetch('job_sort_user', compact('data','model'));
    //     }
    //     // 更新记录
    //     if ($jobModel->updateForUser($list_id, $this->postData('data'))) {
    //         return $this->renderSuccess('更新成功', url('list_data/list_detail', ['id' => $list_id]));
    //     }
    //     $error = $jobModel->getError() ?: '更新失败';
    //     return $this->renderError($error);
    // }


    // 详情操作
    public function detail_add($list_id)
    {
        $list = ListModel::get($list_id, ['mode']);
        if (!$this->request->isAjax()) {
            if ($list['mode']['key_word'] == 'user_news' && $list['cate_exist'] == 1) {
                $option = UserNewsOption::select();
                return $this->fetch('detail_add', compact('list', 'option'));
            } else {
                return $this->fetch('detail_add', compact('list'));
            }
        }
        $model = new ListDetail;
        if ($model->add($this->postData('detail'), $list['mode']['key_word'])) {
            return $this->renderSuccess('添加成功', url('list_data/list_detail', ['id' => $list['id']]));
        }
        $error = $model->getError() ?: '添加失败';
        return $this->renderError($error);
    }

    public function detail_edit($id)
    {
        // 商品详情
        $model = ListDetail::detail($id);
        if (!$this->request->isAjax()) {
            return $this->fetch('detail_edit', compact('model'));
        }
        // 更新记录
        if ($model->edit($this->postData('detail'), $model['list']['mode']['key_word'])) {
            return $this->renderSuccess('更新成功', url('list_data/list_detail', ['id' => $model['list']['id']]));
        }
        $error = $model->getError() ?: '更新失败';
        return $this->renderError($error);
    }


    public function detail_delect($id)
    {
        $model = News::get($id);
        if (!$model->remove($id)) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }

}
