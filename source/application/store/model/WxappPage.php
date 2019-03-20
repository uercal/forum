<?php

namespace app\store\model;

use app\common\model\WxappPage as WxappPageModel;
use app\common\model\News;

/**
 * 微信小程序diy页面模型
 * Class WxappPage
 * @package app\common\model
 */
class WxappPage extends WxappPageModel
{

    /**
     * 更新页面数据
     * @param $page_data
     * @return bool
     */
    public function edit($page_data)
    {
        //         
        $_page_data = array_column($page_data['items'], null, 'type');

        if(isset($_page_data['nav'])){
            $nav_data = $_page_data['nav']['data'];
            foreach ($nav_data as $key => $value) {
                $nav_data[$key]['coverColorRgb'] = hex2rgb($value['coverColor']);
            }
            $_page_data['nav']['data'] = $nav_data;
        }


        if (isset($_page_data['news'])) {
            $news = $_page_data['news'];
            $news_data = $news['data'];
            $news_ids = array_column($news_data, 'newId');            
            $model = new News;
            $data = $model->with(['cover'])->whereIn('id', $news_ids)->select()->toArray();
            $data = array_column($data, null, 'id');
            if(!empty($data)){
                foreach ($news_data as $key => $value) {
                    $news_data[$key]['imgUrl'] = $data[$value['newId']]['cover']['file_path'];
                }
            }            
            $_page_data['news']['data'] = $news_data;
        }        
        $_page_data = array_column($_page_data,null,'id');        
        $page_data['items'] = $_page_data;

        // 删除wxapp缓存
        Wxapp::deleteCache();
        return $this->save(compact('page_data')) !== false;
    }
}
