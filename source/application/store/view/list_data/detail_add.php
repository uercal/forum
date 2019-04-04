<link rel="stylesheet" href="assets/store/css/goods.css">
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<div class="row-content am-cf">






    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="detail[list_id]" value="<?= $list['id'] ?>">
                    <?php if ($list['mode']['key_word'] == 'news') : ?>
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">编辑</div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">标题 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="detail[title]" value="" required>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">封面图</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <div class="am-form-file">
                                        <div class="am-form-file">
                                            <button type="button" class="upload-file am-btn am-btn-secondary am-radius">
                                                <i class="am-icon-cloud-upload"></i> 选择图片
                                            </button>
                                            <div class="uploader-list am-cf">

                                            </div>
                                        </div>
                                        <div class="help-block am-margin-top-sm">
                                            <small>尺寸750x750像素以上，大小2M以下</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="detail_mode">
                                <!-- 详情列表 -->
                                <div class="am-form-group" id="richText">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">内容</label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <!-- 加载编辑器的容器 -->
                                        <textarea id="container" name="detail[content]" type="text/plain" style="width:1000px;height:600px;"></textarea>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">附件 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <div class="am-form-file">
                                            <button type="button" class="upload-attachment am-btn am-btn-secondary am-radius">
                                                <i class="am-icon-cloud-upload"></i> 选择
                                            </button>
                                            <div class="uploader-list am-cf">

                                            </div>
                                        </div>
                                        <div class="help-block am-margin-top-sm">
                                            <small>大小2M以下</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">分类排序 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="number" class="tpl-form-input" name="detail[sort]" value="" required>
                                    <small>数字越小越靠前</small>
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



                    <!-- 头像+职务+富文本 -->
                    <?php elseif ($list['mode']['key_word'] == 'job') : ?>
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">编辑</div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">姓名 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="detail[title]" value="" required>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">职位 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="detail[job]" value="" required>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">头像</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <div class="am-form-file">
                                        <div class="am-form-file">
                                            <button type="button" class="upload-file am-btn am-btn-secondary am-radius">
                                                <i class="am-icon-cloud-upload"></i> 选择图片
                                            </button>
                                            <div class="uploader-list am-cf">

                                            </div>
                                        </div>
                                        <div class="help-block am-margin-top-sm">
                                            <small>尺寸750x750像素以上，大小2M以下</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="detail_mode">
                                <!-- 详情列表 -->
                                <div class="am-form-group" id="richText">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">个人简介</label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <!-- 加载编辑器的容器 -->
                                        <textarea id="container" name="detail[content]" type="text/plain" style="width:1000px;height:600px;"></textarea>
                                    </div>
                                </div>

                                <!-- <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">附件 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <div class="am-form-file">
                                            <button type="button" class="upload-attachment am-btn am-btn-secondary am-radius">
                                                <i class="am-icon-cloud-upload"></i> 选择
                                            </button>
                                            <div class="uploader-list am-cf">

                                            </div>
                                        </div>
                                        <div class="help-block am-margin-top-sm">
                                            <small>大小2M以下</small>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                                                     
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">个人排序 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="number" class="tpl-form-input" name="detail[sort]" value="" required>
                                    <small>数字越小越靠前</small>
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

                    <?php endif; ?>
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

        // 选择图片        
        $('.upload-file').selectImages({
            name: 'detail[cover_id]',
            multiple: false
        });

        $('.upload-attachment').selectAttachment({
            name: 'detail[attachment]',
            multiple: true
        });

        // 富文本编辑器
        UM.getEditor('container');


        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

    });
</script> 