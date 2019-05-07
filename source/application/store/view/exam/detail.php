<style>
    .am-btn {
        font-size: 1.4rem;
    }
</style>

<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-body">
                    <fieldset>
                        <form id="my-form" class="am-form tpl-form-line-form" method="post">
                            <!--  -->
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">提交用户信息</div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label"> 用户名称 :</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="<?= $info['user']['user_name'] ?>" disabled="disabled">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label"> 用户头像 :</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <a href="<?= $info['user']['avatar_path'] ?>" title="点击查看大图" target="_blank" style="margin-right:10px;">
                                        <img src="<?= $info['user']['avatar_path'] ?>" width="108" height="108" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label"> 用户提交时的角色 :</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="<?= $info['level_option'] ?>" disabled="disabled">
                                </div>
                            </div>


                            <!--  -->
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">审核信息</div>
                            </div>
                            <?php foreach ($data as $key => $item) : ?>
                                <?php if ($key == 'input') : ?>
                                    <?php foreach ($item as $k => $v) : ?>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-u-lg-2 am-form-label"> <?= $map[$k] ?> :</label>
                                            <div class="am-u-sm-9 am-u-end">
                                                <input type="text" class="tpl-form-input" name="<?= $k ?>" value="<?= $k == 'gender' ? ($v == 0 ? '男' : '女') : $v ?>" disabled="disabled">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php elseif ($key == "text") : ?>
                                    <div class="widget-head am-cf">
                                        <div class="widget-title am-fl">详细信息</div>
                                    </div>
                                    <?php foreach ($item as $k => $v) : ?>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-u-lg-2 am-form-label"> <?= $map[$k] ?> :</label>
                                            <div class="am-u-sm-9 am-u-end">
                                                <textarea name="<?= $k ?>" disabled="disabled" rows="10"><?= $v ?></textarea>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php elseif ($key == "image") : ?>
                                    <?php foreach ($item as $k => $v) : ?>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-u-lg-2 am-form-label"> <?= $map[$k] ?> :</label>
                                            <?php if ($k == 'order_id') : ?>
                                                <div class="tpl-table-black-operation" style="padding-top: .8rem;">
                                                    <a href="<?= url('order/detail', ['order_id' => $v]) ?>" style="margin-left: 10px;" class="tpl-table-black-operation">点击跳转</a>
                                                </div>
                                            <?php else : ?>
                                                <div class="am-u-sm-9 am-u-end">
                                                    <?php if (is_array($v)) : foreach ($v as $c) : ?>
                                                            <a href="<?= $c ?>" title="点击查看大图" target="_blank" style="margin-right:10px;">
                                                                <img name="<?= $k ?>" src="<?= $c ?>" width="72" height="72" alt="">
                                                            </a>
                                                        <?php endforeach;
                                                else : ?>
                                                        <a href="<?= $v ?>" title="点击查看大图" target="_blank">
                                                            <img name="<?= $k ?>" src="<?= $v ?>" width="72" height="72" alt="">
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                    <?php endforeach; ?>

                                <?php elseif ($key == 'array') : ?>
                                    <?php foreach ($item as $k => $v) :  ?>
                                        <div class="widget-head am-cf">
                                            <div class="widget-title am-fl"><?= $map[$k] ?></div>
                                        </div>
                                        <div class="am-form-group">
                                            <?php foreach ($v as $_k => $_v) : foreach ($_v as $i => $value) : ?>
                                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label"> <?= $value['name'] . ($_k + 1) ?>:</label>
                                                    <div class="am-u-sm-9 am-u-end">
                                                        <input type="text" class="tpl-form-input" value="<?= $value['value'] ?>" disabled="disabled">
                                                    </div>
                                                <?php endforeach;
                                        endforeach; ?>
                                            <!-- todo -->
                                        </div>
                                    <?php endforeach; ?>

                                <?php elseif ($key == "file") : ?>
                                    <?php foreach ($item as $k => $v) : ?>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-u-lg-2 am-form-label"> <?= $map[$k] ?> :</label>
                                            <div class="am-u-sm-1 am-u-end am-form-label">
                                                <a href="<?= $v ?>" title="点击查看" target="_blank">
                                                    <?= explode('/', $v)[count(explode('/', $v)) - 1] ?>
                                                </a>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>



                                <?php endif; ?>
                            <?php endforeach; ?>


                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">备注信息</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <textarea type="text" id="bonus" class="tpl-form-input" value=""></textarea>
                                </div>
                            </div>

                        </form>

                        <?php if ($status == 10) : ?>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">审核</div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-1 am-margin-top-lg">
                                    <button class="j-submit am-btn am-btn-success" style="margin-right:40px;" data-type="pass">通过
                                    </button>
                                    <button class="j-submit am-btn am-btn-danger" data-type="failed">驳回
                                    </button>
                                </div>
                                <input type="hidden" id="id" value="<?= $id ?>">
                            </div>
                        <?php endif; ?>
                    </fieldset>
                </div>
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
        $('.j-submit').on('click', function() {
            var type = $(this).attr('data-type');
            var status = 10;
            switch (type) {
                case 'pass':
                    status = 20;
                    break;

                case 'failed':
                    status = 30;
                    break;
            }

            $.post("<?= url('exam/examine') ?>", {
                id: $('#id').val(),
                bonus: $('#bonus').val(),
                status: status
            }, function(res) {
                if (res.code == 1) {
                    layer.msg(res.msg, {
                        time: 1500,
                        anim: 1
                    }, function(res) {
                        var url = "<?= url('exam/index') ?>&type=<?= $type ?>";
                        window.location.href = url;
                    });
                } else {
                    layer.msg(res.msg, {
                        time: 1500,
                        anim: 1
                    }, function(res) {});
                }

            })

            return false;
        })





    });
</script>