<?php

namespace app\store\controller;

use app\store\model\User as UserModel;
use app\store\model\UserPerson;
use app\store\model\UserCompany;
use app\store\model\UserSup;

/**
 * 用户管理
 * Class User
 * @package app\store\controller
 */
class User extends Controller
{
    /**
     * 用户列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $model = new UserModel;
        $list = $model->getList();
        return $this->fetch('index', compact('list'));
    }

    public function role($role)
    {
        $model = new UserModel;
        $list = $model->getListByRole($role);
        switch ($role) {
            case 0:
                $name = '普通会员';
                break;
            case 1:
                $name = '个人会员';
                break;
            case 2:
                $name = '专家会员';
                break;
            case 3:
                $name = '单位会员';
                break;
            case 4:
                $name = '供应商会员';
                break;
        }

        return $this->fetch('role', compact('role', 'name', 'list'));
    }


    public function show($user_id)
    {
        $detail = UserModel::get($user_id, ['person', 'company', 'supplier']);
        // halt($detail);
        return $this->fetch('show', compact('detail'));
    }


    // daochuliebiao
    public function exportList($role)
    {
        switch ($role) {
            case 1:
                # 个人会员
                $file_name = '个人会员';
                $data = UserPerson::all()->toArray();
                $head = ['序号', '姓名', '性别', '身份证号码', '邮箱', '邮编', '住址',  '手机号码', '毕业学校', '学历学位', 
                '专业', '毕业时间', '所属单位', '职称', '职位', '工作年限', '职称获得时间', '业务行业', '业务领域'];
                $keys = ['index', 'name', 'gender_name', 'id_card', 'email', 'post_code', 'person_address', 'phone', 
                'education_school', 'education_degree', 'education_major', 'education_date', 'belong_company', 'positio', 
                'job', 'work_limit', 'positio_time', 'sector', 'area'];
                break;
            case 2:
                # 专家会员
                $file_name = '专家会员';
                $map = [];
                $map['role'] = ['like', '%2%'];
                $user_ids = UserModel::where($map)->column('user_id');
                $data = UserPerson::whereIn('user_id', $user_ids)->select()->toArray();
                $head = ['序号', '姓名', '性别', '身份证号码', '邮箱', '邮编', '住址',  '手机号码', '毕业学校', '学历学位', 
                '专业', '毕业时间', '所属单位', '职称', '职位', '工作年限', '职称获得时间', '业务行业', '业务领域'];
                $keys = ['index', 'name', 'gender_name', 'id_card', 'email', 'post_code', 'person_address', 'phone', 
                'education_school', 'education_degree', 'education_major', 'education_date', 'belong_company', 'positio',
                 'job', 'work_limit', 'positio_time', 'sector', 'area'];
                break;
            case 3:
                # 单位会员
                $file_name = '单位会员';
                $data = UserCompany::all()->toArray();
                $head = ['序号', '单位名称', '社会统一信用代码', '单位类型', '单位电话', '单位地址',  '成立时间', '服务等级', 
                '法人', '邮箱', '联系人姓名', '联系人职位', '联系人电话', '联系人微信'];
                $keys = ['index', 'company_name', 'company_code', 'company_type', 'company_tel', 'address', 'build_time_text',
                'server_level', 'legal_person', 'email', 'manager_name', 'manager_job', 'manager_phone', 'manager_wechat'];
                break;
            case 4:
                # 供应商
                $file_name = '供应商';
                $data = UserSup::all()->toArray();
                $head = ['序号', '供应商名称', '供应商社会统一信用代码', '供应商类型', '供应商电话', '供应商邮编', '供应商地址',
                  '成立时间', '法人', '邮箱', '联系人姓名', '联系人职位', '联系人电话', '联系人微信', '供应类别（工程类）', '供应类别（货物类）', '供应类别（服务类）'];
                $keys = ['index', 'sup_company_name', 'sup_company_code', 'sup_company_type', 'sup_company_tel', 'sup_post_code', 
                'sup_company_address', 'sup_build_time_text', 'sup_legal_person', 'sup_company_email', 'sup_manager_name', 
                'sup_manager_job', 'sup_manager_phone', 'sup_manager_wechat', 'sup_eng_cate_text', 'sup_goods_cate_text', 'sup_server_cate_text'];
                break;
        }
        
        $excel = new Office;
        $excel->outdata($file_name . '列表清单', $data, $head, $keys);
    }
}
