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
                                <div class="widget-title am-fl">列表类型（<?= $model['mode']['name'] ?>）</div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">列表名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="list[name]" value="<?= $model['name'] ?>" required>
                                </div>
                            </div>

                            <?php if ($model['mode']['key_word'] == 'user_news') : ?>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">列表是否含类别 </label>
                                    <div class="am-u-sm-9 am-u-end" id="radio_show">
                                        <label class="am-radio-inline">
                                            <input type="radio" name="list[cate_exist]" value="0" data-am-ucheck <?= $model['cate_exist'] == 0 ? 'checked' : '' ?>>
                                            否
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" name="list[cate_exist]" value="1" data-am-ucheck <?= $model['cate_exist'] == 1 ? 'checked' : '' ?>>
                                            是
                                        </label>
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

    });
</script>