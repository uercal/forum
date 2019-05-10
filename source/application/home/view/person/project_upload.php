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
                <el-form-item label="项目名称:" prop="title">
                    <el-input v-model="form.title"></el-input>
                </el-form-item>               
                <el-row type="flex">
                    <el-col :span="24">
                        <el-form-item label="服务类别:">
                            <el-select v-model="form.server_cate" multiple placeholder="请选择" style="width:100%;">
                                <el-option v-for="(item,index) in server_cate" :key="index" :label="item" :value="index">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row type="flex">
                    <el-col :span="24">
                        <el-form-item label="工程类别:">
                            <el-select v-model="form.eng_cate" multiple placeholder="请选择" style="width:100%;">
                                <el-option v-for="(item,index) in eng_cate" :key="index" :label="item" :value="index">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                </el-row>              

                <el-row type="flex">
                    <el-col :span="12">
                        <el-form-item label="服务合同金额（元）:" prop="assignment_money" label-width="140px">
                            <el-input v-model.number="form.assignment_money" placeholder=""></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item label="总投资金额（元）:" prop="total_invest" label-width="140px">
                            <el-input type="email" v-model="form.total_invest" placeholder="xx@xx.com"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>


                <el-form-item label="项目封面">
                    <el-upload class="avatar-uploader" action="<?= url('uploadFile') ?>&param=projectCoverUrl" ref="cover" :show-file-list="false" :on-success="handleCoverSuccess" :before-upload="beforeCoverUpload">
                        <img v-if="projectCoverUrl" :src="projectCoverUrl" class="avatar">
                        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                    </el-upload>
                </el-form-item>

                <!--  -->
                <el-form-item label="文章内容">
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
    //     
    // 
    window.vue = new Vue({
        el: '#app',
        data() {
            return {
                eng_cate: $eng_cate,
                server_cate: $server_cate,
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
                    id_card: [{
                        required: true,
                        message: '请填写身份证号码',
                        trigger: 'blur'
                    }, {
                        pattern: /^[1-9]\d{5}(18|19|20)\d{2}((0[1-9])|(1[0-2]))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/,
                        message: '身份证号码格式错误',
                        trigger: 'blur'
                    }],
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
                                window.location.href = '<?= url('projectPaper') ?>'
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
                var form = this.form;
                var valid = true;
                // 
                if (form.list_id == '') {
                    this.$message.error('请选择文章分类');
                    valid = false;
                    return valid;
                }
                if (this.isCover) {
                    if (form.cover_id == '') {
                        this.$message.error('请上传封面');
                        valid = false;
                        return valid;
                    }
                }
                if (this.isOption) {
                    if (form.option_id.length == 0) {
                        this.$message.error('请选择类别');
                        valid = false;
                        return valid;
                    }
                }
                if (form.title == '') {
                    this.$message.error('请填写标题');
                    valid = false;
                    return valid;
                }
                if (form.content == '') {
                    this.$message.error('请填写内容');
                    valid = false;
                    return valid;
                }
                if (valid) {
                    this.doPost(form);
                }
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
                    this.paperCoverUrl = URL.createObjectURL(file.raw);
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