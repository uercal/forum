<?php
namespace app\home\controller;

use app\common\model\Article;
use app\common\model\News;
use app\common\model\Project;
use app\store\model\Category;
use app\home\model\Region;
use app\home\model\ListMode;
use app\home\model\ListModel;
use think\Request;
use function Qiniu\json_decode;
use app\home\model\ListDetail;
use app\home\model\Projects;
use app\common\model\UserNewsOption;
use app\home\model\User;
use app\home\model\Activity;
use app\home\model\Crop;
use app\home\model\Recruit;
use app\home\model\ActivitySupport;
use app\home\model\ActivityUserLog;
use app\home\model\UploadApiFile;
use app\home\model\Exam;

/**
 * 个人中心
 * Class Index
 * @package app\store\controller
 */
class Person extends Controller
{
    protected $user;
    protected $msg;
    // 
    public function _initialize()
    {
        parent::_initialize();
        if (!session('forum_user')) {
            return $this->redirect('/');
        } else {
            $this->user = User::detail(session('forum_user')['user']['user_id']);
            // 
            if ($this->user['role'] != session('forum_user')['user']['role']) {
                $this->getResExamMsg('success');
                User::freshUserSession();
            } else {
                $this->getResExamMsg('reject');
            }

            //             
            $this->view->engine->layout('p_layouts/layout');
        }
    }


    public function isSupport($act_id)
    {
        return ActivitySupport::isExist($this->user['user_id'], $act_id);
    }


    public function isSign($act_id)
    {
        return ActivityUserLog::isExist($this->user['user_id'], $act_id);
    }


    /**
     * 活动相关弹窗页面
     * 
     */

    public function support_act($act_id)
    {
        if (!$this->request->isAjax()) {
            // 取消模板
            $this->view->engine->layout(false);
            // 
            $company = $this->user['company'];
            // 
            return $this->fetch('support_act', compact('act_id', 'company'));
        } else {
            if (!$this->isSupport($act_id)) {
                $support = new ActivitySupport;
                if ($support->support($this->postData('sup'), $this->user['user_id'])) {
                    return $this->renderJson(1, '赞助成功');
                } else {
                    return $this->renderJson(0, $support->error);
                }
            } else {
                return $this->renderJson(0, '你已赞助过');
            }
        }
    }


    public function sign_act($act_id)
    {
        if (!$this->request->isAjax()) {
            // 取消模板
            $this->view->engine->layout(false);
            // 
            if (in_array(3, explode(',', $this->user['role']))) {
                // 单位
                $role = 3;
                $info = $this->user['company'];
            } elseif (in_array(1, explode(',', $this->user['role']))) {
                // 个人
                $role = 1;
                $info = $this->user['person'];
            } elseif (in_array(0, explode(',', $this->user['role']))) {
                // 普通
                $role = 0;
                $info = [];
            } else {
                // 
                return $this->redirect('/index/index');
            }

            // 
            return $this->fetch('sign_act', compact('act_id', 'role', 'info'));
        } else {
            if (!$this->isSign($act_id)) {
                $sign = new ActivityUserLog;
                if ($sign->sign($this->postData('sign'), $this->user['user_id'])) {
                    return $this->renderJson(1, '报名成功');
                } else {
                    return $this->renderJson(0, $sign->error);
                }
            } else {
                return $this->renderJson(0, '你已报名过');
            }
        }
    }


    public function quitUser()
    {
        session('forum_user', null);
    }

    /**
     *  个人中心
     */

    public function personCenter()
    {
        if (input('sign_more')) {
            $user = User::detail(['user_id' => session('forum_user')['user']['user_id']]);
            $data = $user->getActLog(5);
            $total = $data['my_act']->toArray()['total'];
            // 
            return $this->fetch('sign_more', compact('data', 'total'));
        } else {
            // 获取角色首页显示的内容
            $user = User::detail(['user_id' => session('forum_user')['user']['user_id']]);
            $data = $user->getActLog();
            // 活动推荐
            $activity = new Activity;
            $act_list = $activity->getDataList(4)['list'];
            // 
            return $this->fetch('index', compact('act_list', 'data'));
        }
    }

    /**
     * 会员升级
     */

