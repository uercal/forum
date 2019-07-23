<style>
    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .avatar-uploader .el-upload:hover {
        border-color: #409EFF;
    }

    .avatar-uploader-icon {
        font-size: 28px;
        color: #8c939d;
        width: 178px;
        height: 178px;
        line-height: 178px;
        text-align: center;
    }

    .avatar {
        width: 178px;
        height: 178px;
        display: block;
        object-fit: contain;
    }

    /*  */
    .el-tabs--card>.el-tabs__header {
        border-bottom: none;
    }

    .el-tabs--card>.el-tabs__header .el-tabs__nav {
        border: none;
    }

    .el-tabs__item {
        height: 45px;
        padding: 0px 20px;
        background: #D9D9D9;
        color: #fff;
        margin-right: 15px;
        /*  */
        font-family: PingFangSC-Medium;
        font-size: 18px;
        color: #FFFFFF;
        letter-spacing: 0;
    }

    .el-tabs__item.is_active {
        color: #fff;
    }

    .el-tabs__item:hover {
        color: #fff;
        background: rgba(145, 184, 148, 0.5);
    }

    .el-tabs--card>.el-tabs__header .el-tabs__item.is-active {
        background: rgba(145, 184, 148, 1);
        color: #fff;
    }

    .el-form--label-left .el-form-item__label {
        white-space: nowrap;
    }

    /*  */
    .divider {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        /*  */
        font-family: PingFangSC-Regular;
        font-size: 16px;
        color: #333333;
        letter-spacing: 0;
        font-weight: 600;
    }

    .divider::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 3px;
        background: #44874B;
        margin-right: 6px;
    }

    .line {
        text-align: right;
        float: left;
        font-size: 14px;
        color: #606266;
        line-height: 40px;
        /* padding: 0 12px 0 0; */
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        font-weight: 700;
        white-space: nowrap;
    }

    .el-form-item__content {
        margin-right: 10px;
    }

    label {
        font-weight: 500;
    }

    .row-bg {
        padding: 0px 8px;
    }

    .upload-demo {
        padding: 8px 0px;
    }

    .el-upload__input {
        display: none !important;
    }

    .edui-container {
        width: auto !important;
    }
