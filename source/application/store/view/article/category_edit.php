<link rel="stylesheet" href="assets/store/css/goods.css">
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">编辑</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">分类名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="category[name]" value="<?= $model['name'] ?>" required>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">上级分类 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <select name="category[parent_id]" data-am-selected="{searchBox: 1, btnSize: 'sm',maxHeight: 300}">
                                        <option value="0">顶级分类</option>
                                        <?php if (isset($list)) : foreach ($list as $first) : ?>
                                                <option value="<?= $first['category_id'] ?>" <?= $model['parent_id'] === $first['category_id'] ? 'selected' : '' ?>>
                                                    <?= $first['name'] ?></option>
                                                <?php if (isset($first['child'])) : foreach ($first['child'] as $child) : ?>
                                                        <option value="<?= $child['category_id'] ?>" <?= $model['parent_id'] === $child['category_id'] ? 'selected' : '' ?>>
                                                            ---<?= $child['name'] ?></option>
                                                    <?php endforeach;
                                            endif; ?>
                                            <?php endforeach;
                                    endif; ?>
                                    </select>
                                </div>
                            </div>



                            <!--  -->
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">是否为页面 </label>
                                <div class="am-u-sm-9 am-u-end" id="radio_show">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="category[is_show]" value="0" data-am-ucheck <?= $model['is_show'] == 0 ? 'checked' : '' ?>>
                                        否
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="category[is_show]" value="1" data-am-ucheck <?= $model['is_show'] == 1 ? 'checked' : '' ?>>
                                        是
                                    </label>
                                </div>
                            </div>

                            <!--  -->
                            <div id="is_show" style="display:none;">
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">背景banner </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <div class="am-form-file">
                                            <button type="button" class="upload-file am-btn am-btn-secondary am-radius">
                                                <i class="am-icon-cloud-upload"></i> 选择图片
                                            </button>
                                            <div class="uploader-list am-cf">
                                                <?php if ($model['image']) : ?>
                                                    <div class="file-item">
                                                        <img src="<?= $model['image']['file_path'] ?>">
                                                        <input type="hidden" name="category[image_id]" value="<?= $model['image_id'] ?>">
                                                        <i class="iconfont icon-shanchu file-item-delete"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="help-block am-margin-top-sm">
                                            <small>大小2M以下</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">模式 </label>
                                    <div class="am-u-sm-9 am-u-end" id="radio_show">
                                        <label class="am-radio-inline">
                                            <input type="radio" name="category[mode]" value="list" data-am-ucheck <?= $model['mode'] == 'list' ? 'checked' : '' ?>>
                                            列表模式
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" name="category[mode]" value="detail" data-am-ucheck <?= $model['mode'] == 'detail' ? 'checked' : '' ?>>
                                            详情模式
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <!--  -->
                            <div class="list_mode" style="display:none;">

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">列表选择 </label>
                                    <div class="am-u-sm-9 am-u-end" style="margin-top: 0.5rem;">
                                        <select name="category[list_mode_id]" data-am-selected="{btnSize: 'sm',maxHeight: 300}" id="list_select">
                                            <option value=""></option>
                                            <?php if (isset($list_mode_list)) : foreach ($list_mode_list as $first) : ?>
                                                    <option value="<?= $first['id'] ?>" <?= $model['list_mode_id'] == $first['id'] ? 'selected' : '' ?>>
                                                        <?= $first['alias_name'] ?></option>
                                                <?php endforeach;
                                        endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require"> </label>
                                    <div class="am-u-sm-9 am-u-end" id="list_option">
                                        <select name="category[list_id]" data-am-selected="{btnSize: 'sm',maxHeight: 300}">
                                            <option value=""></option>
                                            <?php if (isset($model['list_mode_child'])) : foreach ($model['list_mode_child'] as $first) : ?>
                                                    <option value="<?= $first['id'] ?>" <?= $model['list_id'] == $first['id'] ? 'selected' : '' ?>>
                                                        <?= $first['name'] ?></option>
                                                <?php endforeach;
                                        endif; ?>
                                        </select>
                                    </div>
                                </div>



                            </div>

                            <div class="detail_mode" style="display:none;">

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">详情模式 </label>
                                    <div class="am-u-sm-9 am-u-end" style="margin-top: 0.5rem;">
                                        <select name="category[detail_mode_id]" data-am-selected="{btnSize: 'sm',maxHeight: 300}">
                                            <option value=""></option>
                                            <?php if (isset($detail_type_list)) : foreach ($detail_type_list as $key => $first) : ?>
                                                    <option value="<?= $first['id'] ?>" <?= $model['detail_mode_id'] == $first['id'] ? 'selected' : '' ?>>
                                                        <?= $first['name'] ?></option>
                                                <?php endforeach;
                                        endif; ?>
                                        </select>
                                    </div>
                                </div>



                                <!-- 详情列表 -->
                                <div class="am-form-group" id="richText" style="display:none;">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">内容</label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <!-- 加载编辑器的容器 -->
                                        <textarea id="container" name="category[detail][content]" type="text/plain" style="width:1000px;height:600px;"><?= $model['detail']['content'] ?></textarea>
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
                                                <?php if (!empty($model['detail']['attachment'])) : foreach ($model['detail']['attachment'] as $item) : ?>
                                                        <div>
                                                            <input type="hidden" name="category[detail][attachment][]" value="<?= $item['file_id'] ?>">
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
                                </div>





















                            </div>






                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">分类排序 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="number" class="tpl-form-input" name="category[sort]" value="<?= $model['sort'] ?>" required>
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

        // 选择图片
        $('.upload-file').selectImages({
            name: 'category[image_id]'
        });

        $('.upload-attachment').selectAttachment({
            name: 'category[detail][attachment]',
            multiple: true
        });

        // 富文本编辑器
        UM.getEditor('container');


        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

        // 
        var $list_select = $('#list_select');

        $list_select.on('change', function() {
            var list_mode_id = $(this).val();
            // 
            var url = "<?= url('get_list_ajax') ?>&list_mode_id=" + list_mode_id;
            $.get(url, function(res) {
                var html = '';
                if (res.length > 0) {
                    html += '<select name="category[list_id]">';
                    html += '<option value=""></option>';
                    for (var i = 0; i < res.length; i++) {
                        html += '<option value="' + res[i]['id'] + '">';
                        html += res[i]['name'] + '</option>';
                    }
                    html += '</select>';
                }
                $('#list_option').html(html);
                // 
                $('#list_option select').selected({
                    btnWidth: '200px',
                    btnSize: 'sm',                    
                });
            })
        });


        // 

        var is_show = "<?= $model['is_show'] ?>";
        var mode = "<?= $model['mode'] ?>";
        var list_mode_id = "<?= $model['list_mode_id'] ?>";
        var detail_mode_id = "<?= $model['detail_mode_id'] ?>";




        if (is_show == 0) {
            $('#is_show').hide();
            $('.list_mode').hide();
            $('.detail_mode').hide();
        } else {
            $('#is_show').show();
            // 模式
            if (mode == 'list') {
                $('.list_mode').show();
                $('.detail_mode').hide();
                // 

            } else if (mode == 'detail') {
                $('.list_mode').hide();
                $('.detail_mode').show();
                // 
                if (detail_mode_id == 1) {
                    // 富文本
                    $('#richText').show();

                }
                if (detail_mode_id == 2) {
                    $('#richText').hide();
                }
                if (detail_mode_id == 3) {
                    $('#richText').hide();

                }
            }
        }







        // 是否显示页面
        $('input:radio[name="category[is_show]"]').change(function(e) {
            var value = e.currentTarget.value;
            console.log(value);
            if (value == 0) {
                $('#is_show').hide();
                $('.list_mode').hide();
                $('.detail_mode').hide();
            } else {
                $('#is_show').show();
            }
        });



        // 模式
        $('input:radio[name="category[mode]"]').change(function(e) {
            var value = e.currentTarget.value;
            if (value == 'list') {
                $('.list_mode').show();
                $('.detail_mode').hide();
                console.log(value);
            } else if (value == 'detail') {
                $('.list_mode').hide();
                $('.detail_mode').show();
                console.log(value);
            }
        });


        $('select[name="category[detail_mode_id]"]').change(function(e) {
            var value = e.currentTarget.value;
            console.log(value);
            if (value == 1) {
                // 富文本
                $('#richText').show();

            }
            if (value == 2) {
                $('#richText').hide();
            }
            if (value == 3) {
                $('#richText').hide();

            }
        })






    });
</script>