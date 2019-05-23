<?php

namespace app\store\model;

use app\common\model\AccountMoney;
use app\common\model\Exam as ExamModel;
use app\common\model\PayLog;
use app\common\model\User;
use app\common\model\UserCompany;
use app\common\model\UserPerson;
use app\common\model\UserSup;
// 
use app\store\model\ListDetail;
use app\store\model\Projects;
use app\store\model\Recruit;
use app\store\model\UserSite;
use think\Db;

/**
 * 审核模型
 * Class Goods.
 */
class Exam extends ExamModel
{

    public $error;


    public static function attrTextMap()
    {
        $data = [
            // 用户升级
            // company
            'company_name' => '单位名称',
            'build_time' => '成立时间',
            'legal_person' => '单位法人',
            'company_code' => '统一社会信用码',
            'company_type' => '单位类型',
            'server_level' => '工程服务资格及等级',
            'company_tel' => '公司电话',
            'address' => '公司地址',
            'email' => '单位邮箱',
            'manager_name' => '联系人姓名',
            'manager_job' => '联系人职务',
            'manager_phone' => '联系人手机',
            'manager_wechat' => '联系人微信号',
            'company_logo' => '单位logo',
            'license_file' => '单位证件附件',
            'company_intro' => '单位简介',
            // person
            'name' => '姓名',
            'id_card' => '身份证',
            'gender' => '性别',
            'email' => '邮箱',
            'phone' => '手机号',
            'post_code' => '邮编',
            'person_address' => '住址',
            'education_school' => '毕业院校',
            'education_degree' => '学历学位',
            'education_major' => '专业',
            'education_time' => '毕业时间',
            'belong_company' => '所在单位',
            'positio' => '职称',
            'job' => '职务',
            'work_limit' => '工作年限',
            'positio_time' => '职称取得时间',
            'sector' => '业务行业',
            'area' => '业务领域',
            'id_photo' => '个人证件照',
            'person_file' => '个人证件附件',
            'introduce' => '个人简介',
            // supplier
            'sup_company_name' => '单位名称',
            'sup_build_time' => '单位成立时间',
            'sup_company_type' => '单位类型',
            'sup_company_code' => '统一社会信用代码',
            'sup_legal_person' => '单位法人',
            'sup_company_tel' => '单位电话',
            'sup_company_email' =>  '单位邮箱',
            'sup_company_address' => '地址',
            'sup_post_code' => '邮编',
            'sup_manager_name' => '联系人姓名',
            'sup_manager_job' => '联系人职务',
            'sup_manager_phone' => '联系人电话',
            'sup_manager_wechat' => '联系人微信号',
            'sup_eng_cate' => '工程类供应',
            'sup_goods_cate' => '货物类供应',
            'sup_server_cate' => '服务类供应',
            'id_photo' => '个人证件照',
            'person_file' => '个人证件附件',
            'sup_intro' => '供应商简介'
        ];

        return $data;
    }

    public static function attrPaperTextMap()
    {
        $data = [
            'list_id' => '论文类型',
            'cover_id' => '封面图',
            'option_id' => '类别',
            'title' => '文章标题',
            'content' => '文章内容'
        ];
        return $data;
    }

    public static function attrProjectTextMap()
    {
        return [
            'title' => '项目标题',
            'cover_id' => '封面图',
            'content' => '项目内容',
            'server_cate' => '服务类别',
            'eng_cate' => '工程类别',
            'cover_id' => '封面图',
            'region_id' => '项目所在地',
            'assignment_money' => '服务合同金额（元）',
            'assignment_date' => '合同签订日期',
            'total_invest' => '总投资金额（元）',
        ];
    }

    public static function attrRecruitTextMap()
    {
        return [
            'job_name' => '招聘职位',
            'job_address' => '工作地点',
            'job_price' => '工作薪资',
            'job_experience' => '工作经验',
            'job_education' => '学历',
            'content' => '招聘详细内容'
        ];
    }





    public static function attrImgMap()
    {
        return [
            // company
            'company_logo',
            // person & supplier
            'id_photo'
        ];
    }

    public static function attrCoverMap()
    {
        return [
            // paper
            'cover_id'
        ];
    }

    public static function attrFileMap()
    {
        return [
            // company
            'license_file',
            // person & supplier
            'person_file'
        ];
    }

    public static function attrTextAreaMap()
    {
        return [
            // company
            'company_intro',
            // person
            'introduce',
            // supplier
            'sup_intro'
        ];
    }



    public static function attrCateArrMap()
    {
        return [
            // supplier
            'sup_eng_cate' => [
                'cate' => '资质标准类别',
                'level' => '资质类别等级'
            ],
            'sup_goods_cate' => [
                'permit' => '生产销售许可',
                'content' => '供应内容'
            ],
            'sup_server_cate' => [
                'major' => '资质资格资信专业',
                'level' => '资质类别等级'
            ]
        ];
    }

    public static function attrContentArrMap()
    {
        return [
            'content'
        ];
    }


