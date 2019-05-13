<!--  -->
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<style>
    .avatar-uploader .el-upload {
        border: 1px dashed #d9d9d9;
        border-radius: 6px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
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
            <p>发布项目</p>
        </div>
    </div>

    <div class="person-my-act-body" style="margin-top:35px;">
        <template>
            <el-form ref="form" :model="form" :rules="form_rules" label-width="80px" label-position="left" style="margin-top:30px;">
                <el-row type="flex">
                    <el-col :span="12">
                        <el-form-item label="项目名称:" prop="title">
                            <el-input v-model="form.title"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item label="合同签订时间" prop="assignment_date" label-width="120px">
                            <el-date-picker type="date" value-format="yyyy-MM-dd" placeholder="选择日期" v-model="form.assignment_date" style="width: 100%;"></el-date-picker>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row type="flex">
                    <el-col :span="12">
                        <el-form-item label="服务类别:" prop="server_cate">
                            <el-select v-model="form.server_cate" multiple placeholder="请选择" style="width:100%;">
                                <el-option v-for="(item,index) in server_cate" :key="index" :label="item" :value="index">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item label="工程类别:" prop="eng_cate">
                            <el-select v-model="form.eng_cate" multiple placeholder="请选择" style="width:100%;">
                                <el-option v-for="(item,index) in eng_cate" :key="index" :label="item" :value="index">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row type="flex">
                    <el-col :span="12">
                        <el-form-item label="服务合同金额（元）" prop="assignment_money" label-width="135px">
                            <el-input v-model.number="form.assignment_money" placeholder=""></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item label="总投资金额（元）" prop="total_invest" label-width="140px">
                            <el-input type="email" v-model.number="form.total_invest" placeholder=""></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>


                <el-row type="flex">
                    <el-col :span="12">
                        <el-form-item label="项目所在地" prop="region_option" label-width="100px">
                            <el-cascader expand-trigger="hover" :options="region_data" v-model="region_option" @change="handleChange" style="width:100%;">
                            </el-cascader>
                        </el-form-item>
                    </el-col>
                </el-row>

                <el-row type="flex">
                    <el-col :span="12">
                        <el-form-item label="项目封面">
                            <el-upload class="avatar-uploader" action="<?= url('uploadFile') ?>&param=projectCover" ref="cover" :show-file-list="false" :on-success="handleCoverSuccess" :before-upload="beforeCoverUpload">
                                <img v-if="projectCoverUrl" :src="projectCoverUrl" class="avatar">
                                <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                            </el-upload>
                        </el-form-item>
                    </el-col>
                </el-row>



                <!--  -->
                <el-form-item label="文章内容" prop="content">
                    <div id="container">
                    </div>
                </el-form-item>


                <!--  -->
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">确认提交</el-button>
                    <el-button>取消</el-button>
                </el-form-item>
            </el-form>
        </template>
    </div>

</div>

<!-- import Vue before Element -->
<script src="https://unpkg.com/vue@2.6.10/dist/vue.js"></script>
<script src="https://unpkg.com/element-ui@2.8.2/lib/index.js"></script>
<!--  -->
<script src="assets/store/plugins/umeditor/umeditor.config.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.min.js"></script>
<!--  -->
<script>
    var $eng_cate = JSON.parse('<?= json_encode($eng_cate) ?>');
    var $server_cate = JSON.parse('<?= json_encode($server_cate) ?>');
    var $region_data = JSON.parse('<?= json_encode($region_data) ?>');
    //     
    // 
    window.vue = new Vue({
        el: '#app',
        data() {
            var validateRegion = (rule, value, callback) => {
                var r = this.form.province_id;
                if (r == '') {
                    callback(new Error('不能为空'));
                } else {
                    callback();
                }
            };
            return {
                eng_cate: $eng_cate,
                server_cate: $server_cate,
                region_data: $region_data,
                region_option: [],
                eng_arr: [],
                server_arr: [],
                projectCoverUrl: '',
                posting: false,
                form: {
                    title: '',
                    cover_id: '',
                    content: '',
                    server_cate: [],
                    eng_cate: [],
                    city_id: '',
                    province_id: '',
                    region_id: '',
                    assignment_money: '',
                    assignment_date: '',
                    total_invest: ''
                },
                form_rules: {
                    title: [{
                        required: true,
                        message: '请填写标题',
                        trigger: 'blur'
                    }],
                    server_cate: [{
                        required: true,
                        message: '请勾选服务类别',
                        trigger: 'blur'
                    }],
                    eng_cate: [{
                        required: true,
                        message: '请勾选工程类别',
                        trigger: 'blur'
                    }],
                    assignment_money: [{
                        required: true,
                        message: '金额不能为空',
                        trigger: 'blur'
                    }, {
                        type: 'number',
                        message: '必须为整数数字'
                    }],
                    assignment_date: [{
                        required: true,
                        message: '时间不能为空',
                        trigger: 'blur'
                    }],
                    total_invest: [{
                        required: true,
                        message: '金额不能为空',
                        trigger: 'blur'
                    }, {
                        type: 'number',
                        message: '必须为整数数字'
                    }],
                    projectCoverUrl: [{
                        required: true,
                        message: '封面不能为空',
                        trigger: 'blur'
                    }],
                    region_option: [{
                        type: 'array',
                        validator: validateRegion,
                        trigger: 'change'
                    }],
                    content: [{
                        required: true,
                        message: '内容不能为空',
                        trigger: 'blur'
                    }]
                }
            }
        },
        methods: {
            doPost(form) {
                if (!this.posting) {
                    this.posting = true;
                    var _this = this;
                    $.post('<?= url('projectUploadAjax') ?>', {
                        form: form
                    }, function(res) {
                        console.log(res);
                        if (res.code == 1) {
                            _this.$message.success(res.msg);
                            setTimeout(function() {
                                window.location.href = '<?= url('personCenter') ?>'
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
            onSubmit() {
                this.form.content = UM.getEditor('container').getContent();
                this.$refs['form'].validate((valid) => {
                    if (valid) {
                        if (this.form.cover_id) {
                            this.doPost(this.form);
                        } else {
                            this.$message.error('请上传相应图片和附件');
                        }
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },
            handleChange: function(value) {
                this.form.province_id = value[0];
                this.form.city_id = value[1];
                this.form.region_id = value[2];
                this.region_option = value;
            },
            changeListId(v) {
                this.isCover = false;
                this.isOption = false;
                var _this = this;
                $.post('<?= url('getListInfo') ?>', {
                    id: v
                }, function(res) {
                    if (res.cate_exist == 1) {
                        _this.isOption = true;
                        _this.option_arr = res.user_news_option;
                    }
                    if (res.cover_exist == 1) {
                        _this.isCover = true;
                    }
                    _this.form.option_id = [];
                })
            },
            handleCoverSuccess(res, file) {
                if (res.code == 1) {
                    this.projectCoverUrl = URL.createObjectURL(file.raw);
                    this.$message.success(res.msg);
                    this.form.cover_id = res.data.file_id;
                    // 
                } else {
                    this.$message.error(res.msg);
                }
            },
            beforeCoverUpload(file) {
                const isJPG = (file.type === 'image/jpeg' || file.type === 'image/png');
                const isLt2M = file.size / 1024 / 1024 < 2;

                if (!isJPG) {
                    this.$message.error('上传图片只能是 JPG&PNG 格式!');
                }
                if (!isLt2M) {
                    this.$message.error('上传图片大小不能超过 2MB!');
                }
                return isJPG && isLt2M;
            },
            editorCreate() {
                UM.getEditor('container');
            }
        },
        mounted() {
            this.editorCreate();
        }
    })
</script>