<style>
    .am-form-field {
        /* width:8rem; */
    }
</style>
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">会员项目列表</div>
                </div>

                <div class="widget-body am-fr" style="display: flex;align-items: start;justify-content: space-between;flex-direction: row;flex-wrap: wrap;">
                    <!-- 搜索栏 -->
                    <form method="GET" action="" id="form">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                    <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                        <span class="am-icon-phone"></span> 服务类别
                                    </a>
                                    <select name="server_cate" id="check_status" style="font-size:12px;" data-am-selected="{btnWidth: '80px',maxHeight:'320px', btnSize: 'xs'}">
                                        <option value="0">不限</option>
                                        <?php foreach ($cates['server_cate'] as $key => $item) : ?>
                                            <option value="<?= $key ?>" <?= (isset($map['server_cate']) && $map['server_cate'] == $key) ? 'selected' : ''  ?>><?= $item ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                    <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                        <span class="am-icon-phone"></span> 工程类别
                                    </a>
                                    <select name="eng_cate" id="check_status" style="font-size:12px;" data-am-selected="{btnWidth: '80px',maxHeight:'320px', btnSize: 'xs'}">
                                        <option value="0">不限</option>
                                        <?php foreach ($cates['eng_cate'] as $key => $item) : ?>
                                            <option value="<?= $key ?>" <?php if (isset($map['eng_cate']) && $map['eng_cate'] == $key) : ?> selected <?php endif; ?>><?= $item ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                    <a type="button" class="am-btn am-btn-default am-btn-primary am-margin-right" id="my-start">开始日期</a>
                                    <input type="text" class="am-form-field" style="padding: 3px 5px;" name="startDate" id="my-startDate" value="<?= isset($map['startDate']) ? $map['startDate'] : "" ?>">
                                    <a type="button" class="am-btn am-btn-default am-btn-primary am-margin-right" id="my-end">结束日期</a>
                                    <input type="text" class="am-form-field" style="padding: 3px 5px;" name="endDate" id="my-endDate" value="<?= isset($map['endDate']) ? $map['endDate'] : "" ?>">
                                </div>
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius" id="search" href="javascript:;">
                                        <span class="am-icon-search"></span> 搜索
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>服务类别</th>
                                    <th>工程类别</th>
                                    <th>合同金额</th>
                                    <th>总投资额</th>
                                    <th>签订日期</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                        <tr>
                                            <td class="am-text-middle">
                                                <p class="item-title"><?= $item['id'] ?></p>
                                            </td>
                                            <td class="am-text-middle">
                                                <p class="item-title"><?= $item['title'] ?></p>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= implode('/', $item['server_cate']) ?>
                                            </td>
                                            <td class="am-text-middle"><?= implode('/', $item['eng_cate']) ?></td>
                                            <td class="am-text-middle"> <?= $item['assignment_money'] ?></td>
                                            <td class="am-text-middle"> <?= $item['total_invest'] ?></td>
                                            <td class="am-text-middle"> <?= date('Y-m-d',$item['assignment_date']) ?></td>
                                            <td class="am-text-middle">
                                                <div class="tpl-table-black-operation">
                                                    <a class="tpl-table-black-operation" href="<?= url(
                                                                                                    'list_date/project_detail',
                                                                                                    ['id' => $item['id']]
                                                                                                ) ?>" class="am-btn am-btn-xs am-radius">
                                                        <i class="am-icon-book"></i> 查看
                                                    </a>
                                                    <!-- <a class="tpl-table-black-operation-del" href="javascript:;" onclick="">
                                                                <i class="am-icon-pencil"></i> 删除
                                                            </a> -->
                                                </div>

                                            </td>
                                        </tr>
                                    <?php endforeach;
                            else : ?>
                                    <tr>
                                        <td colspan="8" class="am-text-center">暂无记录</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr"><?= $list->render() ?> </div>
                        <div class="am-fr pagination-total am-margin-right">
                            <div class="am-vertical-align-middle">总记录：<?= $list->total() ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        var $modal = $('#your-modal');
        $('#search').on('click', function(e) {
            var url = "<?php echo url('list_data/user_project') ?>";
            var param = $('#form').serialize();
            var html = url + '&' + param;
            window.location.href = html;
        });
        //        
    });
</script>
<script>
    $(function() {

        var b = "<?= isset($map['startDate']) ? $map['startDate'] : "" ?>";
        var e = "<?= isset($map['endDate']) ? $map['endDate'] : "" ?>";
        var startDate = new Date(b);
        var endDate = new Date(e);
        // 
        $('#my-start').datepicker().on('changeDate.datepicker.amui', function(event) {
            if (event.date.valueOf() > endDate.valueOf()) {
                alert('开始日期应小于结束日期！');
            } else {
                startDate = new Date(event.date);
                $('#my-startDate').val($('#my-start').data('date'));
            }
            $(this).datepicker('close');
        });

        $('#my-end').datepicker().
        on('changeDate.datepicker.amui', function(event) {
            if (event.date.valueOf() < startDate.valueOf()) {
                alert('结束日期应大于开始日期！');
            } else {
                endDate = new Date(event.date);
                $('#my-endDate').val($('#my-end').data('date'));
            }
            $(this).datepicker('close');
        });
    });
</script>