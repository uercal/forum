<link rel="stylesheet" href="assets/store/css/goods.css">
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<style>
.edui-body-container{
    min-height: 300px !important;
    height: 300px;
}
</style>
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl"><?= $model['name'] ?>职位排序(越小越靠前)</div>
                            </div>

                            <?php foreach ($data as $key => $item) : ?>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require"><?= $item['name'] ?></label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="hidden" name="data[<?= $key ?>][name]" value="<?= $item['name'] ?>">
                                        <input type="text" class="tpl-form-input" name="data[<?= $key ?>][value]" value="<?= $item['value'] ?>" required>
                                    </div>
                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-u-lg-2 am-form-label"><?= $item['name'] . '说明' ?></label>
                                        <div class="am-u-sm-9 am-u-end" style="padding-top:.8rem;">
                                            <!-- 加载编辑器的容器 -->
                                            <textarea id="container_<?= $key ?>" name="data[<?= $key ?>][content]" type="text/plain" style="width:1000px;height:600px;"><?= $item['content'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>


                            <small>当前职位顺序: <?= implode(' >> ', array_column($data, 'name', 'value'))  ?> </small>
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

<script src="assets/store/plugins/umeditor/umeditor.config.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.min.js"></script>
<script>
    $(function() {


        // 富文本编辑器
        <?php foreach ($data as $key => $item) : ?>
            UM.getEditor('container_<?= $key ?>');
        <?php endforeach; ?>
        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm();

    });
</script>