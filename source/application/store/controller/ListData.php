<?php

namespace app\store\controller;

use app\common\model\JobSort;
use app\store\model\ListDetail;
use app\store\model\ListMode;
use app\store\model\ListModel;
use app\store\model\Projects;
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
            if ($model['mode']['key_word'] == 'job') {
                $all_list = ListModel::field('id,id as value,name as title')->where(['id' => ['<>', $id], 'list_mode_id' => $model['list_mode_id']])->select()->toArray();
                $pre_lists = explode(',', $model['pre_lists']);
                $this->assign('all_list', $all_list);
                $this->assign('pre_lists', $pre_lists);
            }
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

    /**
     * 导出列表清单
     */
    public function exportList($id)
    {
        $excel = new Office;
        $detail = ListModel::get($id);
        $model = new ListDetail;
        $data = $model->with(['person', 'company'])->where(['list_id' => $id])->select();
        //设置表头：
        $head = ['序号', '标题', '发布时间', '发布人个人姓名', '发布人个人电话', '发布人单位名称', '发布人单位电话'];

        //数据中对应的字段，用于读取相应数据：
        $keys = ['index', 'title', 'create_time', 'person_name', 'person_phone', 'company_name', 'company_tel'];

        $excel->outdata($detail['name'] . '清单', $data, $head, $keys);
    }

    public function exportProject()
    {
        $excel = new Office;
        $data = Projects::all(null, ['company'])->toArray();
        //设置表头：
        $head = ['序号', '项目标题', '服务类别', '工程类别', '合同金额（万元）', '总投资额（万元）', '合同签订日期', '项目公司名称'];

        //数据中对应的字段，用于读取相应数据：
        $keys = ['index', 'title', 'server_cate_span', 'eng_cate_span', 'assignment_money', 'total_invest', 'assignment_date_time', 'company_name'];

        $excel->outdata('会员项目清单', $data, $head, $keys);
    }

    public function user_project()
    {
        $project = new Projects;
        $data = $project->getList();
        $list = $data['list'];
        $map = $data['map'];
        $cates = $project->getCates();
        // halt(compact('list', 'cates', 'map'));
        return $this->fetch('projects', compact('list', 'cates', 'map'));
    }

    public function project_detail($id)
    {
        $model = Projects::get($id);
        // halt($model->toArray());
        return $this->fetch('project_detail', compact('model'));
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
            $key_word = $list['mode']['key_word'];
            if (($key_word == 'user_news' || $key_word == 'news' || $key_word == 'mag') && $list['cate_exist'] == 1) {
                $option = UserNewsOption::where('list_id', $list_id)->select();
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

    public function list_delete($id)
    {
        $model = ListModel::get($id);
        if (!$model->remove()) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }

    public function detail_delete($id)
    {
        $model = ListDetail::get($id);
        if (!$model->remove($id)) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }

    public function project_delete($id)
    {
        $model = Projects::get($id);
        if (!$model->remove($id)) {
            $error = $model->getError() ?: '删除失败';
            return $this->renderError($error);
        }
        return $this->renderSuccess('删除成功');
    }
}
