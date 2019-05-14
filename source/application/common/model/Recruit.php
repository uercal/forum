<?php

namespace app\common\model;

use app\common\model\Region;

/**
 * @package app\common\model
 */
class Recruit extends BaseModel
{
    protected $name = 'recruit';
    protected $append = ['job_education_name', 'job_experience_name', 'job_address_name'];
    protected $updateTime = false;

    protected $job_edu_cate = [
        '0' => '不限',
        '10' => '专科',
        '20' => '本科',
        '30' => '硕士',
        '40' => '博士'
    ];

    protected $job_exp_cate = [
        '-2' => '不限',
        '-1' => '应届生',
        '0,1' => '1年以内',
        '1,3' => '1-3年',
        '3,5' => '3-5年',
        '5,10' => '5-10年',
        '11' => '10年以上'
    ];

    public function user()
    {
        return $this->hasOne('User', 'user_id', 'user_id');
    }


    public function getJobAddressNameAttr($value, $data)
    {
        $region_id = explode(',', $data['job_address'])[1];
        $name = Region::getMergeNameById($region_id);
        return $name;
    }


    public function getJobExperienceNameAttr($value, $data)
    {
        return $this->job_exp_cate[$data['job_experience']];
    }


    public function getJobEducationNameAttr($value, $data)
    {
        return $this->job_edu_cate[$data['job_education']];
    }

    public static function detail($id)
    {
        return self::get($id);
    }
}
