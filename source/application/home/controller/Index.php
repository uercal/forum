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
                    if($key_word=='user_news'){
                        $options = UserNewsOption::where('list_id',$model['list']['id'])->select()->toArray();
                        $_data = [];
                        $_data['list'] = $data;
                        $_data['options'] = $options;
                        $data = $_data;
                    }
                }
                break;

            case 'users':
                
                halt($model);


                break;

            default:




                break;
        }


        // halt($data['list'][0]['option']);
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


    public function news()
    {
        $id = input('id');
        $news = News::detail($id);
        // increase        
        !empty($news) ? $news->incRead() : '';
        // halt($detail->toArray());
        return $this->fetch('news', compact('news'));
    }


    public function project()
    {
        $id = input('id');
        $project = Project::detail($id);
        // 
        !empty($project) ? $project->incRead() : '';
        return $this->fetch('project', compact('project'));
    }
}
