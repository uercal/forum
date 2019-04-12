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
                                <div class="widget-title am-fl"><?= $model['name'] ?>职位排序(越小越靠前)</div>
                            </div>

                            <?php foreach($data as $key=>$item):?>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require"><?= $item['name'] ?></label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="hidden" name="data[<?= $key ?>][name]" value="<?= $item['name'] ?>">
                                    <input type="text" class="tpl-form-input" name="data[<?= $key ?>][value]" value="<?= $item['value'] ?>" required>
                                </div>
                            </div>
                            <?php endforeach;?>
                            

                            <small>当前职位顺序: <?=  implode(' >> ',array_column($data,'name','value'))  ?> </small>
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