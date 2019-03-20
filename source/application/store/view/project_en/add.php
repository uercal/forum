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
                                <div class="widget-title am-fl">基本信息</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">项目标题 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="project[title]" value="<?= isset($model) ? $model['title'] : '' ?>" required>
                                </div>
                            </div>

                            <div class="detail">
                                <div class="widget-head am-cf">
                                    <div class="widget-title am-fl">详情</div>
                                </div>

                                <div class="am-form-group" id="text">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">项目详情 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <!-- 加载编辑器的容器 -->
                                        <textarea id="container" name="project[content]" type="text/plain" style="width:1000px;height:600px;"><?= isset($model) ? $model['content'] : '' ?></textarea>
                                    </div>
                                </div>

                            </div>



                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary">提交
                                    </button>
                                </div>
                            </div>
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

<script src="assets/store/js/ddsort.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.config.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.min.js"></script>
<script>
    $(function() {

        // 富文本编辑器
        UM.getEditor('container');

        // 选择图片
        $('.upload-file').selectImages({
            name: 'article[pic_ids]',
            multiple: true
        });

        // 图片列表拖动
        $('.uploader-list').DDSort({
            target: '.file-item',
            delay: 100, // 延时处理，默认为 50 ms，防止手抖点击 A 链接无效
            floatStyle: {
                'border': '1px solid #ccc',
                'background-color': '#fff'
            }
        });


        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm({
            // 自定义验证
            validation: function() {

                return true;
            }
        });



    });
</script> 