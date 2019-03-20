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
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">所属父级</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <select name="news[pid]" required data-am-selected="{searchBox: 1, btnSize: 'sm',  placeholder:'请选择父级'}">
                                        <option value=""></option>
                                        <?php if (isset($p_list)): foreach ($p_list as $first): ?>
                                        <option value="<?= $first['id'] ?>" <?= $model['pid'] == $first['id'] ? 'selected' : '' ?>>
                                            <?= $first['name'] ?>
                                        </option>
                                        <?php endforeach;
                                endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">新闻名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="news[title]" value="<?= $model['title'] ?>" required>
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
                                                <?php if (!empty($model['cover'])): ?>
                                                <div class="file-item">
                                                    <img src="<?= $model['cover']['file_path'] ?>">
                                                    <input type="hidden" name="news[cover_id]" value="<?= $model['cover']['file_id'] ?>">
                                                    <i class="iconfont icon-shanchu file-item-delete"></i>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="help-block am-margin-top-sm">
                                            <small>尺寸750x750像素以上，大小2M以下</small>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="detail">
                                <div class="widget-head am-cf">
                                    <div class="widget-title am-fl">文章详情</div>
                                </div>

                                <div class="am-form-group" id="text">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">文章详情 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <!-- 加载编辑器的容器 -->
                                        <textarea id="container" name="news[content]" type="text/plain" style="width:1000px;height:600px;"><?= $model['content'] ?></textarea>
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
                                    <input type="number" class="tpl-form-input" name="news[sort]" value="<?= $model['sort'] ?>" required>
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
            name: 'news[cover_id]',
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
            // 自定义验证
            validation: function() {

                return true;
            }
        });


    });
</script> 