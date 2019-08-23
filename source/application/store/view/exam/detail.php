<style>
    .am-btn {
        font-size: 1.4rem;
    }

    .new {}

    .new::before {
        content: '(修)';
        color: red;
        width: 15px;
        height: 15px;
        right: 0;
    }
</style>
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
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
                                    <input type="text" class="tpl-form-input" value="<?=$info['user']['user_name']?>" disabled="disabled">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label"> 用户头像 :</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <a href="<?=$info['user']['avatar_path']?>" title="点击查看大图" target="_blank" style="margin-right:10px;">
                                        <img src="<?=$info['user']['avatar_path']?>" width="108" height="108" alt="">
                                    </a>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label"> 用户提交时的等级 :</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" value="<?=$info['level_option']?>" disabled="disabled">
                                </div>
                            </div>


                            <!-- 单位 -->
                            <?php if (!empty($info['user']['company'])): ?>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label"> 用户单位 :</label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" value="<?=$info['user']['company']['company_name']?>" disabled="disabled">
                                    </div>
                                </div>
                            <?php endif;?>


                            <!--  -->
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">审核信息</div>
                            </div>
                            <?php foreach ($data as $key => $item): ?>
                                <?php if ($key == 'input'): ?>
                                    <?php foreach ($item as $k => $v): if (isset($map[$k])): ?>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-u-lg-2 am-form-label <?=isset($new_data) ? (isset($new_data['input'][$k]) ? 'new' : '') : ''?>"> <?=$map[$k]?> :</label>
                                            <div class="am-u-sm-9 am-u-end">
                                                <input type="text" class="tpl-form-input" name="<?=$k?>" value="<?=$k == 'gender' ? ($v == 0 ? '男' : '女') : $v?>" disabled="disabled">
                                            </div>
                                        </div>
                                    <?php endif;endforeach;?>
                                <?php elseif ($key == "text"): ?>
                                    <div class="widget-head am-cf">
                                        <div class="widget-title am-fl">详细信息</div>
                                    </div>
                                    <?php foreach ($item as $k => $v): ?>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-u-lg-2 am-form-label <?=isset($new_data) ? (isset($new_data['text'][$k]) ? 'new' : '') : ''?>"> <?=$map[$k]?> :</label>
                                            <div class="am-u-sm-9 am-u-end">
                                                <textarea name="<?=$k?>" disabled="disabled" rows="10"><?=$v?></textarea>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                <?php elseif ($key == "image"): ?>
                                    <?php foreach ($item as $k => $v): ?>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-u-lg-2 am-form-label <?=isset($new_data) ? (isset($new_data['image'][$k]) ? 'new' : '') : ''?>"> <?=$map[$k]?> :</label>
                                            <?php if ($k == 'order_id'): ?>
                                                <div class="tpl-table-black-operation" style="padding-top: .8rem;">
                                                    <a href="<?=url('order/detail', ['order_id' => $v])?>" style="margin-left: 10px;" class="tpl-table-black-operation">点击跳转</a>
                                                </div>
                                            <?php else: ?>
                                                <div class="am-u-sm-9 am-u-end">
                                                    <?php if (is_array($v)): foreach ($v as $c): ?>
                                                        <a href="<?=$c?>" title="点击查看大图" target="_blank" style="margin-right:10px;">
                                                            <img name="<?=$k?>" src="<?=$c?>" width="72" height="72" alt="">
                                                        </a>
                                                    <?php endforeach;else: ?>
                                                        <a href="<?=$v?>" title="点击查看大图" target="_blank">
                                                            <img name="<?=$k?>" src="<?=$v?>" width="72" height="72" alt="">
                                                        </a>
                                                    <?php endif;?>
                                                </div>
                                            <?php endif;?>
                                        </div>

                                    <?php endforeach;?>

                                <?php elseif ($key == 'array'): ?>
                                    <?php foreach ($item as $k => $v): ?>
                                        <div class="widget-head am-cf">
                                            <div class="widget-title am-fl">
                                                <span class="<?=isset($new_data) ? (!empty($new_data['array']) ? 'new' : '') : ''?>"> <?=$map[$k]?></span>
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <?php foreach ($v as $_k => $_v): foreach ($_v as $i => $value): ?>
                                                <label class="am-u-sm-3 am-u-lg-2 am-form-label"> <?=$value['name'] . ($_k + 1)?>:</label>
                                                <div class="am-u-sm-9 am-u-end">
                                                    <input type="text" class="tpl-form-input" value="<?=$value['value']?>" disabled="disabled">
                                                </div>
                                            <?php endforeach;endforeach;?>
                                            <!-- todo -->
                                        </div>
                                    <?php endforeach;?>

                                <?php elseif ($key == "file"): ?>
                                    <?php foreach ($item as $k => $v): ?>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-u-lg-2 am-form-label <?=isset($new_data) ? (isset($new_data['file'][$k]) ? 'new' : '') : ''?>"> <?=$map[$k]?> :</label>
                                            <div class="am-u-sm-1 am-u-end am-form-label">
                                                <a href="<?=$v?>" title="点击查看" target="_blank">
                                                    <?=explode('/', $v)[count(explode('/', $v)) - 1]?>
                                                </a>
                                            </div>
                                        </div>

                                    <?php endforeach;?>


                                <?php elseif ($key == "cover"): ?>
                                    <?php foreach ($item as $k => $v): ?>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-u-lg-2 am-form-label <?=isset($new_data) ? (isset($new_data['cover'][$k]) ? 'new' : '') : ''?>"> <?=$map[$k]?> :</label>
                                            <div class="am-u-sm-9 am-u-end">
                                                <a href="<?=$item[$k]?>" title="点击查看大图" target="_blank">
                                                    <img name="<?=$k?>" src="<?=$v?>" width="144" height="144" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach;?>

                                <?php elseif ($key == 'content'): ?>
                                    <?php foreach ($item as $k => $v): ?>
                                        <div class="am-form-group">
                                            <label class="am-u-sm-3 am-u-lg-2 am-form-label <?=isset($new_data) ? (isset($new_data['content'][$k]) ? 'new' : '') : ''?>"><?=$map[$k]?></label>
                                            <div class="am-u-sm-9 am-u-end">
                                                <textarea id="container" type="text/plain" style="width:1000px;height:600px;"><?=$v?></textarea>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                <?php endif;?>

                            <?php endforeach;?>

                            <?php if ($info['type_bonus'] == 'site'): ?>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">用户单位信息：</label>
                                    <div class="am-u-sm-9 am-u-end" style="padding-top:.6rem;">
                                        <a style="font-size:14px;" href="<?=url('user/show', ['user_id' => $info['user_id']])?>">点击跳转</a>
                                    </div>
                                </div>



                            <?php endif;?>




                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">备注</div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label">备注信息&驳回理由</label>
                                <div class="am-u-sm-9 am-u-end">
                                    <textarea type="text" id="bonus" class="tpl-form-input"><?=$info['bonus']?></textarea>
                                </div>
                            </div>

                            <?php if ($info['type'] == 10 && $info['type_bonus'] == 'company'): ?>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">确认会员等级</label>
                                    <div class="am-u-sm-9 am-u-end" style="padding-top:.8rem;">
                                        <select id="memberLevel" data-am-selected="{btnSize: 'sm',maxHeight: 200}">
                                            <option value=""></option>
                                            <?php if (isset($data['input']['memberLevel'])): ?>
                                                <option value="会长单位" <?=$data['input']['memberLevel'] == '会长单位' ? 'selected' : ''?>>会长单位</option>
                                                <option value="常务副会长单位" <?=$data['input']['memberLevel'] == '常务副会长单位' ? 'selected' : ''?>>常务副会长单位</option>
                                                <option value="副会长单位" <?=$data['input']['memberLevel'] == '副会长单位' ? 'selected' : ''?>>副会长单位</option>
                                                <option value="常务理事单位" <?=$data['input']['memberLevel'] == '常务理事单位' ? 'selected' : ''?>>常务理事单位</option>
                                                <option value="理事单位" <?=$data['input']['memberLevel'] == '理事单位' ? 'selected' : ''?>>理事单位</option>
                                                <option value="监事长单位" <?=$data['input']['memberLevel'] == '监事长单位' ? 'selected' : ''?>>监事长单位</option>
                                                <option value="常务副监事长单位" <?=$data['input']['memberLevel'] == '常务副监事长单位' ? 'selected' : ''?>>常务副监事长单位</option>
                                                <option value="副监事长单位" <?=$data['input']['memberLevel'] == '副监事长单位' ? 'selected' : ''?>>副监事长单位</option>
                                                <option value="常务监事单位" <?=$data['input']['memberLevel'] == '常务监事单位' ? 'selected' : ''?>>常务监事单位</option>
                                                <option value="监事单位" <?=$data['input']['memberLevel'] == '监事单位' ? 'selected' : ''?>>监事单位</option>
                                                <option value="会员单位" <?=$data['input']['memberLevel'] == '会员单位' ? 'selected' : ''?>>会员单位</option>
                                            <?php else: ?>
                                                <option value="会长单位">会长单位</option>
                                                <option value="常务副会长单位">常务副会长单位</option>
                                                <option value="副会长单位">副会长单位</option>
                                                <option value="常务理事单位">常务理事单位</option>
                                                <option value="理事单位">理事单位</option>
                                                <option value="监事长单位">监事长单位</option>
                                                <option value="常务副监事长单位">常务副监事长单位</option>
                                                <option value="副监事长单位">副监事长单位</option>
                                                <option value="常务监事单位">常务监事单位</option>
                                                <option value="监事单位">监事单位</option>
                                                <option value="会员单位">会员单位</option>
                                            <?php endif;?>

                                        </select>
                                    </div>
                                </div>
                            <?php endif;?>

                            <?php if ($info['type'] == 10 && $info['type_bonus'] == 'person'&& !empty($data['input']['memberLevel'])): ?>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label">确认会员等级</label>
                                    <div class="am-u-sm-9 am-u-end" style="padding-top:.8rem;">
                                        <select id="memberLevel" data-am-selected="{btnSize: 'sm',maxHeight: 200}">
                                            <option value=""></option>
                                            <?php if (isset($data['input']['memberLevel'])): ?>
                                                <option value="会长" <?=$data['input']['memberLevel'] == '会长' ? 'selected' : ''?>>会长</option>
												<option value="监事长" <?=$data['input']['memberLevel'] == '监事长' ? 'selected' : ''?>>监事长</option>
                                                <option value="常务副会长" <?=$data['input']['memberLevel'] == '常务副会长' ? 'selected' : ''?>>常务副会长</option>
												<option value="常务副监事长" <?=$data['input']['memberLevel'] == '常务副监事长' ? 'selected' : ''?>>常务副监事长</option>
                                                <option value="副会长" <?=$data['input']['memberLevel'] == '副会长' ? 'selected' : ''?>>副会长</option>
												<option value="副监事长" <?=$data['input']['memberLevel'] == '副监事长' ? 'selected' : ''?>>副监事长</option>
												<option value="秘书长" <?=$data['input']['memberLevel'] == '秘书长' ? 'selected' : ''?>>秘书长</option>
												<option value="副秘书长" <?=$data['input']['memberLevel'] == '副秘书长' ? 'selected' : ''?>>副秘书长</option>
                                                <option value="常务理事" <?=$data['input']['memberLevel'] == '常务理事' ? 'selected' : ''?>>常务理事</option>
												<option value="常务监事" <?=$data['input']['memberLevel'] == '常务监事' ? 'selected' : ''?>>常务监事</option>
                                                <option value="理事" <?=$data['input']['memberLevel'] == '理事' ? 'selected' : ''?>>理事</option>                                                                                                                                                                                                
                                                <option value="监事" <?=$data['input']['memberLevel'] == '监事' ? 'selected' : ''?>>监事</option>
                                                <option value="会员" <?=$data['input']['memberLevel'] == '会员' ? 'selected' : ''?>>会员</option>
                                            <?php else: ?>
                                                <option value="会长">会长</option>
                                                <option value="监事长">监事长</option>
                                                <option value="常务副会长">常务副会长</option>
                                                <option value="常务副监事长">常务副监事长</option>
                                                <option value="副会长">副会长</option>
                                                <option value="副监事长">副监事长</option>
                                                <option value="秘书长">秘书长</option>
                                                <option value="副秘书长">副秘书长</option>
                                                <option value="常务理事">常务理事</option>
                                                <option value="常务监事">常务监事</option>
                                                <option value="理事">理事</option>                                                                                                                                                                                                
                                                <option value="监事">监事</option>
                                                <option value="会员">会员</option>
                                            <?php endif;?>

                                        </select>
                                    </div>
                                </div>
                            <?php endif;?>
							
							
							<?php if($info['type'] == 10 && $info['type_bonus'] == 'person'):?>
								<div class="am-form-group">
									<label class="am-u-sm-3 am-u-lg-2 am-form-label">确认专家等级</label>
									<div class="am-u-sm-9 am-u-end" style="padding-top:.8rem;">
										<select id="expertLevel" data-am-selected="{btnSize: 'sm',maxHeight: 200}">
											<option value=""></option>										
											<?php if (isset($data['input']['expertLevel'])): ?>
												<option value="高级专家" <?=$data['input']['expertLevel'] == '高级专家' ? 'selected' : ''?>>高级专家</option>												
												<option value="资深专家" <?=$data['input']['expertLevel'] == '资深专家' ? 'selected' : ''?>>资深专家</option>												
												<option value="顶级专家" <?=$data['input']['expertLevel'] == '顶级专家' ? 'selected' : ''?>>顶级专家</option>												
											<?php else: ?>
												<option value="高级专家">高级专家</option>
												<option value="资深专家">资深专家</option>
												<option value="顶级专家">顶级专家</option>												
											<?php endif;?>
								
										</select>
									</div>
								</div>																			
							<?php endif;?>


                        </form>

                        <?php if ($status == 10): ?>
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
                                <input type="hidden" id="id" value="<?=$id?>">
                            </div>
                        <?php endif;?>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/store/plugins/umeditor/umeditor.config.js"></script>
<script src="assets/store/plugins/umeditor/umeditor.min.js"></script>
<script>
    $(function() {

        // 富文本编辑器
        var ue = UM.getEditor('container');
        ue.ready(function() {
            //不可编辑
            ue.setDisabled();
        });
        /**
         * 表单验证提交
         * @type {*}
         */
        $('.j-submit').on('click', function() {
            var type = $(this).attr('data-type');
            var level = $('#memberLevel').val();
			var expertLevel = $('#expertLevel').val();
            var status = 10;
            switch (type) {
                case 'pass':
                    status = 20;
                    break;

                case 'failed':
                    status = 30;
                    break;
            }

            $.post("<?=url('exam/examine')?>", {
                id: $('#id').val(),
                bonus: $('#bonus').val(),
                level: level,
				expertLevel:expertLevel,
                status: status
            }, function(res) {
                if (res.code == 1) {
                    layer.msg(res.msg, {
                        time: 1500,
                        anim: 1
                    }, function(res) {
                        var url = "<?=url('exam/index')?>&type=<?=$type?>";
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