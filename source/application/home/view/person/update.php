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
                    <el-tab-pane label="个人会员" name="person"></el-tab-pane>
                <?php endif; ?>
                <?php if ($levelOption == 2) : ?>
                    <el-tab-pane label="专家会员" name="expert"></el-tab-pane>
                <?php endif; ?>
                <!-- todo -->
                <?php if ($levelOption != 1) : ?>
                    <el-tab-pane label="单位会员" name="company">
                        <el-form ref="form" :model="form_company" label-width="80px" label-position="left" style="margin-top:30px;">
                            <!--  -->
                            <div class="divider">单位基本信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="单位名称：">
                                        <el-input v-model="form_company.company_name" placeholder="请填写单位名称"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="成立时间：">
                                        <el-date-picker type="date" placeholder="选择日期" v-model="form_company.date1" style="width: 100%;"></el-date-picker>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位法人：" class="">
                                        <el-input v-model="form_company.legal_person" placeholder="请填写单位法人"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="统一社会信用代码：" label-width="32%">
                                        <el-input v-model="form_company.company_code" placeholder="请填写单位的统一社会信用代码"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位类型：" class="">
                                        <el-input v-model="form_company.company_type" placeholder="请填写单位类型"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="24">
                                    <el-form-item label="工程服务资格及等级：" label-width="18%">
                                        <el-input v-model="form_company.server_level" placeholder="如：生态建设和环境工程/公共工程/城市轨道交通/综合经济/电影广播电视"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="公司电话：">
                                        <el-input v-model="form_company.company_tel" placeholder="0898-66666666"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位邮箱：" class="">
                                        <el-input type="email" v-model="form_company.email" placeholder="xx@xx.com"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>

                            <!--  -->
                            <div class="divider" style="margin-top:25px;">联系人基本信息</div>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="姓名：">
                                        <el-input v-model="form_company.manager_name" placeholder="请填写联系人姓名"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="单位职务：" class="">
                                        <el-input type="email" v-model="form_company.manager_job" placeholder="请填写联系人职务"></el-input>
                                    </el-form-item>
                                </el-col>
                            </el-row>
                            <el-row type="flex" class="row-bg">
                                <el-col :span="12">
                                    <el-form-item label="联系手机：">
                                        <el-input v-model="form_company.manager_phone" placeholder="请填写联系人手机"></el-input>
                                    </el-form-item>
                                </el-col>
                                <el-col :span="12">
                                    <el-form-item label="微信号：" class="">
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
                                    <img v-if="form_company.imageUrl" :src="form_company.imageUrl" class="avatar">
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
                                    <img v-if="form_company.fileUrl" :src="form_company.fileUrl" class="avatar">
                                    <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                                </el-upload>
                            </div>

                            <div class="divider" style="margin-top:25px;">单位简介</div>

                            <el-row>
                                <el-col :span="24" style="position:relative;">
                                    <el-form-item label="简介描述">
                                        <el-input 
                                        type="textarea" 
                                        maxlength="800" 
                                        rows=8 
                                        placeholder="请输入内容" 
                                        @input="company_intro_limit" 
                                        v-model="form_company.company_intro">
                                        </el-input>
                                    </el-form-item>
                                    <small style="position:absolute;color:#91B894;font-size:12px;right:20px;bottom:0;">还能输入{{ 800-form_company.company_intro.length }}个字</small>
                                </el-col>
                            </el-row>



                            <el-col :span="24" style="margin-top:30px;">
                                <el-button type="primary" @click="onSubmit">提交申请</el-button>
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
                activeName: '',
                form_company: {
                    name: '',
                    region: '',
                    date1: '',
                    date2: '',
                    delivery: false,
                    type: [],
                    resource: '',
                    desc: '',
                    company_logo: '',
                    license_file: '',
                    imageUrl: '',
                    fileUrl: '',
                    company_intro: ''
                },
            },
            methods: {
                handleClick(tab, event) {

                },
                onSubmit() {

                },
                handleAvatarSuccess(res, file) {
                    if (res.code == 1) {
                        this.form_company.imageUrl = URL.createObjectURL(file.raw);
                        this.$message.success(res.msg);
                        this.form_company.company_logo = res.data.file_id;
                        // 
                    } else {
                        this.$message.error(res.msg);
                    }
                },
                handleFileSuccess(res, file) {
                    if (res.code == 1) {
                        // this.imageUrl = URL.createObjectURL(file.raw);                        
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