<link rel="stylesheet" href="assets/store/css/goods.css">
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<style>

</style>
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
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">分类名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="article[name]" value="<?= $model['name'] ?>" required>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">是否含有子级 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="article[is_child]" value="1" data-am-ucheck <?= $model['is_child'] == 1 ? 'checked' : '' ?>>
                                        包含
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="article[is_child]" value="0" data-am-ucheck <?= $model['is_child'] == 0 ? 'checked' : '' ?>>
                                        <span class="am-link-muted">不含</span>
                                    </label>
                                </div>
                            </div>

                            <div class="am-form-group type" style="display:none;">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">文章类型 </label>
                                <div class="am-u-sm-9 am-u-end" style="margin-top:5px;">
                                    <select name="article[type]" id="js-selected" data-am-selected="{btnSize: 'sm',  placeholder:'请选择文章类型'}">
                                        <option value="1" <?= $model['type'] == 1 ? 'selected' : '' ?>>图文</option>
                                        <option value="2" <?= $model['type'] == 2 ? 'selected' : '' ?>>多图相册</option>
                                        <option value="3" <?= $model['type'] == 3 ? 'selected' : '' ?>>新闻列表</option>
                                        <option value="4" <?= $model['type'] == 4 ? 'selected' : '' ?>>左图右文</option>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group" id="banner">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">对应banner图</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <div class="am-form-file">
                                        <div class="am-form-file">
                                            <button type="button" class="upload-file-banner am-btn am-btn-secondary am-radius">
                                                <i class="am-icon-cloud-upload"></i> 选择图片
                                            </button>
                                            <div class="uploader-list am-cf">
                                                <?php if (!empty($model['banner'])) : ?>
                                                <div class="file-item">
                                                    <img src="<?= $model['banner']['src'] ?>">
                                                    <input type="hidden" name="article[banner_id][0][id]" value="<?= $model['banner']['id'] ?>">
                                                    <input type="text" name="article[banner_id][0][title]" placeholder="填写标题" value="<?= $model['banner']['title'] ?>">
                                                    <i class="iconfont icon-shanchu file-item-delete"></i>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="help-block am-margin-top-sm">
                                            <small>尺寸750x750像素以上，大小2M以下 (可拖拽图片调整显示顺序 )</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="detail" style="display:none;">
                                <div class="widget-head am-cf">
                                    <div class="widget-title am-fl">文章详情</div>
                                </div>

                                <div class="am-form-group" id="pic" style="display:none;">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">相册图片</label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <div class="am-form-file">
                                            <div class="am-form-file">
                                                <button type="button" class="upload-file am-btn am-btn-secondary am-radius">
                                                    <i class="am-icon-cloud-upload"></i> 选择图片
                                                </button>
                                                <div class="uploader-list am-cf">
                                                    <?php foreach ($model['image'] as $key => $item) : ?>
                                                    <div class="file-item">
                                                        <img src="<?= $item['src'] ?>">
                                                        <input type="hidden" name="article[pic_ids][<?= $key ?>][id]" value="<?= $item['id'] ?>">
                                                        <input type="text" name="article[pic_ids][<?= $key ?>][title]" placeholder="填写标题" value="<?= $item['title'] ?>">
                                                        <input type="text" name="article[pic_ids][<?= $key ?>][project_id]" placeholder="填写项目ID" value="<?= isset($item['project_id']) ? $item['project_id'] : '' ?>">
                                                        <i class="iconfont icon-shanchu file-item-delete"></i>
                                                    </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="help-block am-margin-top-sm">
                                                <small>尺寸750x750像素以上，大小2M以下 (可拖拽图片调整显示顺序 )</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="am-form-group" id="text">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">文章详情 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <!-- 加载编辑器的容器 -->
                                        <textarea id="container" name="article[content]" type="text/plain" style="width:1000px;height:600px;"><?= $model['content'] ?></textarea>
                                    </div>
                                </div>

                            </div>

                            <!--  -->
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">其他</div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">文章排序 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="number" class="tpl-form-input" name="article[sort]" value="<?= $model['sort'] ?>" required>
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
            name: 'article[pic_ids][]',
            multiple: true
        });


        // banner
        $('.upload-file-banner').selectImages({
            name: 'article[banner_id]',
            multiple: false
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
            // form data

            // 自定义验证
            validation: function() {
                return true;
            }
        });


        // 
        var is_child = $('input[name="article[is_child]"]:checked').val();
        if (is_child == 0) {
            $('.detail').show();
            $('.type').show();
        }

        $('input[name="article[is_child]"]').on('click', function(e) {
            is_child = e.currentTarget.value;
            console.log(is_child);
            if (is_child == 0) {
                $('.detail').show();
                $('.type').show();
            } else {
                $('.detail').hide();
                $('.type').hide();
            }
        });

        // 
        var $selected = $('#js-selected');
        var selected_value = $('#js-selected :selected').val();
        if (selected_value == 1 && is_child == 0) {
            $('.detail').show();
            $('#text').show();
            $('#pic').hide();
        }

        $selected.on('change', function() {
            selected_value = $(this).val();
            if (selected_value == 1 && is_child == 0) {
                $('.detail').show();
                $('#text').show();
                $('#pic').hide();
            }
            if (selected_value == 2 && is_child == 0) {
                $('.detail').show();
                $('#text').hide();
                $('#pic').show();
            }
            if (selected_value == 3 && is_child == 0) {
                $('#text').hide();
                $('#pic').hide();
                $('.detail').hide();
            }
            if (selected_value == 4 && is_child == 0) {
                $('#text').show();
                $('#pic').show();
                $('.detail').show();
            }
        });







    });
</script> 