    private function getLevelOption()
    {
        $role_arr = explode(',', $this->user['role']);
        $levelOption = $role_arr;
        if (in_array(0, $role_arr)) {
            // 普通会员
            $levelOption = 1;
        } elseif (in_array(1, $role_arr)) {
            // 个人会员
            $levelOption = 2;
        } elseif (in_array(3, $role_arr)) {
            // 单位会员
            $levelOption = 3;
        }
        return $levelOption;
    }


    public function updateGrade()
    {
        $exam_model = new Exam;
        // 是否有正在审批的升级请求
        $obj = $exam_model->where([
            'user_id' => $this->user['user_id'],
            'type' => 10,
            'status' => 10
        ])->find();

        if ($obj) {
            switch ($obj['type_bonus']) {
                case 'person':
                    $obj_type = '个人会员';
                    break;
                case 'company':
                    $obj_type = '单位会员';
                    break;
                case 'expert':
                    $obj_type = '专家会员';
                    break;
                case 'supplier':
                    $obj_type = '供应商';
                    break;
            }
            return $this->fetch('update_ing', compact('obj_type'));
        } else {
            // 
            $levelOption = $this->getLevelOption();
            $roleArr = explode(',', $this->user['role']);
            $fullRole = 0;
            $fullPerson = in_array(2, $roleArr) && in_array(4, $roleArr) && $levelOption == 2;
            $fullCompany = in_array(4, $roleArr) && $levelOption == 3;
            if ($fullPerson || $fullCompany) {
                $fullRole = 1;
            }
            return $this->fetch('update', compact('levelOption', 'roleArr', 'fullRole'));
        }
    }



    public function getResExamMsg($type)
    {
        $exam_model = new Exam;
        $msg = $exam_model->getResMsg($this->user['user_id'], $type);
        if (!empty($msg)) {
            $this->assign('msg', ['type' => $type, 'data' => $msg]);
        }
    }





    /**
     * uploadImg interface
     */
    public function uploadFile(Request $request)
    {
        $param = input('param');
        $file = $request->file('file');
        $file_info = $file->getInfo();
        $file_type = $file_info['type'];
        $upload_api = new UploadApiFile;
        if ($file_type === 'image/png' || $file_type === 'image/jpg' || $file_type === 'image/jpeg' || $file_type === 'application/pdf') {
            //            
            $res = $upload_api->upload($file, $param,  $this->user['user_id']);
            if ($res['code'] == 1) {
                // halt($this->renderSuccess('上传成功', '', $res));
                return $this->renderJsonSuccess('上传成功', '', $res);
            } else {
                return $this->renderJsonError($upload_api->error, '', $res);
            }
        } else {
            return $this->renderJsonError('文件类型错误');
        }
    }


    /**
     * 提交申请 升级
     */
    public function updateAjax()
    {
        $form = $this->postData('form');
        $form_type = input('form_type');
        $exam_model = new Exam;
        // halt([$form,$form_type]);        
        // 
        if ($exam_model->updateExam($form, $form_type, $this->user['user_id'], $this->getLevelOption())) {
            return $this->renderSuccess('申请成功');
        } else {
            return $this->renderError($exam_model->error);
        }
    }



    /**
     * 活动赞助
     */
    public function personSupport()
    {
        return $this->fetch('support');
    }

    public function supportAjax()
    {
        $model = new ActivitySupport;
        $data = $model->getDataAjax($this->user['user_id']);
        return $this->renderSuccess('success', '', $data);
    }

    /**
     * 论文管理
     */

    public function getPaperTypeList()
    {
        $role_arr = explode(',', $this->user['role']);
        $mode = new ListMode;
        if (in_array(3, $role_arr)) {
            $mode_ids = $mode->where('key_word', 'user_news')->whereOr('key_word', 'user_project')->column('id');
        } else {
            $mode_ids = $mode->where(['key_word' => 'user_news'])->column('id');
        }
        $list = new ListModel;
        $_type_list = $list->whereIn('list_mode_id', $mode_ids)->column(['id', 'name']);
        return $_type_list;
    }

