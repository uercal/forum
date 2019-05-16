<?php

namespace app\common\model;

use think\Db;
use app\common\model\Article;
use app\common\model\UploadFile;
use think\Cache;
use think\Request;
use app\common\model\UserNewsOption;

/**
 * 新闻模型
 * Class Article
 * @package app\common\model
 */
class ListDetail extends BaseModel
{
    protected $name = 'list_detail';
    protected $append = ['create_time_date', 'option'];
    protected $updateTime = false;

    public function cover()
    {
        return $this->hasOne('UploadFile', 'file_id', 'cover_id');
    }

    public function list()
    {
        return $this->hasOne('ListModel', 'id', 'list_id');
    }

    public function exam()
    {
        return $this->belongsTo('Exam', 'id', 'exam_id');
    }

    public function user()
    {
        return $this->hasOne('User', 'user_id', 'user_id');
    }

    // export using
    public function company()
    {
        return $this->hasOne('UserCompany', 'user_id', 'user_id')->bind([
            'company_name',
            'company_tel',
            'email'
        ]);
    }

    public function person()
    {
        return $this->hasOne('UserPerson', 'user_id', 'user_id')->bind([
            'person_name' => 'name',
            'person_phone' => 'phone',
            'person_job' => 'job',
            'positio'
        ]);
    }



    public function getAttachmentAttr($value, $data)
    {
        if (!empty($data['attachment_ids'])) {
            return UploadFile::whereIn('file_id', $data['attachment_ids'])->select()->toArray();
        } else {
            return [];
        }
    }

    public function getCreateTimeDateAttr($value, $data)
    {
        return date('Y-m-d', $data['create_time']);
    }

    public function getOptionAttr($value, $data)
    {
        if (!empty($data['option_id'])) {
            $arr = UserNewsOption::whereIn('id', $data['option_id'])->select()->toArray();
            return array_column($arr, 'name', null);
        } else {
            return [];
        }
    }


    public function getDataAttr($value, $data)
    {
        $arr = json_decode($data['data'], true);
        if (!empty($arr)) {
            return $arr;
        } else {
            return [];
        }
    }

    public static function detail($id)
    {
        return self::get($id, ['list' => ['mode', 'userNewsOption']]);
    }


    public function getList($map = [])
    {
        return self::where($map)->order('sort desc')->select();
    }


    // 
    public function incRead()
    {
        // 开启事务
        Db::startTrans();
        try {
            $this->setInc('read_count', 1);
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
        }
    }
}
