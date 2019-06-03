<link rel="stylesheet" href="assets/store/css/goods.css">
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">

                    <?php if ($model['list']['mode']['key_word'] == '_news') : ?>
                        <div class="widget-body">
                            <fieldset>
                                <div class="widget-head am-cf">
                                    <div class="widget-title am-fl">编辑</div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">新闻名称 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" name="detail[title]" value="<?= $model['title'] ?>" required>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">封面图</label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <div class="am-form-file">
                                            <div class="am-form-file">
                                                <button type="button" class="upload-file am-btn am-btn-secondary am-radius">
                                                    <i class="am-icon-cloud-upload"></i> 选择图片
                                                </button>
                                                <div class="uploader-list am-cf">
                                                    <?php if (!empty($model['cover'])) : ?>
                                                        <div class="file-item">
                                                            <img src="<?= $model['cover']['file_path'] ?>">
                                                            <input type="hidden" name="detail[cover_id][]" value="<?= $model['cover']['file_id'] ?>">
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

                                <div class="detail_mode">
                                    <!-- 详情列表 -->
                                    <div class="am-form-group" id="richText">
                                        <label class="am-u-sm-3 am-u-lg-2 am-form-label">内容</label>
                                        <div class="am-u-sm-9 am-u-end">
                                            <!-- 加载编辑器的容器 -->
                                            <textarea id="container" name="detail[content]" type="text/plain" style="width:1000px;height:600px;"><?= $model['content'] ?></textarea>
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
                                                                                            <?php if (!empty($model['attachment'])) : foreach ($model['attachment'] as $item) : ?>
                                                                                                                                                                                    <div>
                                                                                                                                                                                        <input type="hidden" name="detail[attachment][]" value="<?= $item['file_id'] ?>">
                                                                                                                                                                                        <a href="<?= $item['file_path'] ?>" style="margin-right:10px;">
                                                                                                                                                                                            <?= $item['origin_name'] ?>
                                                                                                                                                                                        </a>
                                                                                                                                                                                        <i class="iconfont icon-shanchu file-item-delete"></i>
                                                                                                                                                                                    </div>
                                                                                                                                        <?php endforeach;
                                                                                                                                endif; ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="help-block am-margin-top-sm">
                                                                                        <small>大小2M以下</small>
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">分类排序 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="number" class="tpl-form-input" name="detail[sort]" value="<?= $model['sort'] ?>" required>
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
                    <?php elseif ($model['list']['mode']['key_word'] == 'job') : ?>
                        <div class="widget-body">
                            <fieldset>
                                <div class="widget-head am-cf">
                                    <div class="widget-title am-fl">编辑</div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">姓名 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" name="detail[title]" value="<?= $model['title'] ?>" required>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">职位 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" name="detail[job]" value="<?= $model['job'] ?>" required>
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
                                                    <?php if (!empty($model['cover'])) : ?>
                                                        <div class="file-item">
                                                            <img src="<?= $model['cover']['file_path'] ?>">
                                                            <input type="hidden" name="detail[cover_id][]" value="<?= $model['cover']['file_id'] ?>">
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



                                <div class="detail_mode">
                                    <!-- 详情列表 -->
                                    <div class="am-form-group" id="richText">
                                        <label class="am-u-sm-3 am-u-lg-2 am-form-label">个人简介</label>
                                        <div class="am-u-sm-9 am-u-end">
                                            <!-- 加载编辑器的容器 -->
                                            <textarea id="container" name="detail[content]" type="text/plain" style="width:1000px;height:600px;"><?= $model['content'] ?></textarea>
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
                                                                                                            <?php if (!empty($model['attachment'])) : foreach ($model['attachment'] as $item) : ?>
                                                                                                                                                                                                                                    <div>
                                                                                                                                                                                                                                        <input type="hidden" name="detail[attachment][]" value="<?= $item['file_id'] ?>">
                                                                                                                                                                                                                                        <a href="<?= $item['file_path'] ?>" style="margin-right:10px;">
                                                                                                                                                                                                                                            <?= $item['origin_name'] ?>
                                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                                        <i class="iconfont icon-shanchu file-item-delete"></i>
                                                                                                                                                                                                                                    </div>
                                                                                                                                                                        <?php endforeach;
                                                                                                                                                                endif; ?>
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
                                        <input type="number" class="tpl-form-input" name="detail[sort]" value="<?= $model['sort'] ?>" required>
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


                    <?php elseif ($model['list']['mode']['key_word'] == 'mag') : ?>
                        <div class="widget-body">
                            <fieldset>
                                <div class="widget-head am-cf">
                                    <div class="widget-title am-fl">编辑</div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">标题 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" name="detail[title]" value="<?= $model['title'] ?>" required>
                                    </div>
                                </div>

                               

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">跳转链接 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" name="detail[data]" value="<?= $model['data']['jumpUrl'] ?>" required>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">排序 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="number" class="tpl-form-input" name="detail[sort]" value="<?= $model['sort'] ?>" required>
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



                    <?php elseif ($model['list']['mode']['key_word'] == 'user_news' || $model['list']['mode']['key_word'] == 'news') : ?>
                        <div class="widget-body">
                            <fieldset>
                                <div class="widget-head am-cf">
                                    <div class="widget-title am-fl">编辑</div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">标题 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" name="detail[title]" value="<?= $model['title'] ?>" required>
                                    </div>
                                </div>




                                <?php if ($model['list']['cate_exist'] == 1) : ?>
                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">类别 </label>
                                        <div class="am-u-sm-9 am-u-end">
                                            <?php foreach ($model['list']['user_news_option'] as $first) : ?>
                                                <label class="am-checkbox-inline">
                                                    <input type="checkbox" name="detail[option_id][]" value="<?= $first['id'] ?>" data-am-ucheck <?= in_array($first['id'], explode(',', $model['option_id'])) ? 'checked' : '' ?>><?= $first['name'] ?>
                                                </label>
                                            <?php endforeach; ?>
                                        </div>

                                    </div>
                                <?php endif; ?>

                                <?php if ($model['list']['cover_exist'] == 1) : ?>
                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">封面图</label>
                                        <div class="am-u-sm-9 am-u-end">
                                            <div class="am-form-file">
                                                <div class="am-form-file">
                                                    <button type="button" class="upload-file am-btn am-btn-secondary am-radius">
                                                        <i class="am-icon-cloud-upload"></i> 选择图片
                                                    </button>
                                                    <div class="uploader-list am-cf">
                                                        <?php if (!empty($model['cover'])) : ?>
                                                            <div class="file-item">
                                                                <img src="<?= $model['cover']['file_path'] ?>">
                                                                <input type="hidden" name="detail[cover_id][]" value="<?= $model['cover']['file_id'] ?>">
                                                                <i class="iconfont icon-shanchu file-item-delete"></i>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="help-block am-margin-top-sm">
                                                    <small>尺寸360x180像素以上，大小2M以下</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>


                                <div class="detail_mode">
                                    <!-- 详情列表 -->
                                    <div class="am-form-group" id="richText">
                                        <label class="am-u-sm-3 am-u-lg-2 am-form-label">内容</label>
                                        <div class="am-u-sm-9 am-u-end">
                                            <!-- 加载编辑器的容器 -->
                                            <textarea id="container" name="detail[content]" type="text/plain" style="width:1000px;height:600px;"><?= $model['content'] ?></textarea>
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
                                                                            <?php if (!empty($model['attachment'])) : foreach ($model['attachment'] as $item) : ?>
                                                                                                                                    <div>
                                                                                                                                        <input type="hidden" name="detail[attachment][]" value="<?= $item['file_id'] ?>">
                                                                                                                                        <a href="<?= $item['file_path'] ?>" style="margin-right:10px;">
                                                                                                                                            <?= $item['origin_name'] ?>
                                                                                                                                        </a>
                                                                                                                                        <i class="iconfont icon-shanchu file-item-delete"></i>
                                                                                                                                    </div>
                                                                                                        <?php endforeach;
                                                                                                endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="help-block am-margin-top-sm">
                                                                        <small>大小2M以下</small>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">分类排序 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="number" class="tpl-form-input" name="detail[sort]" value="<?= $model['sort'] ?>" required>
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
        <?php if (($model['list']['mode']['key_word'] == 'user_news' || $model['list']['mode']['key_word'] == 'news') && $model['list']['cover_exist'] == 1) : ?>
            $('#my-form').superForm({
                // 自定义验证
                validation: function(e) {
                    var cover = $('.file-item').length;
                    console.log(cover);
                    if (cover === 0) {
                        layer.msg('封面图不能为空');
                        return false;
                    }
                    return true;
                }
            });

        <?php else : ?>
            $('#my-form').superForm();

        <?php endif; ?>

    });
</script>