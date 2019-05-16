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
            <p>子站管理</p>
            <small style="margin-left:20px;color:#999999;"></small>
        </div>
    </div>

    <div class="person-my-act-body" style="margin-top:35px;">
        <template>
            <el-tabs v-model="activeName" type="card" class="">
                <?php if ($code == 30) : ?>
                    <el-tab-pane label="申请子站" name="apply">
                        <div class="my-act-item" style="background-color:#fff;margin-top:0;padding:0;">
                            <div style="width:100%;display:flex;">
                                <p style="font-size:16px;text-indent:2rem;">申请专家会员需经过主管理员审核个人会员信息资料，若资质符合专家会员要求，将成为海南省全过程工程咨询专家库专家。</p>
                                <p style="font-size:14px;text-indent:2rem;color:#999999;">高级专家：高级工程师、副教授、副研究员</p>
                                <p style="font-size:14px;text-indent:2rem;color:#999999;">资深专家：正高级工程师、教师、研究员</p>
                                <p style="font-size:14px;text-indent:2rem;color:#999999;">顶级专家：院士、长江学者、百人计划、杰青优青、千人计划、万人计划、双一流学术带头人、其他高层次人才</p>
                            </div>
                        </div>
                        <el-col :span="24" style="margin-top:30px;">
                            <el-button type="primary" @click="doPost">提交申请</el-button>
                        </el-col>
                    </el-tab-pane>
                <?php elseif ($code == 10) : ?>
                    <el-tab-pane label="我的子站" name="site">
                        <div class="my-act-item" style="background-color:#fff;margin-top:0;padding:0;">
                            <div style="width:100%;display:flex;">
                                <p style="font-size:14px;text-indent:2rem;color:#999999;">高级专家：高级工程师、副教授、副研究员</p>
                                <p style="font-size:14px;text-indent:2rem;color:#999999;">资深专家：正高级工程师、教师、研究员</p>
                                <p style="font-size:14px;text-indent:2rem;color:#999999;">顶级专家：院士、长江学者、百人计划、杰青优青、千人计划、万人计划、双一流学术带头人、其他高层次人才</p>
                            </div>
                        </div>
                    </el-tab-pane>
                <?php else : ?>
                    <div style="width:100%;display:flex;align-items:center;jusity-content:center;">
                        <strong style="font-size:48px;color:#e8e8e8;">申请正在审核中。。。</strong>
                    </div>
                <?php endif; ?>
            </el-tabs>
        </template>
    </div>

</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- import Vue before Element -->
<script src="https://unpkg.com/vue@2.6.10/dist/vue.js"></script>
<!-- import JavaScript -->
<script src="https://unpkg.com/element-ui@2.8.2/lib/index.js"></script>
<script>
    //         
    window.vue = new Vue({
        el: '#app',
        data: {
            loading: true,
            posting: false
        },
        methods: {
            doPost() {
                if (!this.posting) {
                    this.posting = true;
                    var _this = this;
                    $.post('<?= url('applySite') ?>', function(res) {
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
        },
        mounted: function() {
            this.loading = false;
        }

    })
</script>