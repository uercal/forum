<?php

namespace app\home\controller;

use app\common\model\Article;
use app\common\model\News;
use app\common\model\Project;
use app\store\model\Category;
use think\Request;
use function Qiniu\json_decode;
use app\home\model\ListDetail;
use app\home\model\ListMode;
use app\home\model\Projects;
use app\common\model\UserNewsOption;
use app\home\model\User;
use app\home\model\Activity;
use app\home\model\Crop;
use app\home\model\Recruit;
use app\common\model\ActivitySupport;
use app\home\model\ActivityUserLog;
use app\common\model\UserQuestion;

/**
 * 后台首页
 * Class Index
 * @package app\store\controller
 */
class Index extends Controller
{

    /**
     * 判断是否子网站
     */
    public function checkChildSite()
    {


        // 验证规则
        // return $this->redirect('index/index');
    }

    public function _empty()
    {
        return $this->fetch('404');
    }


    public function index()
    {
        return $this->fetch('index/index');
    }

    public function test()
    {
        // 取消模板
        $this->view->engine->layout(false);
        return $this->fetch();
    }

    public function login_index()
    {
        if (!$this->request->isAjax()) {

            // 取消模板
            $this->view->engine->layout(false);
            // 
            return $this->fetch();
        } else {
            if (!captcha_check(input('code'))) {
                return $this->renderJson(0, '验证码输入错误');
            };
            $data = input()['user'];
            $user = new User;
            if ($user->login($data)) {
                return $this->renderJson(1, '登录成功');
            } else {
                return $this->renderJson(0, $user->error);
            }
        }
    }

    // 
    public function forget_pass()
    {
        $user = new User;

        if (!$this->request->isAjax()) {
            // 取消模板
            $this->view->engine->layout(false);
            //                         
            if (!input('username')) {
                $question = UserQuestion::all();
                $this->assign('question', $question);
            } else {
                $res = $user->isPassProtect(input());
                if (!$res) {
                    $this->assign('error', $user->error);
                } else {
                    $this->assign('param', [
                        'user_name' => input('username'),
                        'question_id' => input('question_id'),
                        'answer' => input('answer')
                    ]);
                }
            }
            // 
            return $this->fetch();
        } else {
            $data = input();
            if ($user->editPass($data)) {
                return $this->renderJson(1, '密码修改成功');
            } else {
                return $this->renderJson(0, $user->error);
            }
        }
    }

    public function register_index()
    {
        if (!$this->request->isAjax()) {
            // 取消模板
            $this->view->engine->layout(false);
            //             
            $question = UserQuestion::all();
            $this->assign('question', $question);
            // 
            return $this->fetch();
        } else {
            if (!captcha_check(input('code'))) {
                return $this->renderJson(0, '验证码输入错误');
            };
            $data = input()['user'];
            $user = new User;
            if ($user->register($data)) {
                $user->accessLogin($data);
                return $this->renderJson(1, '注册成功');
            } else {
                return $this->renderJson(0, $user->error);
            }
        }
    }


    public function quitUser()
    {
        session('forum_user', null);
    }


    // 页面跳转
    public function category($category_id)
    {
        $model = Category::get($category_id, [
            'parent',
            'listMode',
            'list' => ['list_detail' => ['cover']]
        ]);
        $mode = $model['mode'];
        switch ($mode) {
            case 'list':
                $list_detail_model = new ListDetail;
                $key_word = $model['list']['mode']['key_word'];
                $key_word = $key_word ? $key_word : $model['list_mode']['key_word'];
                if ($key_word == 'user_project') {
                    $project = new Projects;
                    $data = $project->getListData();
                } else {
                    $data = $list_detail_model->getListDetail($model['list']['id'], $key_word);
                    if ($key_word == 'user_news' || $key_word == 'news' || $key_word == 'mag') {
                        $options = UserNewsOption::where('list_id', $model['list']['id'])->select()->toArray();
                        $_data = [];
                        $_data['list'] = $data;
                        array_unshift($options, ['id' => 0, 'name' => '全部']);
                        $_data['options'] = $options;
                        $data = $_data;
                    }
                }
                break;

            case 'users':

                $user = new User;
                $data = $user->getUsersList($model['mode_data']);
                break;

            case 'activity':

                $activity = new Activity;
                $data = $activity->getDataList();

                break;

            case 'recruit':
                $recruit_model = new Recruit;
                $data = $recruit_model->getDataList($model['mode_data']);
                break;

            case 'detail':

                break;

            default:

                break;
        }
        // halt($data['list']->toArray());        
        return $this->fetch($mode, compact('model', 'data', 'key_word'));
    }


