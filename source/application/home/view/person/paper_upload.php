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
        margin: 20px;
    }
</style>
<!--  -->
<div class="person-my-act" id="app">
    <div class="person-my-act-head">
        <div>
            <p>发布文章</p>
        </div>
    </div>

    <div class="person-my-act-body" style="margin-top:35px;">
        <template>
            <el-form ref="form" :model="form" label-width="80px">
                <el-form-item label="文章分类">
                    <el-select v-model="form.list_id" placeholder="请选择分类" @change="changeListId">
                        <el-option v-for="(item,index) in type_list" :label="item" :value="index"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="文章类别" v-if="isOption">
                    <el-checkbox-group v-model="form.option_id">
                        <el-checkbox v-for="item in option_arr" :label="item.id" :key="item.id" name="option_id">{{item.name}}</el-checkbox>
                    </el-checkbox-group>
                </el-form-item>
                <el-form-item label="文章标题">
                    <el-input v-model="form.title"></el-input>
                </el-form-item>
                <el-form-item label="文章封面" v-if="isCover">
                    <el-upload class="avatar-uploader" action="<?= url('uploadFile') ?>&param=paperCover" ref="cover" :show-file-list="false" :on-success="handleCoverSuccess" :before-upload="beforeCoverUpload">
                        <img v-if="paperCoverUrl" :src="paperCoverUrl" class="avatar">
                        <i v-else class="el-icon-plus avatar-uploader-icon"></i>
                    </el-upload>
                </el-form-item>

                <!--  -->
                <!-- bidirectional data binding（双向数据绑定） -->
                <div id="container">
                </div>


                <!--  -->
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">立即创建</el-button>
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
<script src="assets/store/js/jquery.min.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.config.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.min.js"></script>
<!--  -->
<script>
    var $type_list = JSON.parse('<?= json_encode($type_list) ?>');
    //     
    // 
    window.vue = new Vue({
        el: '#app',
        data() {
            return {
                type_list: $type_list,
                option_arr: [],
                paperCoverUrl: '',
                isCover: false,
                isOption: false,
                content: '<p>example content</p>',
                editorOption: {
                    /* quill options */
                },
                form: {
                    list_id: '',
                    cover_id: '',
                    option_id: [],
                    title: '',
                    content: ''
                }
            }
        },
        methods: {
            onSubmit() {
                this.form.content = UM.getEditor('container').getContent();
                console.log(this.form);
            },
            onEditorChange(event) {
                console.log('onEditorChange')
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