    public function updateStatus($data)
    {
        $obj = $this->where('id', $data['id'])->find();

        $content = json_decode($obj['content'], true);

        if (!empty($content)) {
            foreach ($content as $key => $value) {
                if (empty($value)) unset($content[$key]);
            }
        }

        // 开启事务
        Db::startTrans();
        try {
            // $type==10 用户升级
            if ($obj['type'] == 10) {
                $user = User::get($obj['user_id']);
                $role_str = $user['role'];
                $type_bonus = $obj['type_bonus'];
                // 
                if ($data['status'] == 20) {
                    switch ($type_bonus) {
                        case 'person':
                            // 个人会员
                            $role = 1;
                            $new_role = strtr($role_str, 0, $role);
                            $user_model = new UserPerson();
                            $_obj = $user_model::get(['user_id' => $obj['user_id']]);
                            //              
                            $content['education_time'] = strtotime($content['education_time']);
                            $content['positio_time'] = strtotime($content['positio_time']);
                            if ($_obj) {
                                $_obj->save($content);
                            } else {
                                $content['user_id'] = $obj['user_id'];
                                $user_model->save($content);
                            }
                            break;

                        case 'company':
                            // 单位会员
                            $role = 3;
                            $new_role = strtr($role_str, 0, $role);
                            $user_model = new UserCompany();
                            $_obj = $user_model::get(['user_id' => $obj['user_id']]);
                            // 
                            $content['build_time'] = strtotime($content['build_time']);
                            if ($_obj) {
                                $_obj->save($content);
                            } else {
                                $content['user_id'] = $obj['user_id'];
                                $user_model->save($content);
                            }

                            break;

                        case 'expert':
                            $role = 2;
                            $new_role = $role_str . ',2';
                            break;

                        case 'supplier':
                            $role = 4;
                            $new_role = $role_str . ',4';
                            $user_model = new UserSup();
                            $_obj = $user_model::get(['user_id' => $obj['user_id']]);
                            //                             
                            $content['sup_eng_cate'] = json_encode($content['sup_eng_cate']);
                            $content['sup_goods_cate'] = json_encode($content['sup_goods_cate']);
                            $content['sup_server_cate'] = json_encode($content['sup_server_cate']);
                            $content['sup_build_time'] = strtotime($content['sup_build_time']);
                            if ($_obj) {
                                $_obj->save($content);
                            } else {
                                $content['user_id'] = $obj['user_id'];
                                $user_model->save($content);
                            }
                            break;
                    }
                    // 
                    // 用户认证 更新用户资料                    
                    $user->save([
                        'role' => $new_role,
                    ]);
                }

                $this::get(['id', $data['id']])->save([
                    'status' => $data['status'],
                    'bonus' => $data['bonus']
                ]);
            }
            // type==20 论文提交
            if ($obj['type'] == 20) {
                // 
                if ($data['status'] == 20) {
                    //                     
                    $detail = new ListDetail;
                    $detail_data = [
                        'list_id' => $content['list_id'],
                        'title' => $content['title'],
                        'option_id' => isset($content['option_id']) ? implode(',', $content['option_id']) : null,
                        'cover_id' => isset($content['cover_id']) ? $content['cover_id'] : null,
                        'content' => $content['content'],
                        'user_id' => $obj['user_id'],
                        'exam_id' => $obj['id']
                    ];

                    $detail->save($detail_data);
                }

                $this::get(['id', $data['id']])->save([
                    'status' => $data['status'],
                    'bonus' => $data['bonus']
                ]);
            }
            // $type==30 项目提交
            if ($obj['type'] == 30) {
                if ($data['status'] == 20) {
                    //                     
                    $project = new Projects;
                    $pro_data = [
                        'title' => $content['title'],
                        'cover_id' => $content['cover_id'],
                        'content' => $content['content'],
                        'server_cate' => implode(',', $content['server_cate']),
                        'eng_cate' => implode(',', $content['eng_cate']),
                        'city_id' => $content['city_id'],
                        'province_id' => $content['province_id'],
                        'region_id' => $content['region_id'],
                        'assignment_money' => $content['assignment_money'],
                        'assignment_date' => strtotime($content['assignment_date']),
                        'total_invest' => $content['total_invest'],
                        'user_id' => $obj['user_id'],
                        'exam_id' => $obj['id']
                    ];

                    $project->save($pro_data);
                }

                $this::get(['id', $data['id']])->save([
                    'status' => $data['status'],
                    'bonus' => $data['bonus']
                ]);
            }
            // $type==40 招聘提交
            if ($obj['type'] == 40) {
                if ($data['status'] == 20) {
                    //                     
                    $recruit = new Recruit;
                    $recruit_data = [
                        'job_name' => $content['job_name'],
                        'job_address' => implode(',', $content['job_address']),
                        'content' => $content['content'],
                        'job_experience' => $content['job_experience'],
                        'job_price' => implode(',', $content['job_price']),
                        'user_id' => $obj['user_id'],
                        'exam_id' => $obj['id']
                    ];

                    $recruit->save($recruit_data);
                }

                $this::get(['id', $data['id']])->save([
                    'status' => $data['status'],
                    'bonus' => $data['bonus']
                ]);
            }
            // $type==50 子站申请
            if ($obj['type'] == 50) {
                if ($data['status'] == 20) {
                    //                   
                    $company_id = UserCompany::where(['user_id' => $obj['user_id']])->value('id');
                    $siteObj = UserSite::where([
                        'user_id' => $obj['user_id'],
                        'user_company_id' => $company_id
                    ])->find();
                    $site_code = substr(strtoupper(yoshop_hash('wsz' . $obj['user_id'])), 0, 5) . $obj['user_id'];
                    $re = array();
                    for ($i = 0; $i < strlen($site_code); $i++) {
                        $d = substr($site_code, $i, 1);
                        if (is_numeric($d)) {
                            $re[] = strtoupper(chr($d + 65));
                        } else {
                            $re[] = $d;
                        }
                    }
                    $re = implode('', $re);
                    $site_data = [
                        'user_id' => $obj['user_id'],
                        'user_company_id' => $company_id,
                        'site_code' => $re
                    ];
                    if (!$siteObj) {
                        $siteObj = new UserSite;
                    }
                    $siteObj->save($site_data);
                }

                $this::get(['id', $data['id']])->save([
                    'status' => $data['status'],
                    'bonus' => $data['bonus']
                ]);
            }
            Db::commit();

            return true;
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            Db::rollback();
        }

        return false;
    }
}
