<?php

namespace app\store\model;

use app\common\model\Projects as ProjectsModel;
use think\Request;
use think\Db;
/**
 * 地区模型
 * Class Region
 * @package app\store\model
 */
class Projects extends ProjectsModel
{
    public function getList()
    {
        $map = input();
        $_map = [];
        // 
        if (!empty($map['server_cate'])) $_map['server_cate'] = ['like', '%' . $map['server_cate'] . '%'];
        if (!empty($map['eng_cate'])) $_map['eng_cate'] = ['like', '%' . $map['eng_cate'] . '%'];
        if (!empty($map['startDate'])) $_map['assignment_date'] = ['>=', strtotime($map['startDate'])];
        if (!empty($map['endDate'])) $_map['assignment_date'] = ['<=', strtotime($map['endDate'] . ' 23:59:59')];
        
        $list =  $this->where($_map)->order('assignment_date asc')->paginate(15, false, [
            'query' => Request::instance()->request()
        ]);
        return compact('map', 'list');
    }

    public function remove()
    {
        $exam_id = $this->exam_id;
        Db::startTrans();
        try {
            if (!empty($exam_id)) {
                $exam_model = new Exam;
                $exam_model->where(['id' => $exam_id])->delete();
            }
            $this->delete();
            Db::commit();
            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            return false;
            Db::rollback();
        }
    }
	
	public function edit($data){		
		Db::startTrans();
		try {		    		        		
			
		    $this->allowField(true)->save([
				'content'=>$data['content']
			]);
		    Db::commit();
		    return true;
		} catch (\Exception $e) {
		    $this->error = $e->getMessage();
		    return false;
		    Db::rollback();
		}
	}
}
