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
                                <div class="widget-title am-fl">新增列表类型（<?= $mode['name'] ?>）</div>
                            </div>

                            <input type="hidden" name="list[list_mode_id]" value="<?= $mode['id'] ?>">

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">列表名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="list[name]" value="" required>
                                </div>
                            </div>

                            <!--  -->
                            <?php if ($mode['key_word'] == 'user_news' || $mode['key_word'] == 'news') : ?>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">是否含类别 </label>
                                    <div class="am-u-sm-9 am-u-end" id="radio_show">
                                        <label class="am-radio-inline">
                                            <input type="radio" name="list[cate_exist]" value="0" data-am-ucheck checked>
                                            否
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" name="list[cate_exist]" value="1" data-am-ucheck>
                                            是
                                        </label>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">是否含封面 </label>
                                    <div class="am-u-sm-9 am-u-end" id="radio_show">
                                        <label class="am-radio-inline">
                                            <input type="radio" name="list[cover_exist]" value="0" data-am-ucheck checked>
                                            否
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" name="list[cover_exist]" value="1" data-am-ucheck>
                                            是
                                        </label>
                                    </div>
                                </div>

                                <div class="am-form-group" id="cate_exist" style="display:none;">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">类别<small>(每个类别用逗号隔开)</small></label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" name="list[options]" value="" required>
                                    </div>
                                </div>

                            <?php endif; ?>




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

<script>
    $(function() {
        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

        $("input[name='list[cate_exist]']").on('click', function() {
            if ($(this).val() == 1) {
                $('#cate_exist').show();
            } else {
                $('#cate_exist').hide();
            }
        })
    });
</script>