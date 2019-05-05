<?php

namespace app\store\model;

use app\common\model\AccountMoney;
use app\common\model\Exam as ExamModel;
use app\common\model\PayLog;
use app\common\model\User;
use app\common\model\UserCompany;
use app\common\model\UserPerson;
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
            'introduce' => '个人简介'
        ];

        return $data;
    }

    public static function attrImgMap()
    {
        return [
            // company
            'company_logo',
            // person
            'id_photo'
        ];
    }

    public static function attrFileMap()
    {
        return [
            // company
            'license_file',
            // person
            'person_file'
        ];
    }

    public static function attrTextAreaMap()
    {
        return [
            // company
            'company_intro',
            // person
            'introduce'
        ];
    }



    public function updateStatus($data)
    {
        $obj = $this->where('id', $data['id'])->find();

        $content = json_decode($obj['content'], true);
        // 筛选空值 content
        foreach ($content as $key => $value) {
            if (empty($value)) {
                unset($content[$key]);
            }
        }

        // halt($data);
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
                            break;
                    }


                    // 
                    // 用户认证 更新用户资料
                    $user->save([
                        'role' => $new_role,
                    ]);
                }

                $this->where('id', $data['id'])->update([
                    'status' => $data['status'],
                ]);
            }
            // $type==30 线下提现 确认
            if ($obj['type'] == 30) {
                if ($data['status'] == 20) {
                    // 扣掉余额。
                    $price = $content['cash_price'];
                    $account = new AccountMoney();
                    $account_obj = $account::get($obj['user_id']);
                    $account_obj->setDec('account_money', $price * 100);
                    // payLog 添加
                    $payLog = new PayLog();
                    $payLog->save([
                        'pay_type' => 40, //提现
                        'pay_price' => $price,
                        'user_id' => $obj['user_id'],
                    ]);
                }

                $this->where('id', $data['id'])->update([
                    'status' => $data['status'],
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
