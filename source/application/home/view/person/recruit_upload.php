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
                        <el-form-item label="招聘职位:" prop="job_name">
                            <el-input v-model="form.job_name"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item label="招聘单位:">
                            <el-input v-model="company_name" disabled="disabled"></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row type="flex">
                    <el-col :span="6">
                        <el-form-item label="薪资（元）:" prop="job_price" class="is-required">
                            <el-input v-model.number="form.job_price[0]"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="6">
                        <el-form-item label="~" label-width="30px" prop="job_price">
                            <el-input v-model.number="form.job_price[1]"></el-input>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item label="工作经验:" prop="job_experience">
                            <el-select v-model="form.job_experience" placeholder="请选择" style="width:100%;">
                                <el-option v-for="item in job_experience_attr" :key="item.value" :label="item.label" :value="item.value">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row type="flex">
                    <el-col :span="12">
                        <el-form-item label="学历" prop="job_education">
                            <el-select v-model="form.job_education" placeholder="请选择" style="width:100%;">
                                <el-option v-for="item in job_education_attr" :key="item.value" :label="item.label" :value="item.value">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :span="12">
                        <el-form-item label="工作地点" prop="job_address">
                            <el-cascader expand-trigger="hover" :options="region_data" v-model="form.job_address" @change="handleChange" style="width:100%;">
                            </el-cascader>
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
    var $region_data = JSON.parse('<?= json_encode($region_data) ?>');

    window.vue = new Vue({
        el: '#app',
        data() {
            var validatePrice = (rule, value, callback) => {
                if (Number(value[0]) > Number(value[1])) {
                    callback(new Error('最大值不能低于最小值'));
                } else {
                    callback();
                }
            };
            return {
                company_name: "<?= $company_name ?>",
                region_data: $region_data,
                posting: false,
                job_education_attr: [{
                    value: '0',
                    label: '不限'
                }, {
                    value: '10',
                    label: '专科'
                }, {
                    value: '20',
                    label: '本科'
                }, {
                    value: '30',
                    label: '硕士'
                }, {
                    value: '40',
                    label: '博士'
                }, ],
                job_experience_attr: [{
                        value: '-2',
                        label: '不限'
                    }, {
                        value: '-1',
                        label: '应届生'
                    }, {
                        value: '0,1',
                        label: '1年以内'
                    }, {
                        value: '1,3',
                        label: '1-3年'
                    }, {
                        value: '3,5',
                        label: '3-5年'
                    },
                    {
                        value: '5,10',
                        label: '5-10年'
                    },
                    {
                        value: '11',
                        label: '10年以上'
                    }
                ],
                form: {
                    job_name: '',
                    job_address: [],
                    content: '',
                    job_experience: [],
                    job_price: [

                    ],
                    job_education: ''
                },
                form_rules: {
                    job_name: [{
                        required: true,
                        message: '请填写内容',
                        trigger: 'blur'
                    }],
                    job_price: [{
                        type: 'array',
                        validator: validatePrice,
                        trigger: 'blur'
                    }],
                    job_experience: [{
                        required: true,
                        trigger: 'blur'
                    }],
                    job_address: [{
                        required: true,
                        message: '请填写工作地点',
                        trigger: 'blur'
                    }],
                    job_education: [{
                        required: true,
                        message: '内容不能为空',
                        trigger: 'blur'
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
                    $.post('<?= url('recruitUploadAjax') ?>', {
                        form: form
                    }, function(res) {
                        console.log(res);
                        if (res.code == 1) {
                            _this.$message.success(res.msg);
                            setTimeout(function() {
                                window.location.href = '<?= url('personRecruit') ?>'
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
                        this.doPost(this.form);
                    } else {
                        this.$message.error('error submit');
                        return false;
                    }
                });
            },
            handleChange: function(value) {
                this.form.job_address = value;
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