</style>
<!--  -->
<div class="person-my-act" id="app">
    <div class="person-my-act-head">
        <div>
            <p>会员类型</p>
            <small style="margin-left:20px;color:#999999;">(请选择相应的角色)</small>
        </div>
    </div>

    <div class="person-my-act-body" style="margin-top:35px;">
        <template>
            <el-tabs v-model="activeName" type="card" class="">
                <?php if ($levelOption == 1 || $levelOption == 2): ?>
                    <el-tab-pane label="<?=$levelOption == 2 ? '修改个人会员信息' : '个人会员'?>" name="person">
                        <el-form ref="person" :model="form_person" :rules="person_rules" label-width="80px" label-position="left" style="margin-top:30px;">
                            <!--  -->
                            <div class="divider">个人基本信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="姓名：" prop="name">
                                        <el-input v-model="form_person.name" placeholder="请填写姓名 "></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="身份证：" prop="id_card">
                                        <el-input v-model="form_person.id_card" placeholder="请填写身份证号码 "></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="性别：" prop="gender">
                                        <el-radio v-model="form_person.gender" label="0">男</el-radio>
                                        <el-radio v-model="form_person.gender" label="1">女</el-radio>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="邮箱：" prop="email">
                                        <el-input v-model="form_person.email" placeholder="请填写邮箱"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="手机号：" prop="phone">
                                        <el-input v-model="form_person.phone" placeholder="请填写手机号"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="邮编：" prop="post_code">
                                        <el-input v-model="form_person.post_code" placeholder="请填写邮编"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="国籍：" prop="nationality">
                                        <el-input v-model="form_person.nationality" placeholder="请填写国籍"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="政治面貌：" prop="political_face">
                                        <el-input v-model="form_person.political_face" placeholder="请填写政治面貌"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="籍贯：" prop="native_place">
                                        <el-input v-model="form_person.native_place" placeholder="请填写籍贯"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="民族：" prop="minzu">
                                        <el-input v-model="form_person.minzu" placeholder="请填写民族"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="住址：" prop="person_address">
                                        <el-input v-model="form_person.person_address" placeholder="请填写住址"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="微信号：" prop="wechat">
                                        <el-input v-model="form_person.wechat" placeholder="请填写微信号"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <div class="divider">学历教育信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="毕业院校：" prop="education_school">
                                        <el-input v-model="form_person.education_school" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="学历学位：" prop="education_degree">
                                        <el-select v-model="form_person.education_degree" placeholder="请选择">
                                            <el-option v-for="item in education_degree_options" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="专业：" prop="education_major">
                                        <el-input v-model="form_person.education_major" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="毕业时间：" prop="education_time">
                                        <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_person.education_time" style="width: 100%;"></el-date-picker>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <div class="divider">工作信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="所在单位：" prop="belong_company">
                                        <el-input v-model="form_person.belong_company" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="职务：" prop="job">
                                        <el-input v-model="form_person.job" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="职称等级：" prop="positio">
                                        <el-select v-model="form_person.positio" multiple placeholder="请选择" style="width:100%;">
                                            <el-option v-for="(item,index) in positio_options" :key="index" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                        <!-- <el-input v-model="form_person.positio" placeholder=""></el-input> -->
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="业务行业：" prop="sector">
                                        <el-input v-model="form_person.sector" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="业务领域：" prop="area">
                                        <el-select v-model="form_person.area" multiple placeholder="请选择" style="width:100%;">
                                            <el-option v-for="(item,index) in area_options" :key="index" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="工作年限：" prop="work_limit">
                                        <el-date-picker v-model="form_person.work_limit" value-format="yyyy-MM" type="monthrange" range-separator="至" start-placeholder="开始日期" end-placeholder="结束日期">
                                        </el-date-picker>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="职称取得时间：" label-width="32%" prop="positio_time">
                                        <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_person.positio_time" style="width: 100%;"></el-date-picker>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <!--  -->
                            <div class="divider" style="margin-top:25px;">图片信息</div>
                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="20" style="display:flex;align-items:center;">
                                    <label style="margin:0;">个人证件照：<small style="color:#999999;font-weight:100;font-size:10px;">（推荐上传1寸&2寸的JPG&PNG图片，且不超过2MB）</small>
                                    </label>
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=idcard" ref="idcard" :show-file-list="false" :on-success="handleIdcardSuccess" :before-upload="beforeAvatarUpload">
                                    <img v-if="idPhotoUrl" :src="idPhotoUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <!-- PDF -->
                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="20" style="display:flex;align-items:center;">
                                    <label style="margin:0;">个人证件附件：<small style="color:#999999;font-weight:100;font-size:10px;">（学历和学位、职称、职业资格、高层次人才等证书制成一个PDF文件上传，且不超过2MB）</small>
                                    </label>
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=personfile" ref="personFile" accept=".pdf" :show-file-list="false" :on-success="handlePersonFileSuccess" :before-upload="beforeFileUpload">
                                    <img v-if="personFileUrl" :src="personFileUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <div class="divider" style="margin-top:25px;">个人简介</div>

                            <el-row>
                                <el-col :span="24" style="position:relative;">
                                    <el-form-item label="简介描述" prop="introduce">
                                        <el-input type="textarea" maxlength="800" rows=8 placeholder="请输入内容" @input="intro_limit('person')" v-model="form_person.introduce">
                                        </el-input>
                                    </el-form-item>
                                    <small style="position:absolute;color:#91B894;font-size:12px;right:20px;bottom:0;">还能输入{{ 800-form_person.introduce.length }}个字</small>
                                </el-col>
                            </el-row>

                            <div class="divider" style="margin-top:25px;">会员等级</div>

                            <el-row>
                                <el-col :span="24" style="position:relative;">
                                    <el-form-item label="会员等级：" prop="memberLevel">
                                        <el-select v-model="form_person.memberLevel" placeholder="请选择">
                                            <el-option v-for="item in levelPersonOptions" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>


                            <el-col :span="24" style="margin-top:30px;">
                                <el-button type="primary" @click="onSubmit('person')">提交申请</el-button>
                            </el-col>
                        </el-form>
                    </el-tab-pane>
                <?php endif;?>
                <?php if ($levelOption == 2 && !in_array(2, $roleArr)): ?>
                    <el-tab-pane label="专家会员" name="expert">
                        <div class="my-act-item" style="background-color:#fff;margin-top:0;padding:0;">
                            <div style="width:100%;display:flex;">
                                <p style="font-size:16px;text-indent:2rem;">申请专家会员需经过主管理员审核个人会员信息资料，若资质符合专家会员要求，将成为海南省全过程工程咨询专家库专家。</p>
                                <p style="font-size:14px;text-indent:2rem;color:#999999;">高级专家：高级工程师、副教授、副研究员</p>
                                <p style="font-size:14px;text-indent:2rem;color:#999999;">资深专家：正高级工程师、教师、研究员</p>
                                <p style="font-size:14px;text-indent:2rem;color:#999999;">顶级专家：院士、长江学者、百人计划、杰青优青、千人计划、万人计划、双一流学术带头人、其他高层次人才</p>
                            </div>
                        </div>
                        <el-col :span="24" style="margin-top:30px;">
                            <el-button type="primary" @click="onSubmit('expert')">提交申请</el-button>
                        </el-col>
                    </el-tab-pane>
                <?php endif;?>
                <?php if ($levelOption == 1 || $levelOption == 3): ?>
                    <el-tab-pane label="<?=$levelOption == 3 ? '修改单位会员信息' : '单位会员'?>" name="company">
                        <el-form ref="company" :model="form_company" :rules="company_rules" label-width="80px" label-position="left" style="margin-top:30px;">
                            <!--  -->
                            <div class="divider">单位基本信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="单位名称：" prop="company_name">
                                        <el-input v-model="form_company.company_name" placeholder="请填写单位名称"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="成立时间：" prop="build_time">
                                        <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_company.build_time" style="width: 100%;"></el-date-picker>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位法人：" class="" prop="legal_person">
                                        <el-input v-model="form_company.legal_person" placeholder="请填写单位法人"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="统一社会信用代码：" label-width="42%" prop="company_code">
                                        <el-input v-model="form_company.company_code" placeholder="请填写单位的统一社会信用代码"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位类型：" class="" prop="company_type">
                                        <el-select v-model="form_company.company_type" placeholder="请选择单位类型" style="width:100%;">
                                            <el-option v-for="item in companyTypeOptions" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="工程服务资格及等级：" label-width="25%" prop="server_level">
                                        <el-input v-model="form_company.server_level" placeholder="如：生态建设和环境工程/公共工程/城市轨道交通/综合经济/电影广播电视"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="公司电话：" prop="company_tel">
                                        <el-input v-model="form_company.company_tel" placeholder="0898-66666666"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位邮箱：" class="" prop="email">
                                        <el-input type="email" v-model="form_company.email" placeholder="xx@xx.com"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="地址邮编：" prop="address">
                                        <el-input v-model="form_company.address" placeholder="请填写公司地址"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="注册资金：" prop="regist_money">
                                        <el-input v-model="form_company.regist_money" placeholder="请填写注册资金"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="门户网站：" prop="company_site">
                                        <el-input v-model="form_company.company_site" placeholder="请填写门户网站"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="传真" prop="company_fax">
                                        <el-input v-model="form_company.company_fax" placeholder="请填写供应商传真"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <!--  -->
                            <div class="divider" style="margin-top:25px;">联系人基本信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="姓名：" prop="manager_name">
                                        <el-input v-model="form_company.manager_name" placeholder="请填写联系人姓名"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位职务：" class="" prop="manager_job">
                                        <el-input type="email" v-model="form_company.manager_job" placeholder="请填写联系人职务"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="联系手机：" prop="manager_phone">
                                        <el-input v-model.number="form_company.manager_phone" placeholder="请填写联系人手机"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="微信号：" class="" prop="manager_wechat">
                                        <el-input v-model="form_company.manager_wechat" placeholder="请填写联系人微信号"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <!--  -->
                            <div class="divider" style="margin-top:25px;">图片信息</div>
                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="20" style="display:flex;align-items:center;">
                                    <label style="margin:0;">单位LOGO图片：<small style="color:#999999;font-weight:100;font-size:10px;">（推荐上传1:1的JPG&PNG图片，且不超过2MB）</small>
                                    </label>
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=logo" ref="avatar" :show-file-list="false" :on-success="handleAvatarSuccess" :before-upload="beforeAvatarUpload">
                                    <img v-if="imageUrl" :src="imageUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <!-- PDF -->
                            <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                                <el-col :span="20" style="display:flex;align-items:center;">
                                    <label style="margin:0;">证件附件：<small style="color:#999999;font-weight:100;font-size:10px;">（请将营业执照护本、工程服务资质资格资信等证书制成一个PDF文件上传，且不超过2MB）</small>
                                    </label>
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=companyFile" ref="upload" accept=".pdf" :show-file-list="false" :on-success="handleFileSuccess" :before-upload="beforeFileUpload">
                                    <img v-if="fileUrl" :src="fileUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <div class="divider" style="margin-top:25px;">单位简介</div>

                            <el-row>
                                <el-col :span="24" style="position:relative;">
                                    <el-form-item label="简介描述" prop="company_intro">
                                        <el-input type="textarea" maxlength="800" rows=8 placeholder="请输入内容" @input="intro_limit('company')" v-model="form_company.company_intro">
                                        </el-input>
                                    </el-form-item>
                                    <small style="position:absolute;color:#91B894;font-size:12px;right:20px;bottom:0;">还能输入{{ 800-form_company.company_intro.length }}个字</small>
                                </el-col>
                            </el-row>

                            <el-row>
                                <el-col :span="24" style="position:relative;">
                                    <el-form-item label="会员等级：" prop="memberLevel">
                                        <el-select v-model="form_company.memberLevel" placeholder="请选择">
                                            <el-option v-for="item in levelOptions" :key="item" :label="item" :value="item">
                                            </el-option>
                                        </el-select>
                                    </el-form-item>
                                </el-col>
                            </el-row>


                            <el-col :span="24" style="margin-top:30px;">
                                <el-button type="primary" @click="onSubmit('company')">提交申请</el-button>
                            </el-col>
                        </el-form>
                    </el-tab-pane>
                <?php endif;?>
                <el-tab-pane label="<?=in_array(4, $roleArr) ? '修改供应商信息' : '供应商'?>" name="supplier">
                    <el-form ref="sup" :model="form_sup" :rules="supplier_rules" label-width="80px" label-position="left" style="margin-top:30px;">
                        <!--  -->
                        <div class="divider">供应商单位基本信息</div>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="24">
                                <el-form-item label="单位名称：" prop="sup_company_name">
                                    <el-input v-model="form_sup.sup_company_name" placeholder="请填写单位名称"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="成立时间：" prop="sup_build_time">
                                    <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form_sup.sup_build_time" style="width: 100%;"></el-date-picker>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="单位类型：" class="" prop="sup_company_type">
                                    <!-- <el-input v-model="form_sup.sup_company_type" placeholder="请选择单位类型"></el-input> -->
                                    <el-select v-model="form_sup.sup_company_type" placeholder="请选择单位类型" style="width:100%;">
                                        <el-option v-for="item in companyTypeOptions" :key="item" :label="item" :value="item">
                                        </el-option>
                                    </el-select>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="统一社会信用代码：" label-width="130px" prop="sup_company_code">
                                    <el-input v-model="form_sup.sup_company_code" placeholder="XXXXXXX"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="单位法人：" class="" prop="sup_legal_person">
                                    <el-input v-model="form_sup.sup_legal_person" placeholder="请填写单位法人"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="单位电话：" prop="sup_company_tel">
                                    <el-input v-model.number="form_sup.sup_company_tel" placeholder="0898-66666666"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="单位邮箱：" class="" prop="sup_company_email">
                                    <el-input type="email" v-model="form_sup.sup_company_email" placeholder="xx@xx.com"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="地址：" prop="sup_company_address">
                                    <el-input v-model="form_sup.sup_company_address" placeholder="请填写公司地址"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="邮编：" prop="sup_post_code">
                                    <el-input v-model="form_sup.sup_post_code" placeholder="请填写邮编"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="注册资金：" prop="sup_regist_money">
                                    <el-input v-model="form_sup.sup_regist_money" placeholder="请填写注册资金"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="门户网站：" prop="sup_company_site">
                                    <el-input v-model="form_sup.sup_company_site" placeholder="请填写门户网站"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="24">
                                <el-form-item label="传真" prop="sup_company_fax">
                                    <el-input v-model="form_sup.sup_company_fax" placeholder="请填写供应商传真"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <!--  -->
                        <div class="divider" style="margin-top:25px;">联系人基本信息</div>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="姓名：" prop="sup_manager_name">
                                    <el-input v-model="form_sup.sup_manager_name" placeholder="请填写联系人姓名"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="单位职务：" class="" prop="sup_manager_job">
                                    <el-input type="email" v-model="form_sup.sup_manager_job" placeholder="请填写联系人职务"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="联系手机：" prop="sup_manager_phone">
                                    <el-input v-model.number="form_sup.sup_manager_phone" placeholder="请填写联系人手机"></el-input>
                                </el-form-item>
                            </el-col>
                            <el-col :span="12">
                                <el-form-item label="微信号：" class="" prop="sup_manager_wechat">
                                    <el-input v-model="form_sup.sup_manager_wechat" placeholder="请填写联系人微信号"></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>

                        <!-- cates -->
                        <div class="divider" style="margin-top:25px;">供应类别</div>
                        <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                            <el-col :span="22">
                                工程类
                            </el-col>
                            <el-col :span="2" style="color:#7FBAFF;">
                                <i class="el-icon-plus"></i>
                                <span type="text" @click="addCate('eng')" style="cursor:pointer;">新类别</span>
                            </el-col>
                        </el-row>
                        <div style="padding:20px 0px;">
                            <el-row type="flex" class="row-bg" v-for="(item,index) in form_sup.sup_eng_cate" :key="index">
                                <el-col :span="12">
                                    <el-form-item :label="'资质标准类别'+(index+1)" label-width="100px">
                                        <el-input v-model="item.cate" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="11">
                                    <el-form-item label="资质类别等级：" label-width="100px">
                                        <el-input v-model="item.level" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="1" v-if="index>0">
                                    <el-button style="margin-top:.5rem;" type="danger" size="mini" icon="el-icon-close" circle @click="delCate('eng',index)"></el-button>
                                </el-col>
                            </el-row>
                        </div>

                        <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                            <el-col :span="22">
                                货物类
                            </el-col>
                            <el-col :span="2" style="color:#7FBAFF;">
                                <i class="el-icon-plus"></i>
                                <span type="text" @click="addCate('goods')" style="cursor:pointer;">新类别</span>
                            </el-col>
                        </el-row>
                        <div style="padding:20px 0px;">
                            <el-row type="flex" class="row-bg" v-for="(item,index) in form_sup.sup_goods_cate" :key="index">
                                <el-col :span="12">
                                    <el-form-item :label="'生产销售许可'+(index+1)" label-width="100px">
                                        <el-input v-model="item.permit" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="11">
                                    <el-form-item label="供应内容：" label-width="80px">
                                        <el-input v-model="item.content" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="1" v-if="index>0">
                                    <el-button style="margin-top:.5rem;" type="danger" size="mini" icon="el-icon-close" circle @click="delCate('goods',index)"></el-button>
                                </el-col>
                            </el-row>
                        </div>

                        <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                            <el-col :span="22">
                                服务类
                            </el-col>
                            <el-col :span="2" style="color:#7FBAFF;">
                                <i class="el-icon-plus"></i>
                                <span @click="addCate('server')" style="cursor:pointer;" type="text">新类别</span>
                            </el-col>
                        </el-row>
                        <div style="padding:20px 0px;">
                            <el-row type="flex" class="row-bg" v-for="(item,index) in form_sup.sup_server_cate" :key="index">
                                <el-col :span="12">
                                    <el-form-item :label="'资质资格资信专业'+(index+1)" label-width="130px">
                                        <el-input v-model="item.major" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="11">
                                    <el-form-item label="资质类别等级：" label-width="100px">
                                        <el-input v-model="item.level" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="1" v-if="index>0">
                                    <el-button style="margin-top:.5rem;" type="danger" size="mini" icon="el-icon-close" circle @click="delCate('server',index)"></el-button>
                                </el-col>
                            </el-row>
                        </div>






                        <!--  -->
                        <div class="divider" style="margin-top:25px;">图片信息</div>
                        <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                            <el-col :span="20" style="display:flex;align-items:center;">
                                <label style="margin:0;">单位LOGO图片：<small style="color:#999999;font-weight:100;font-size:10px;">（推荐上传1:1的JPG&PNG图片，且不超过2MB）</small>
                                </label>
                            </el-col>
                        </el-row>

                        <div style="padding:20px 0px;">
                            <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=supIdFile" ref="avatar" :show-file-list="false" :on-success="handleSupIdPhotoSuccess" :before-upload="beforeAvatarUpload">
                                <img v-if="supIdPhotoUrl" :src="supIdPhotoUrl" class="avatar">
                                <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                            </el-upload>
                        </div>

                        <!-- PDF -->
                        <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;">
                            <el-col :span="20" style="display:flex;align-items:center;">
                                <label style="margin:0;">证件附件：<small style="color:#999999;font-weight:100;font-size:10px;">（将营业执照副本、资质资格资质、生产直销认可证或销售授权书等制成一个PDF文件上传，且不超过2MB）</small>
                                </label>
                            </el-col>
                        </el-row>

                        <div style="padding:20px 0px;">
                            <el-upload class="avatar-uploader" action="<?=url('uploadFile')?>&param=supFile" ref="upload" accept=".pdf" :show-file-list="false" :on-success="handleSupFileSuccess" :before-upload="beforeFileUpload">
                                <img v-if="supFileUrl" :src="supFileUrl" class="avatar">
                                <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                            </el-upload>
                        </div>

                        <div class="divider" style="margin-top:25px;">供应商简介</div>

                        <el-row>
                            <el-col :span="24" style="position:relative;">
                                <el-form-item label="简介描述" prop="sup_intro">
                                    <el-input type="textarea" maxlength="800" rows=8 placeholder="请输入内容" @input="intro_limit('sup')" v-model="form_sup.sup_intro">
                                    </el-input>
                                </el-form-item>
                                <small style="position:absolute;color:#91B894;font-size:12px;right:20px;bottom:0;">还能输入{{ 800-form_sup.sup_intro.length }}个字</small>
                            </el-col>
                        </el-row>



                        <el-col :span="24" style="margin-top:30px;">
                            <el-button type="primary" @click="onSubmit('sup')">提交申请</el-button>
                        </el-col>
                    </el-form>
                </el-tab-pane>
            </el-tabs>
        </template>
    </div>