    public function article()
    {
        $id = input('id');
        $detail = Article::detail($id);
        //
        if ($detail['type'] == 2) {
            $list = $detail->getImagePage();
            return $this->fetch('article', compact('detail', 'list'));
        }
        if ($detail['type'] == 3) {
            $list = $detail->getNews();
            // halt(checkCN($list[0]['content']));
            return $this->fetch('article', compact('detail', 'list'));
        }
        return $this->fetch('article', compact('detail'));
    }



    public function activity($id)
    {
        $Category = new Category;
        $model = $Category->where('mode', 'activity')->find();
        $detail = Activity::detail($id);
        $is_support = ActivitySupport::isExist(session('forum_user')['user']['user_id'], $id);
        $is_sign = ActivityUserLog::isExist(session('forum_user')['user']['user_id'], $id);
        return $this->fetch('activity_detail', compact('detail', 'model', 'is_support', 'is_sign'));
    }

    public function recruit($id, $category_id = 0)
    {
        $detail = Recruit::detail($id);
        // 
        if ($category_id != 0) {
            $model = Category::get($category_id, ['listMode', 'list']);
        } else {
            $model = Category::with(['listMode', 'list'])->where(['mode' => 'recruit', 'mode_data' => ''])->find();
        }

        return $this->fetch('recruit_detail', compact('detail', 'model'));
    }



    public function listJumpCate($list_id)
    {
        $category_id = Category::get(['list_id' => $list_id])['category_id'];
        return $this->redirect('category', ['category_id' => $category_id]);
    }

    public function activityMore()
    {
        $category_id = Category::get(['mode' => 'activity'])['category_id'];
        return $this->redirect('category', ['category_id' => $category_id]);
    }


    public function userNewsMore()
    {
        $list_mode_id = ListMode::where(['key_word' => 'user_project'])->value('id');
        $category_id = Category::get(['list_mode_id' => $list_mode_id, 'mode' => 'list'])['category_id'];
        return $this->redirect('category', ['category_id' => $category_id]);
    }


    public function listDetail($id, $category_id = 0)
    {
        $detail = ListDetail::detail($id);
        // 
        if ($category_id != 0) {
            $model = Category::get($category_id, ['listMode', 'list']);
        } else {

            $category_id = $detail['list']['category']['category_id'];
            $model = Category::get($category_id, ['listMode', 'list']);
        }
        //         
        return $this->fetch('list_detail', compact('detail', 'model'));
    }


    public function projectDetail($id, $category_id = 0)
    {
        $detail = Projects::detail($id);
        // 
        if ($category_id != 0) {
            $model = Category::get($category_id);
        } else {
            $list_mode_id = ListMode::where(['key_word' => 'user_project'])->value('id');
            $category_id = Category::with(['listMode', 'list'])->where(['list_mode_id' => $list_mode_id])->value('category_id');
            $model = Category::get($category_id);
        }
        //         
        return $this->fetch('project', compact('detail', 'model'));
    }

    public function userDetail($user_id, $category_id, $is_sup = null)
    {
        $detail = User::detail($user_id)->toArray();
        if ($category_id != 0) {
            $model = Category::get($category_id);
        } else {
            $model = Category::where(['mode' => 'users', 'mode_data' => 'normal'])->find();
        }
        if ($is_sup == 1) {
            $is_sup = 1;
        } else {
            $is_sup = 0;
        }
        //         
        return $this->fetch('user_detail', compact('detail', 'model', 'is_sup'));
    }
}