    public function personPaper()
    {
        $_type_list = $this->getPaperTypeList();
        $type_list = [];
        foreach ($_type_list as $key => $value) {
            $type_list[] = [
                'text' => $value,
                'value' => $key
            ];
        }
        return $this->fetch('paper', compact('type_list'));
    }



    /**
     *  获取审批相关ajax
     */
    public function paperAjax($type)
    {
        $exam = new Exam;
        $data = $exam->getDataAjax($this->user['user_id'], $type);
        return $this->renderSuccess('success', '', $data);
    }


    public function paperUpload()
    {
        $type_list = $this->getPaperTypeList();

        return $this->fetch('paper_upload', compact('type_list'));
    }


    // ajax
    public function getListInfo($id)
    {
        $list = ListModel::get($id, ['userNewsOption'])->toArray();
        return $list;
    }

    // 论文发布 接口
    public function paperUploadAjax()
    {
        $form = $this->postData('form');
        $exam_model = new Exam;
        // 
        if ($exam_model->updateExam($form, 'paper', $this->user['user_id'], $this->getLevelOption())) {
            return $this->renderSuccess('申请成功');
        } else {
            return $this->renderError($exam_model->error);
        }
    }

    /**
     * 项目提交
     */
    public function personProject()
    {
        return $this->fetch('project');
    }

    public function projectUpload()
    {

        $eng_cate = Projects::$eng_cate;
        $server_cate = Projects::$server_cate;
        // 
        $regionData = Region::getCacheTree();
        foreach ($regionData as $key => $value) {
            $regionData[$key]['children'] = [];
            $regionData[$key]['value'] = $value['id'];
            $regionData[$key]['label'] = $value['name'];
            foreach ($value['city'] as $k => $v) {
                $v['label'] = $v['name'];
                $v['value'] = $v['id'];
                $v['children'] = [];
                foreach ($v['region'] as $_k => $_v) {
                    $_v['label'] = $_v['name'];
                    $_v['value'] = $_v['id'];
                    $v['children'][] = $_v;
                }
                $regionData[$key]['children'][] = $v;
            }
        }
        $region_data = array_values($regionData);
        return $this->fetch('project_upload', compact('eng_cate', 'server_cate', 'region_data'));
    }


    public function projectUploadAjax()
    {
        $form = $this->postData('form');
        $exam_model = new Exam;
        // 
        if ($exam_model->updateExam($form, 'project', $this->user['user_id'], $this->getLevelOption())) {
            return $this->renderSuccess('申请成功');
        } else {
            return $this->renderError($exam_model->error);
        }
    }


    /**
     * 招聘发布
     */
    public function personRecruit()
    {
        return $this->fetch('recruit');
    }


    public function recruitUpload()
    {
        $company_name = $this->user['company']['company_name'];
        $regionData = Region::getCacheTree();
        foreach ($regionData as $key => $value) {
            $regionData[$key]['children'] = [];
            $regionData[$key]['value'] = $value['id'];
            $regionData[$key]['label'] = $value['name'];
            foreach ($value['city'] as $k => $v) {
                $v['label'] = $v['name'];
                $v['value'] = $v['id'];
                $v['children'] = [];
                foreach ($v['region'] as $_k => $_v) {
                    $_v['label'] = $_v['name'];
                    $_v['value'] = $_v['id'];
                    $v['children'][] = $_v;
                }
                $regionData[$key]['children'][] = $v;
            }
        }
        $region_data = array_values($regionData);
        return $this->fetch('recruit_upload', compact('company_name', 'region_data'));
    }

    public function recruitUploadAjax()
    {
        $form = $this->postData('form');
        $exam_model = new Exam;
        // 
        if ($exam_model->updateExam($form, 'recruit', $this->user['user_id'], $this->getLevelOption())) {
            return $this->renderSuccess('申请成功');
        } else {
            return $this->renderError($exam_model->error);
        }
    }






















    /**
     * 账号设置
     */
    public function personConfig()
    {

        return $this->fetch('config');
    }


    /**
     * 子站管理
     */
    public function personSite()
    {

        return $this->fetch('site');
    }

    public function changeHead()
    {
        $crop = new Crop;
        $res = $crop->changeHead();
        if ($res['state'] == 200) {
            // 刷新session
            User::freshUserSession();
        }
        return $res;
    }
}
