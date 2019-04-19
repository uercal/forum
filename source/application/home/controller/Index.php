<?php
namespace app\home\controller;

use app\common\model\Article;
use app\common\model\News;
use app\common\model\Project;
use app\store\model\Category;
use think\Request;
use function Qiniu\json_decode;
use app\home\model\ListDetail;
use app\home\model\Projects;
use app\common\model\UserNewsOption;
use app\home\model\User;
use app\home\model\Activity;

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
        $code = $this->request->action();
        return $this->fetch('404');
        return $this->redirect('index');
    }


    public function index()
    {
        // 新闻列表        
        return $this->fetch('index/index');
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
                    if ($key_word == 'user_news') {
                        $options = UserNewsOption::where('list_id', $model['list']['id'])->select()->toArray();
                        $_data = [];
                        $_data['list'] = $data;
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

            case 'detail':

                break;

            default:




                break;
        }


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
        return $this->fetch('activity_detail', compact('detail', 'model'));
    }





    public function listJumpCate($list_id)
    {
        $category_id = Category::get(['list_id' => $list_id])['category_id'];
        return $this->redirect('/category', ['category_id' => $category_id]);
    }

    public function activityMore()
    {
        $category_id = Category::get(['mode' => 'activity'])['category_id'];
        return $this->redirect('/category', ['category_id' => $category_id]);
    }


    // public function news()
    // {
    //     $id = input('id');
    //     $news = News::detail($id);
    //     // increase        
    //     !empty($news) ? $news->incRead() : '';
    //     // halt($detail->toArray());
    //     return $this->fetch('news', compact('news'));
    // }


    public function projectDetail($id, $category_id)
    {
        $model = Category::get($category_id);
        $detail = Projects::detail($id);
        //         
        return $this->fetch('project', compact('detail', 'model'));
    }

    public function userDetail($user_id, $category_id)
    {
        $model = Category::get($category_id);
        $detail = User::detail($user_id)->toArray();
        // halt($detail['avatar']);
        //         
        return $this->fetch('user_detail', compact('detail', 'model'));
    }
}