</div>


<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<script src="assets/home/js/jquery-1.12.4.min.js"></script>
<!-- import Vue before Element -->
<!-- <script src="https://unpkg.com/vue@2.6.10/dist/vue.js"></script> -->
<script src="assets/home/js/vue.js"></script>
<!-- import JavaScript -->
<!-- <script src="https://unpkg.com/element-ui@2.8.2/lib/index.js"></script> -->
<script src="assets/home/js/element.js"></script>

<!--  -->
<script>
    $.get('<?=url('updateExistAjax')?>', function(res) {
        //
        var data = res.data;

        console.log(data);
        //
        window.vue = new Vue({
            el: '#app',
            data: {
                posting: false,
                activeName: '',
                imageUrl: '',
                fileUrl: '',
                idPhotoUrl: '',
                personFileUrl: '',
                supIdPhotoUrl: '',
                supFileUrl: '',
                levelOptions: [
                    '会长单位',
                    '常务副会长单位',
                    '副会长单位',
                    '常务理事单位',
                    '理事单位',
                    '监事长单位',
                    '常务副监事长单位',
                    '副监事长单位',
                    '常务监事单位',
                    '监事单位',
                    '会员单位'
                ],
                levelPersonOptions: [
                    '会长',
                    '常务副会长',
                    '副会长',
                    '常务理事',
                    '理事',
                    '监事长',
                    '常务副监事长',
                    '副监事长',
                    '常务监事',
                    '监事',
                    '会员'
                ],
                companyTypeOptions: [
                    '海南全内资独立法人',
                    '外省全内资独立法人驻琼机构',
                    '国内内资控股或主导独立法人',
                    '其他机构'
                ],
                education_degree_options:[
                    '中等专科',
                    '大学专科',
                    '大学本科',
                    '研究生'
                ],
                positio_options:[
                    '正高级工程师','教授','研究员','高级工程师','副教授','副研究员'
                ],
                area_options:[
                    '投资咨询','招标代理','勘察测量','规划设计','工程监理','造价咨询','项目管理','其他工程服务'
                ],
                // 个人
                form_person: {
                    name: '',
                    id_card: '',
                    gender: '',
                    email: '',
                    phone: '',
                    post_code: '',
                    person_address: '',
                    education_school: '',
                    education_degree: '',
                    education_major: '',
                    education_time: '',
                    belong_company: '',
                    positio: '',
                    job: '',
                    work_limit: '',
                    positio_time: '',
                    sector: '',
                    area: '',
                    id_photo: '',
                    person_file: '',
                    introduce: '',
                    memberLevel: '',
                    nationality: '',
                    political_face: '',
                    native_place: '',
                    minzu: '',
                    wechat: ''
                },
                person_rules: {
                    name: [{
                        required: true,
                        message: '请填写姓名',
                        trigger: 'blur'
                    }],
                    id_card: [{
                        required: true,
                        message: '请填写身份证号码',
                        trigger: 'blur'
                    }, {
                        pattern: /^[1-9]\d{5}(18|19|20)\d{2}((0[1-9])|(1[0-2]))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/,
                        message: '身份证号码格式错误',
                        trigger: 'blur'
                    }],
                    gender: [{
                        required: true,
                        message: '请选择性别',
                        trigger: 'blur'
                    }],
                    email: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }, {
                        type: 'email',
                        message: '请填写正确的邮箱格式！'
                    }],
                    phone: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    post_code: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    person_address: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    education_school: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    education_degree: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    education_major: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    education_time: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    belong_company: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    positio: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    job: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    work_limit: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    positio_time: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sector: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    area: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    introduce: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    memberLevel: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    nationality: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    political_face: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    native_place: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    minzu: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    wechat: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }]
                },
                // 单位
                form_company: {
                    company_name: '',
                    build_time: '',
                    legal_person: '',
                    company_code: '',
                    company_type: '',
                    server_level: '',
                    company_tel: '',
                    address: '',
                    email: '',
                    manager_name: '',
                    manager_job: '',
                    manager_phone: '',
                    manager_wechat: '',
                    company_logo: '',
                    license_file: '',
                    company_intro: '',
                    memberLevel: '',
                    regist_money: '',
                    company_site: '',
                    company_fax: ''
                },
                company_rules: {
                    company_name: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    build_time: [{
                        required: true,
                        message: '请选择日期',
                        trigger: 'blur'
                    }],
                    legal_person: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    company_code: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    company_type: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    server_level: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    company_tel: [{
                        required: true,
                        message: '请输入公司电话',
                        trigger: 'blur'
                    }],
                    address: [{
                        required: true,
                        message: '请输入公司地址',
                        trigger: 'blur'
                    }],
                    email: [{
                            required: true,
                            message: '请输入单位邮箱',
                            trigger: 'blur'
                        },
                        {
                            type: 'email',
                            message: '请填写邮箱格式'
                        }
                    ],
                    manager_name: [{
                        required: true,
                        message: '请输入联系人姓名',
                        trigger: 'blur'
                    }],
                    manager_job: [{
                        required: true,
                        message: '请输入联系人职务',
                        trigger: 'blur'
                    }],
                    manager_phone: [{
                            required: true,
                            message: '请输入联系人电话',
                            trigger: 'blur'
                        },
                        {
                            type: 'number',
                            message: '必须为数字'
                        }
                    ],
                    manager_wechat: [{
                        required: true,
                        message: '请输入联系人微信号',
                        trigger: 'blur'
                    }],
                    company_intro: [{
                        required: true,
                        message: '请输入公司简介',
                        trigger: 'blur'
                    }],
                    memberLevel: [{
                        required: true,
                        message: '请选择内容',
                        trigger: 'blur'
                    }],
                    regist_money: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    company_site: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    company_fax: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                },
                // 供应商
                form_sup: {
                    sup_company_name: '',
                    sup_build_time: '',
                    sup_company_type: '',
                    sup_company_code: '',
                    sup_legal_person: '',
                    sup_company_tel: '',
                    sup_company_email: '',
                    sup_company_address: '',
                    sup_post_code: '',
                    sup_manager_name: '',
                    sup_manager_job: '',
                    sup_manager_phone: '',
                    sup_manager_wechat: '',
                    sup_eng_cate: [{
                        cate: '',
                        level: ''
                    }],
                    sup_goods_cate: [{
                        permit: '',
                        content: ''
                    }],
                    sup_server_cate: [{
                        major: '',
                        level: ''
                    }],
                    id_photo: '',
                    person_file: '',
                    sup_intro: '',
                    sup_regist_money: '',
                    sup_company_site: '',
                    sup_company_fax: ''
                },
                supplier_rules: {
                    sup_company_name: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_build_time: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_company_type: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_company_code: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_legal_person: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_company_tel: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }, {
                        type: 'number',
                        message: '必须为数字'
                    }],
                    sup_company_email: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }, {
                        type: 'email',
                        message: '请填写邮箱格式'
                    }],
                    sup_company_address: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_post_code: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_manager_name: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_manager_job: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_manager_phone: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }, {
                        type: 'number',
                        message: '必须为数字'
                    }],
                    sup_manager_wechat: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_intro: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_regist_money: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_company_site: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    sup_company_fax: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                }
            },
            methods: {
                doPost(form) {
                    if (!this.posting) {
                        this.posting = true;
                        var _this = this;
                        $.post('<?=url('updateAjax')?>', {
                            form: form,
                            form_type: _this.activeName
                        }, function(res) {
                            console.log(res);
                            if (res.code == 1) {
                                _this.$message.success(res.msg);
                                setTimeout(function() {
                                    window.location.href = '<?=url('personcenter')?>'
                                }, 1000);
                                //
                            } else {
                                _this.$message.error(res.msg);
                                _this.posting = false;
                            }
                        });
                    } else {

                    }
                },
                handleClick(tab, event) {

                },
                onSubmit(type) {

                    switch (type) {
                        case 'person':
                            this.$refs['person'].validate((valid) => {
                                if (valid) {
                                    if (this.form_person.id_photo && this.form_person.person_file) {
                                        this.doPost(this.form_person);
                                    } else {
                                        this.$message.error('请上传相应图片和附件');
                                    }
                                } else {
                                    console.log('error submit!!');
                                    return false;
                                }
                            });
                            break;
                        case 'company':
                            this.$refs['company'].validate((valid) => {
                                if (valid) {
                                    if (this.form_company.company_logo && this.form_company.license_file) {
                                        this.doPost(this.form_company);
                                    } else {
                                        this.$message.error('请上传相应图片和附件');
                                    }
                                } else {
                                    console.log('error submit!!');
                                    return false;
                                }
                            });
                            break;
                        case 'sup':
                            if (this.sup_cate_valid()) {
                                this.$refs['sup'].validate((valid) => {
                                    if (valid) {
                                        if (this.form_sup.id_photo && this.form_sup.person_file) {
                                            this.doPost(this.form_sup);
                                        } else {
                                            this.$message.error('请上传相应图片和附件');
                                        }
                                    } else {
                                        console.log('error submit!!');
                                        return false;
                                    }
                                });
                            }
                            break;
                        case 'expert':
                            this.doPost([]);
                            break;
                    }

                },
                handleSupIdPhotoSuccess(res, file) {
                    if (res.code == 1) {
                        this.supIdPhotoUrl = URL.createObjectURL(file.raw);
                        this.$message.success(res.msg);
                        this.form_sup.id_photo = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                handleIdcardSuccess(res, file) {
                    if (res.code == 1) {
                        this.idPhotoUrl = URL.createObjectURL(file.raw);
                        this.$message.success(res.msg);
                        this.form_person.id_photo = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                handleAvatarSuccess(res, file) {
                    if (res.code == 1) {
                        this.imageUrl = URL.createObjectURL(file.raw);
                        this.$message.success(res.msg);
                        this.form_company.company_logo = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                handleSupFileSuccess(res, file) {
                    if (res.code == 1) {
                        this.supFileUrl = 'assets/home/images/pdf-icon.png';
                        this.$message.success(res.msg);
                        this.form_sup.person_file = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                handlePersonFileSuccess(res, file) {
                    if (res.code == 1) {
                        this.personFileUrl = 'assets/home/images/pdf-icon.png';
                        this.$message.success(res.msg);
                        this.form_person.person_file = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                handleFileSuccess(res, file) {
                    if (res.code == 1) {
                        this.fileUrl = 'assets/home/images/pdf-icon.png';
                        this.$message.success(res.msg);
                        this.form_company.license_file = res.data.file_id;
                        //
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                beforeAvatarUpload(file) {
                    const isJPG = (file.type === 'image/jpeg' || file.type === 'image/png');
                    const isLt2M = file.size / 1024 / 1024 < 2;

                    if (!isJPG) {
                        this.$message.error('上传头像图片只能是 JPG&PNG 格式!');
                    }
                    if (!isLt2M) {
                        this.$message.error('上传头像图片大小不能超过 2MB!');
                    }
                    return isJPG && isLt2M;
                },
                beforeFileUpload(file) {
                    const isPDF = file.type === 'application/pdf';
                    const isLt2M = file.size / 1024 / 1024 < 2;
                    if (!isPDF) {
                        this.$message.error('上传文件只能是 PDF 格式!');
                    }
                    if (!isLt2M) {
                        this.$message.error('上传文件大小不能超过 2MB!');
                    }
                    return isPDF && isLt2M;
                },
                intro_limit(type) {
                    //
                    if (type == 'company') {
                        if (this.form_company.company_intro.length >= 800) {
                            this.form_company.company_intro = this.form_company.company_intro.substring(0, 800);
                        }
                    } else if (type == 'person') {
                        if (this.form_person.introduce.length >= 800) {
                            this.form_person.introduce = this.form_person.introduce.substring(0, 800);
                        }
                    } else if (type == 'sup') {
                        if (this.form_sup.sup_intro.length >= 800) {
                            this.form_sup.sup_intro = this.form_sup.sup_intro.substring(0, 800);
                        }
                    }

                },
                // supplier
                addCate(type) {
                    if (type == 'eng') {
                        var d = {
                            cate: '',
                            level: ''
                        };
                        if (this.form_sup.sup_eng_cate.length == 5) {
                            this.$message.error('最多添加五项');
                        } else {
                            this.form_sup.sup_eng_cate.push(d);
                        }
                    } else if (type == 'goods') {
                        var d = {
                            permit: '',
                            content: ''
                        };
                        if (this.form_sup.sup_goods_cate.length == 5) {
                            this.$message.error('最多添加五项');
                        } else {
                            this.form_sup.sup_goods_cate.push(d);
                        }
                    } else if (type == 'server') {
                        var d = {
                            major: '',
                            level: ''
                        };
                        if (this.form_sup.sup_server_cate.length == 5) {
                            this.$message.error('最多添加五项');
                        } else {
                            this.form_sup.sup_server_cate.push(d);
                        }
                    }
                },
                delCate(type, index) {
                    if (type == 'eng') {
                        this.form_sup.sup_eng_cate.splice(index, 1);
                    } else if (type == 'goods') {
                        this.form_sup.sup_goods_cate.splice(index, 1);
                    } else if (type == 'server') {
                        this.form_sup.sup_server_cate.splice(index, 1);
                    }
                },
                sup_cate_valid() {
                    var result = true;
                    var a = this.form_sup.sup_eng_cate.findIndex(function(e) {
                        return e.cate == '' || e.level == '';
                    });
                    var b = this.form_sup.sup_goods_cate.findIndex(function(e) {
                        return e.permit == '' || e.content == '';
                    });
                    var c = this.form_sup.sup_server_cate.findIndex(function(e) {
                        return e.major == '' || e.level == '';
                    });
                    if (a == -1 || b == -1 || c == -1) {
                        return true;
                    } else {
                        this.$message.error('供应类别不能为空');
                        return false;
                    }
                },
                submitUpload() {
                    this.$refs.upload.submit();
                },
                handleRemove(file, fileList) {
                    console.log(file, fileList);
                },
                handlePreview(file) {
                    console.log(file);
                }
            },
            created: function() {
                if (data.personInfo) {
                    this.form_person = data.personInfo;
                    this.idPhotoUrl = data.personInfo.id_photo_path;
                    this.personFileUrl = 'assets/home/images/pdf-icon.png';
                }
                if (data.companyInfo) {
                    this.form_company = data.companyInfo;
                    this.imageUrl = data.companyInfo.company_logo_path;
                    this.fileUrl = 'assets/home/images/pdf-icon.png';
                }
                if (data.supInfo) {
                    this.form_sup = data.supInfo;
                    this.supIdPhotoUrl = data.supInfo.id_photo_path;
                    this.supFileUrl = 'assets/home/images/pdf-icon.png';
                }
            }

        })
    })
</script>