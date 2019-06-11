<!--  -->

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
            <p>账户设置</p>
            <small style="margin-left:20px;color:#999999;"></small>
        </div>
    </div>

    <div class="person-my-act-body" style="margin-top:35px;">
        <template>
            <el-tabs v-model="activeName" type="card" class="" @tab-click="handleClick">
                <el-tab-pane label="密码修改" name="password">
                    <el-form ref="password" :model="form_pass" :rules="form_pass_rules" label-width="80px" label-position="left" style="margin:10px 0px;">
                        <!--  -->
                        <el-row type="flex" class="row-bg" style="background: #F4F6F2;padding:8px;ont-family: PingFangSC-Regular;font-size: 14px;color: #333333;letter-spacing: 0;margin-bottom:20px;">
                            <el-col :span="24">
                                填写密码
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="旧密码：" prop="password">
                                    <el-input v-model="form_pass.password" type="password" placeholder=""></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-row type="flex" class="row-bg">
                            <el-col :span="12">
                                <el-form-item label="新密码：" class="" prop="new_password">
                                    <el-input v-model="form_pass.new_password" type="password" placeholder=""></el-input>
                                </el-form-item>
                            </el-col>
                        </el-row>
                        <el-col :span="24">
                            <el-button type="primary" @click="onSubmit('pass')">确认提交</el-button>
                        </el-col>
                    </el-form>
                </el-tab-pane>

                <el-tab-pane label="证书下载" name="profile" :exist="<?= !empty($attachment_id) ? 1 : 0 ?>">
                    <el-form ref="password" :model="form_pass" :rules="form_pass_rules" label-width="80px" label-position="left" style="margin:10px 0px;">
                        <!--  -->
                        <?php if (!empty($attachment_id)) : ?>
                            <el-col :span="24">
                                <el-button type="primary" @click="downAttach()">下载</el-button>
                            </el-col>
                        <?php else : ?>
                            <el-col :span="24">

                            </el-col>
                        <?php endif; ?>
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
<script>
    //         
    window.vue = new Vue({
        el: '#app',
        data: {
            loading: true,
            posting: false,
            activeName: '',
            form_pass: {
                password: '',
                new_password: ''
            },
            form_pass_rules: {
                password: [{
                    required: true,
                    message: '请填写旧密码',
                    trigger: 'blur'
                }],
                new_password: [{
                    required: true,
                    message: '请填写新密码',
                    trigger: 'blur'
                }],
            }
        },
        methods: {
            doPost(form) {
                if (!this.posting) {
                    this.posting = true;
                    var _this = this;
                    $.post('<?= url('resetPass') ?>', {
                        form: _this.form_pass
                    }, function(res) {
                        if (res.code == 1) {
                            _this.$message.success(res.msg);
                            setTimeout(function() {
                                window.location.href = '<?= url('personcenter') ?>'
                            }, 1000);
                        } else {
                            _this.$message.error(res.msg);
                            _this.posting = false;
                        }
                    });
                } else {

                }
            },
            handleClick(e) {
                if (e.name == 'profile') {
                    if (e.$attrs.exist == 0) {
                        this.$message.error('工会暂时未颁发证书');
                    }
                }
            },
            onSubmit(type, id = 0) {

                switch (type) {
                    case 'pass':
                        this.$refs['password'].validate((valid) => {
                            if (valid) {
                                if (this.form_pass.password == this.form_pass.new_password) {
                                    this.$message.error('新密码不能与旧密码相同');
                                    return false;
                                } else {
                                    this.doPost(this.form_pass);
                                }
                            } else {
                                console.log('error submit!!');
                                return false;
                            }
                        });
                        break;
                }

            },

            downAttach() {
                var href = '<?= url('getAttachment') ?>';
                window.location.href = href;
            }
        },
        mounted: function() {
            this.loading = false;
        }

    })
</script>