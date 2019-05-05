<!--  -->
<link rel="stylesheet" href="https://unpkg.com/element-ui@2.8.2/lib/theme-chalk/index.css">
<!-- <link rel="stylesheet" href="assets/home/css/1.css"> -->
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
        onClose color: #8c939d;
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
</style>
<style>
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
            <p>升级会员</p>
            <small style="margin-left:20px;color:#999999;">(请选择升级的角色)</small>
        </div>
    </div>

    <div class="person-my-act-body" style="margin-top:35px;">
        <template>
            <el-tabs v-model="activeName" type="card" class="">
                <?php if ($levelOption == 1) : ?>
                    <el-tab-pane label="个人会员" name="person">
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
                                    <el-form-item label="手机号" prop="phone">
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
                                <el-col :span="24">
                                    <el-form-item label="住址：" prop="person_address">
                                        <el-input v-model="form_person.person_address" placeholder="请填写住址"></el-input>
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
                                        <el-input v-model="form_person.education_degree" placeholder=""></el-input>
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
                                        <el-input v-model="form_person.positio" placeholder=""></el-input>
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
                                        <el-input v-model="form_person.area" placeholder=""></el-input>
                                    </el-form-item>
                                </el-col>

                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="工作年限：" prop="work_limit">
                                        <el-date-picker v-model="form_person.work_limit" value-format="yyyy-MM-dd" type="daterange" range-separator="至" start-placeholder="开始日期" end-placeholder="结束日期">
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
                                <el-col :span="24">
                                    个人证件照：
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?= url('uploadFile') ?>&param=idcard" ref="idcard" :show-file-list="false" :on-success="handleIdcardSuccess" :before-upload="beforeAvatarUpload">
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
                                <el-upload class="avatar-uploader" action="<?= url('uploadFile') ?>&param=personfile" ref="personFile" accept=".pdf" :show-file-list="false" :on-success="handlePersonFileSuccess" :before-upload="beforeFileUpload">
                                    <img v-if="personFileUrl" :src="personFileUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <div class="divider" style="margin-top:25px;">个人简介</div>

                            <el-row>
                                <el-col :span="24" style="position:relative;">
                                    <el-form-item label="简介描述" prop="introduce">
                                        <el-input type="textarea" maxlength="800" rows=8 placeholder="请输入内容" @input="company_intro_limit" v-model="form_person.introduce">
                                        </el-input>
                                    </el-form-item>
                                    <small style="position:absolute;color:#91B894;font-size:12px;right:20px;bottom:0;">还能输入{{ 800-form_person.introduce.length }}个字</small>
                                </el-col>
                            </el-row>

                            <el-col :span="24" style="margin-top:30px;">
                                <el-button type="primary" @click="onSubmit('person')">提交申请</el-button>
                            </el-col>
                        </el-form>
                    </el-tab-pane>
                <?php endif; ?>
                <?php if ($levelOption == 2) : ?>
                    <el-tab-pane label="专家会员" name="expert"></el-tab-pane>
                <?php endif; ?>
                <!-- todo -->
                <?php if ($levelOption == 1) : ?>
                    <el-tab-pane label="单位会员" name="company">
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
                                        <el-input v-model="form_company.company_type" placeholder="请填写单位类型"></el-input>
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
                                <el-col :span="24">
                                    单位LOGO图片：
                                </el-col>
                            </el-row>

                            <div style="padding:20px 0px;">
                                <el-upload class="avatar-uploader" action="<?= url('uploadFile') ?>&param=logo" ref="avatar" :show-file-list="false" :on-success="handleAvatarSuccess" :before-upload="beforeAvatarUpload">
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
                                <el-upload class="avatar-uploader" action="<?= url('uploadFile') ?>&param=companyFile" ref="upload" accept=".pdf" :show-file-list="false" :on-success="handleFileSuccess" :before-upload="beforeFileUpload">
                                    <img v-if="fileUrl" :src="fileUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <div class="divider" style="margin-top:25px;">单位简介</div>

                            <el-row>
                                <el-col :span="24" style="position:relative;">
                                    <el-form-item label="简介描述" prop="company_intro">
                                        <el-input type="textarea" maxlength="800" rows=8 placeholder="请输入内容" @input="company_intro_limit" v-model="form_company.company_intro">
                                        </el-input>
                                    </el-form-item>
                                    <small style="position:absolute;color:#91B894;font-size:12px;right:20px;bottom:0;">还能输入{{ 800-form_company.company_intro.length }}个字</small>
                                </el-col>
                            </el-row>



                            <el-col :span="24" style="margin-top:30px;">
                                <el-button type="primary" @click="onSubmit('company')">提交申请</el-button>
                            </el-col>
                        </el-form>
                    </el-tab-pane>
                <?php endif; ?>
                <el-tab-pane label="供应商" name="supplier"></el-tab-pane>
            </el-tabs>
        </template>
    </div>

</div>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- import Vue before Element -->
<script src="https://unpkg.com/vue@2.6.10/dist/vue.js"></script>
<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui@2.8.2/lib/index.js"></script>

<!--  -->
<script>
    $.get('<?= url('supportAjax') ?>', function(res) {
        //         
        var data = res.data;
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
                    introduce: ''
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
                    company_intro: ''
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
                }
            },
            methods: {
                doPost(form) {
                    if (!this.posting) {
                        this.posting = true;
                        var _this = this;
                        $.post('<?= url('updateAjax') ?>', {
                            form: form,
                            form_type: _this.activeName
                        }, function(res) {
                            console.log(res);
                            if (res.code == 1) {
                                _this.$message.success(res.msg);
                                setTimeout(function() {
                                    window.location.href = '<?= url('personcenter') ?>'
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
                    if (type == 'person') {
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
                    }


                    // 
                    if (type == 'company') {
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
                    }

                    // 

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
                company_intro_limit() {
                    // 
                    if (this.form_company.company_intro.length >= 800) {
                        this.form_company.company_intro = this.form_company.company_intro.substring(0, 800);
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
            mounted: function() {

            }

        })
    })
</script>