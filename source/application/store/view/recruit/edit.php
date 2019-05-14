<link rel="stylesheet" href="assets/store/css/goods.css">
<link rel="stylesheet" href="assets/store/plugins/umeditor/themes/default/css/umeditor.css">
<style>
    .price {
        display: flex;
        width: 50%;
        align-items: center;
    }

    .price>input {
        width: 10% !important;
    }

    input {
        text-align: center;
    }
</style>
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
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">招聘职位 </label>
                                <div class="am-u-sm-9 am-u-end price">
                                    <input type="text" class="tpl-form-input" name="recruit[job_name]" value="<?= $model['job_name'] ?>" required>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">工作地点 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <select name="recruit[job_address][0]" id="province" required data-am-selected="{btnSize: 'sm',maxHeight:'300px'}">
                                        <option value=""></option>
                                        <?php foreach ($region_data as $key => $first) : ?>
                                            <option value="<?= $first['id'] ?>" <?= $first['id'] == explode(',', $model['job_address'])[0] ? 'selected' : '' ?>><?= $first['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <select name="recruit[job_address][1]" id="city" required data-am-selected="{btnSize: 'sm',maxHeight:'300px'}">
                                        <option value=""></option>
                                        <?php foreach ($region_data[explode(',', $model['job_address'])[0]]['city'] as $key => $first) : ?>
                                            <option value="<?= $first['id'] ?>" <?= $first['id'] == explode(',', $model['job_address'])[1] ? 'selected' : '' ?>><?= $first['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <select name="recruit[job_address][2]" id="region" required data-am-selected="{btnSize: 'sm',maxHeight:'300px'}">
                                        <option value=""></option>
                                        <?php foreach ($region_data[explode(',', $model['job_address'])[0]]['city'][explode(',', $model['job_address'])[1]]['region'] as $key => $first) : ?>
                                            <option value="<?= $first['id'] ?>" <?= $first['id'] == explode(',', $model['job_address'])[2] ? 'selected' : '' ?>><?= $first['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">薪资 </label>
                                <div class="am-u-sm-9 am-u-end price">
                                    <input type="tel" class="tpl-form-input" name="recruit[job_price]" value="<?= explode(',', $model['job_price'])[0] ?>" required>
                                    至
                                    <input type="tel" class="tpl-form-input" name="recruit[_job_price]" value="<?= explode(',', $model['job_price'])[1] ?>" required>
                                    <small>元</small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">工作经验 </label>
                                <div class="am-u-sm-9 am-u-end price">
                                    <select name="recruit[job_experience]" required data-am-selected="{btnSize: 'sm'}">
                                        <?php foreach ([
                                            '-2' => '不限',
                                            '-1' => '应届生',
                                            '0,1' => '1年以内',
                                            '1,3' => '1-3年',
                                            '3,5' => '3-5年',
                                            '5,10' => '5-10年',
                                            '11' => '10年以上'
                                        ] as $key => $first) : ?>
                                            <option value="<?= $key ?>" <?= $key == $model['job_experience'] ? 'selected' : '' ?>><?= $first ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">学历 </label>
                                <div class="am-u-sm-9 am-u-end">
                                    <select name="recruit[job_education]" required data-am-selected="{btnSize: 'sm'}">
                                        <?php foreach ([
                                            '0' => '不限',
                                            '10' => '专科',
                                            '20' => '本科',
                                            '30' => '硕士',
                                            '40' => '博士'
                                        ] as $key => $first) : ?>
                                            <option value="<?= $key ?>" <?= $key == $model['job_education'] ? 'selected' : '' ?>><?= $first ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
                                        <textarea id="container" name="recruit[content]" type="text/plain" style="width:1000px;height:600px;"><?= $model['content'] ?></textarea>
                                    </div>
                                </div>

                            </div>


                            <!--  -->
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">其他</div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-u-lg-2 am-form-label form-require">排序 </label>
                                <div class="am-u-sm-3 am-u-end">
                                    <input type="number" class="tpl-form-input" name="recruit[sort]" value="<?= $model['sort'] ?>" required>
                                    <small>数字越小越靠前</small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-6 am-u-sm-push-3 am-margin-top-lg">
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



        $('#province').on('change', function() {
            var p_id = $(this).val();
            $.get('<?= url('regionAjax') ?>', {
                type: 'province',
                pid: p_id,
                cid: 0
            }, function(res) {
                var data = res.city;
                var html = '';
                $('#city').html('');
                for (var i in data) {
                    html += '<option value="';
                    html += data[i].id;
                    html += '">';
                    html += data[i].name;
                    html += '</option>';
                }
                $('#city').html(html);
            })
        })

        $('#city').on('change', function() {
            var c_id = $(this).val();
            if (c_id == 0) {
                return false;
            }
            var p_id = $('#province').val();
            $.get('<?= url('regionAjax') ?>', {
                type: 'city',
                pid: p_id,
                cid: c_id
            }, function(res) {
                var data = res.region;
                var html = '';
                $('#region').html('');
                for (var i in data) {
                    html += '<option value="';
                    html += data[i].id;
                    html += '">';
                    html += data[i].name;
                    html += '</option>';
                }
                $('#region').html(html);
            })
        })


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