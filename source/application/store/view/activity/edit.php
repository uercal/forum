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
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">活动名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" readonly name="activity[title]" value="<?= $model['title'] ?>" required>
                                </div>
                            </div>

                            <div class="am-form-group" id="banner">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">封面图</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <div class="am-form-file">
                                        <div class="am-form-file">
                                            <!-- <button type="button" class="upload-file am-btn am-btn-secondary am-radius">
                                                <i class="am-icon-cloud-upload"></i> 选择图片
                                            </button> -->
                                            <div class="uploader-list am-cf">
                                                <?php if (!empty($model['cover'])) : ?>
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
                                    <div class="widget-title am-fl">详情</div>
                                </div>

                                <div class="am-form-group" id="text">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">活动简介 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <!-- 加载编辑器的容器 -->
                                        <textarea id="container" name="activity[content]" type="text/plain" style="width:1000px;height:600px;"><?= $model['content'] ?></textarea>
                                    </div>
                                </div>

                            </div>


                            <!--  -->
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">其他</div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">报名时间 </label>
                                <input type="hidden" name="activity[sign_begin]">
                                <input type="hidden" name="activity[sign_end]">
                                <div class="am-u-sm-9 am-u-end">
                                    <div class="am-u-sm-6">
                                        <button type="button" class="am-btn am-btn-sm am-btn-secondary am-round am-margin-right" id="sign-start">报名开始</button><span id="sign-startDate"><?= date('Y-m-d H:i:s', $model['sign_begin']) ?></span>
                                    </div>
                                    <div class="am-u-sm-6">
                                        <button type="button" class="am-btn am-btn-sm am-btn-secondary am-round am-margin-right" id="sign-end">报名结束</button><span id="sign-endDate"><?= date('Y-m-d H:i:s', $model['sign_end']) ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">报名时间说明 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <textarea class="tpl-form-input" name="activity[sign_text]"><?= $model['sign_text'] ?></textarea>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">活动时间 </label>
                                <input type="hidden" name="activity[active_begin]">
                                <input type="hidden" name="activity[active_end]">
                                <div class="am-u-sm-9 am-u-end">
                                    <div class="am-u-sm-6 am-form-file">
                                        <button type="button" class="am-btn am-btn-sm am-btn-secondary am-round am-margin-right" id="active-start">活动开始</button><span id="active-startDate"><?= date('Y-m-d H:i:s', $model['active_begin']) ?></span>
                                    </div>
                                    <div class="am-u-sm-6">
                                        <button type="button" class="am-btn am-btn-sm am-btn-secondary  am-round am-margin-right" id="active-end">活动结束</button><span id="active-endDate"><?= date('Y-m-d H:i:s', $model['active_end']) ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">活动时间说明 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <textarea class="tpl-form-input" name="activity[active_text]"><?= $model['active_text'] ?></textarea>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">活动人数 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="number" class="tpl-form-input" name="activity[member_count]" value="<?= $model['member_count'] ?>" required>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">活动人数说明 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <textarea class="tpl-form-input" name="activity[member_text]"><?= $model['member_text'] ?></textarea>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">活动地点 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="activity[address]" value="<?= $model['address'] ?>" required>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">活动地点说明 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <textarea class="tpl-form-input" name="activity[address_text]"><?= $model['address_text'] ?></textarea>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">文章排序 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="number" class="tpl-form-input" name="activity[sort]" value="<?= $model['sort'] ?>" required>
                                    <small>数字越小越靠前</small>
                                </div>
                            </div>

                            <!-- <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3 am-margin-top-lg">
                                    <button type="submit" class="j-submit am-btn am-btn-secondary">提交
                                    </button>
                                </div>
                            </div> -->
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
            name: 'activity[cover_id]',
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

        // time
        // var startDate = null;
        // var endDate = null;
        // $('#sign-start').datepicker().
        // on('changeDate.datepicker.amui', function(event) {
        //     if (endDate) {
        //         if (event.date.valueOf() > endDate.valueOf()) {
        //             layer.msg('开始日期应小于结束日期！');
        //         } else {
        //             startDate = new Date(event.date);
        //             console.log(event.date);
        //             $('#sign-startDate').text($('#sign-start').data('date'));
        //             $('input[name="activity[sign_begin]"]').val($('#sign-start').data('date'));
        //         }
        //     } else {
        //         startDate = new Date(event.date);
        //         console.log(event.date);
        //         $('#sign-startDate').text($('#sign-start').data('date'));
        //         $('input[name="activity[sign_begin]"]').val($('#sign-start').data('date'));
        //     }
        //     $(this).datepicker('close');
        // });

        // $('#sign-end').datepicker().
        // on('changeDate.datepicker.amui', function(event) {
        //     if (!startDate) {
        //         endDate = new Date(event.date);
        //         $('#sign-endDate').text($('#sign-end').data('date'));
        //         $('input[name="activity[sign_end]"]').val($('#sign-end').data('date'));
        //     } else {
        //         if ((event.date.valueOf() < startDate.valueOf())) {
        //             layer.msg('结束日期应大于开始日期！');
        //         } else {
        //             endDate = new Date(event.date);
        //             $('#sign-endDate').text($('#sign-end').data('date'));
        //             $('input[name="activity[sign_end]"]').val($('#sign-end').data('date'));
        //         }
        //     }

        //     $(this).datepicker('close');
        // });


        // var _startDate = null;
        // var _endDate = null;
        // $('#active-start').datepicker().
        // on('changeDate.datepicker.amui', function(event) {
        //     if (_endDate) {
        //         if (event.date.valueOf() > _endDate.valueOf()) {
        //             layer.msg('开始日期应小于结束日期！');
        //         } else if (event.date.valueOf() < endDate.valueOf()) {
        //             layer.msg('活动开始日期应大于报名结束日期');
        //         } else {
        //             _startDate = new Date(event.date);
        //             console.log(event.date);
        //             $('#active-startDate').text($('#active-start').data('date'));
        //             $('input[name="activity[active_begin]"]').val($('#active-start').data('date'));
        //         }
        //     } else {
        //         if (event.date.valueOf() <= endDate.valueOf()) {
        //             layer.msg('活动开始日期应大于报名结束日期');
        //         } else {
        //             _startDate = new Date(event.date);
        //             console.log(event.date);
        //             $('#active-startDate').text($('#active-start').data('date'));
        //             $('input[name="activity[active_begin]"]').val($('#active-start').data('date'));
        //         }
        //     }
        //     $(this).datepicker('close');
        // });

        // $('#active-end').datepicker().
        // on('changeDate.datepicker.amui', function(event) {
        //     if (_startDate) {
        //         if (event.date.valueOf() < _startDate.valueOf()) {
        //             layer.msg('结束日期应大于开始日期！');
        //         } else {
        //             _endDate = new Date(event.date);
        //             $('#active-endDate').text($('#active-end').data('date'));
        //             $('input[name="activity[active_end]"]').val($('#active-end').data('date'));
        //         }
        //     } else {
        //         _endDate = new Date(event.date);
        //         $('#active-endDate').text($('#active-end').data('date'));
        //         $('input[name="activity[active_end]"]').val($('#active-end').data('date'));
        //     }

        //     $(this).datepicker('close');
        // });







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