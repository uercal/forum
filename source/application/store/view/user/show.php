<link rel="stylesheet" href="assets/store/css/goods.css">
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">用户信息</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">用户名 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="<?= $detail['user_name'] ?>" disabled="disabled">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">用户头像</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <a href="<?= $detail['avatar_path'] ?>" title="点击查看大图" target="_blank">
                                        <img src="<?= $detail['avatar_path'] ?>" width="144" height="144" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">会员等级（角色） </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="<?= $detail['role_name'] ?>" disabled="disabled">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">上次登录时间 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="<?= date('Y-m-d H:i:s', $detail['last_login']) ?>" disabled="disabled">
                                </div>
                            </div>

                            <!-- person -->
                            <?php if (!empty($detail['person'])) : ?>
                                <div class="widget-head am-cf">
                                    <div class="widget-title am-fl">个人会员信息</div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">姓名 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['name'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">身份证号码 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['id_card'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">性别 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['gender_name'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">邮箱 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['email'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">邮编 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['post_code'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">住址 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['person_address'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">手机号码 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['phone'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">毕业学校 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['education_school'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">学历学位 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['education_degree'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">专业 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['education_major'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">毕业时间 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= date('Y-m-d', $detail['person']['education_time']) ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">所属单位 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['belong_company'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">职称 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['positio'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">职位 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['job'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">工作时长 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= str_replace(',', '到', $detail['person']['work_limit']) ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">职称获得时间 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['positio_time'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">业务行业 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['sector'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">业务领域 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['person']['area'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">证件照 </label>
                                    <div class="am-u-sm-9 am-u-end" style="padding-top: .8rem;">
                                        <a href="<?= $detail['person']['id_photo_path'] ?>" title="点击查看大图" target="_blank">
                                            <img src="<?= $detail['person']['id_photo_path'] ?>" width="144" height="144" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">证件附件 </label>
                                    <div class="am-u-sm-9 am-u-end" style="padding-top: .8rem;">
                                        <a href="<?= $detail['person']['person_file_path'] ?>" download="证件附件">点击下载</a>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">个人简介</label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <textarea id="container" type="text/plain" style="width:100%;height:400px;" disabled="disabled"><?= $detail['person']['introduce'] ?></textarea>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- company -->
                            <?php if (!empty($detail['company'])) : ?>
                                <div class="widget-head am-cf">
                                    <div class="widget-title am-fl">单位会员信息</div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">单位名称 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['company_name'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">社会统一信用代码 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['company_code'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">单位类型 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['company_type'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">单位电话 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['company_tel'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">单位地址 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['address'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">单位logo </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['company_logo'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">成立时间 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= date('Y-m-d',$detail['company']['build_time']) ?>" disabled="disabled">
                                    </div>
                                </div>                                
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">法人 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['legal_person'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">单位邮箱 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['email'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">联系人姓名 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['manager_name'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">联系人职位 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['manager_job'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">联系人电话 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['manager_phone'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">联系人微信 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['company']['manager_wechat'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">证件附件 </label>
                                    <div class="am-u-sm-9 am-u-end" style="padding-top:.8rem;">
                                        <a href="<?= $detail['company']['license_file_path'] ?>" download="证件附件">点击下载</a>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">单位简介</label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <textarea id="container" type="text/plain" style="width:100%;height:400px;" disabled="disabled"><?= $detail['company']['company_intro'] ?></textarea>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <!-- supplier -->
                            <?php if (!empty($detail['supplier'])) : ?>
                                <div class="widget-head am-cf">
                                    <div class="widget-title am-fl">供应商信息</div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应商名称 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_company_name'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应商社会统一信用代码 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_company_code'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应商类型 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_company_type'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应商电话 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_company_tel'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应商邮编 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_post_code'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应商地址 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_company_address'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应商成立时间 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_build_time'] ?>" disabled="disabled">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应类别（工程类） </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_eng_cate_text'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应类别（货物类） </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_goods_cate_text'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应类别（服务类） </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_server_cate_text'] ?>" disabled="disabled">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应商法人 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_legal_person'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">供应商邮箱 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_company_email'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">联系人姓名 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_manager_name'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">联系人职位 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_manager_job'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">联系人电话 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_manager_phone'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">联系人微信 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?= $detail['supplier']['sup_manager_wechat'] ?>" disabled="disabled">
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">证件照 </label>
                                    <div class="am-u-sm-9 am-u-end" style="padding-top: .8rem;">
                                        <a href="<?= $detail['supplier']['id_photo_path'] ?>" title="点击查看大图" target="_blank">
                                            <img src="<?= $detail['supplier']['id_photo_path'] ?>" width="144" height="144" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">证件附件 </label>
                                    <div class="am-u-sm-9 am-u-end" style="padding-top: .8rem;">
                                        <a href="<?= $detail['supplier']['person_file_path'] ?>" download="证件附件">点击下载</a>
                                    </div>
                                </div>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">供应商简介</label>
                                    <div class="am-u-sm-9 am-u-end" style="padding-top: .8rem;">
                                        <textarea id="container" type="text/plain" style="width:100%;height:400px;" disabled="disabled"><?= $detail['supplier']['sup_intro'] ?></textarea>
                                    </div>
                                </div>

                            <?php endif; ?>

                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- 图片文件列表模板 -->
{{include file="layouts/_template/tpl_file_item" /}}

<!-- 文件库弹窗 -->
{{include file="layouts/_template/file_library" /}}

<!-- 商品多规格模板 -->
{{include file="goods/_template/spec_many" /}}

<script src="assets/store/js/ddsort.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.config.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.min.js"></script>
<script src="assets/store/js/goods.spec.js"></script>
<script>
    $(function() {

    });
</script>