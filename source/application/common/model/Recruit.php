<?php

namespace app\common\model;

/**
 * @package app\common\model
 */
class Recruit extends BaseModel
{
    protected $name = 'recruit';
    protected $append = ['job_education_name', 'job_experience_name'];

    protected $job_edu_cate = [
        '0' => '不限',
        '10' => '专科',
        '20' => '本科',
        '30' => '硕士',
        '40' => '博士'
    ];

    public function user()
    {
        return $this->hasOne('User', 'user_id', 'user_id');
    }


    public function getJobExperienceNameAttr($value, $data)
    {
        $b = explode(',', $data['job_experience'])[0];
        $e = explode(',', $data['job_experience'])[1];

        if ($b == $e) {
            return $b . '年';
        } else if ($b == 0) {
            return $e . '年内';
        } else {
            return $b . '-' . $e . '年';
        }
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
