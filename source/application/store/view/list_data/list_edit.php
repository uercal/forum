<link rel="stylesheet" href="assets/store/css/goods.css">
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<link rel="stylesheet" href="assets/layui/css/layui.css" media="all">
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <form id="my-form" class="am-form tpl-form-line-form" enctype="multipart/form-data" method="post">
                    <div class="widget-body">
                        <fieldset>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">列表类型（<?=$model['mode']['name']?>）</div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">列表名称 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <input type="text" class="tpl-form-input" name="list[name]" value="<?=$model['name']?>" required>
                                </div>
                            </div>

                            <?php if ($model['mode']['key_word'] == 'user_news' || $model['mode']['key_word'] == 'news' || $model['mode']['key_word'] == 'mag'): ?>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">是否含类别 </label>
                                    <div class="am-u-sm-9 am-u-end" id="radio_show">
                                        <label class="am-radio-inline">
                                            <input type="radio" name="list[cate_exist]" value="0" data-am-ucheck <?=$model['cate_exist'] == 0 ? 'checked' : ''?>>
                                            否
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" name="list[cate_exist]" value="1" data-am-ucheck <?=$model['cate_exist'] == 1 ? 'checked' : ''?>>
                                            是
                                        </label>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">是否含封面 </label>
                                    <div class="am-u-sm-9 am-u-end" id="radio_show">
                                        <label class="am-radio-inline">
                                            <input type="radio" name="list[cover_exist]" value="0" data-am-ucheck <?=$model['cover_exist'] == 0 ? 'checked' : ''?>>
                                            否
                                        </label>
                                        <label class="am-radio-inline">
                                            <input type="radio" name="list[cover_exist]" value="1" data-am-ucheck <?=$model['cover_exist'] == 1 ? 'checked' : ''?>>
                                            是
                                        </label>
                                    </div>
                                </div>

                                <div class="am-form-group" id="cate_exist" style="display:<?=$model['cate_exist'] == 0 ? 'none' : 'block'?>">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">类别<small>(每个类别用逗号隔开)</small></label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" name="list[options]" value="<?=$model['options']?>" required>
                                    </div>
                                </div>

                            <?php endif;?>

                            <?php if ($model['mode']['key_word'] == 'job'): ?>
                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">往届列表 </label>
                                    <div class="am-u-sm-9 am-u-end" id="pre_lists">
                                    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">

                                    </fieldset>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">往届列表名称 </label>
                                    <div class="am-u-sm-9 am-u-end">
                                        <input type="text" class="tpl-form-input" name="list[pre_name]" value="<?=$model['pre_name']?>" required>
                                    </div>
                                </div>

                                <input type="hidden" name="list[pre_lists]" value="">
                            <?php endif;?>


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

<script src="assets/layui/layui.js"></script>

<script>

layui.use(['transfer', 'layer', 'util'], function(){
  var $ = layui.$
  ,transfer = layui.transfer
  ,layer = layui.layer
  ,util = layui.util;

  var $data = JSON.parse('<?=json_encode($all_list)?>');
  var $data_ed = JSON.parse('<?=json_encode($pre_lists)?>');
  //模拟数据
  var data1 = $data;

  //基础效果
  transfer.render({
    elem: '#pre_lists'
    ,title: ['所有列表', '往届列表']
    ,data: data1
    ,value:$data_ed
  })

});

    $(function() {
        /**
         * 表单验证提交
         * @type {*}
         */
        $('#my-form').superForm({
            // 验证
            validation: function() {
                if('job'=="<?=$model['mode']['key_word']?>"){
                    var input = $('.layui-transfer-box[data-index="1"] ul li>input');
                    var pre_ids = [];
                    input.map(function(e){
                        pre_ids.push($(input[e]).val())
                    })
                    pre_ids = pre_ids.join(',');
                    $('input[name="list[pre_lists]"]').val(pre_ids);
                    return true;
                }else{
                    return true;
                }
            }
        });

        $("input[name='list[cate_exist]']").on('click', function() {
            if ($(this).val() == 1) {
                $('#cate_exist').show();
            } else {
                $('#cate_exist').hide();
            }
        })
    });
</script>