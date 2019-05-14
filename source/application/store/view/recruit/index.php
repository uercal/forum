<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">所有招聘</div>
                </div>
                <div class="widget-body am-fr" style="display: flex;flex-direction: row;flex-wrap: wrap;">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius" href="<?= url('recruit/add') ?>">
                                        <span class="am-icon-plus"></span> 发起协会招聘
                                    </a>
                                </div>
                                <!-- 搜索栏 -->
                                <form method="GET" action="" id="form">
                                    <div class="am-form-group">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                                <a class="am-btn am-btn-default am-radius " href="javascript:;">
                                                    <span class="am-icon-pencil"></span> 招聘类型
                                                </a>
                                                <select name="type" class="am-field-valid" id="type" style="font-size:12px;" data-am-selected="{btnSize: 'sm',  placeholder:'请选择审核类型'}">
                                                    <option value="10" <?php if (isset($map['type']) && $map['type'] == 10) : ?> selected <?php endif; ?>>协会招聘</option>
                                                    <option value="20" <?php if (isset($map['type']) && $map['type'] == 20) : ?> selected <?php endif; ?>>单位招聘</option>
                                                </select>
                                            </div>
                                            <!--                                 
                                <div class="am-btn-group am-btn-group-xs" style="display:flex;">
                                    <a class="am-btn am-btn-default am-radius" href="javascript:;">
                                        <span class="am-icon-home"></span> 用户id
                                    </a>
                                    <input type="text" class="am-form-field" name="user_id" style="padding: 3px 5px;" placeholder="用户id" value="<?= isset($map['user_id']) ? $map['user_id'] : "" ?>">
                                </div> -->

                                            <!-- <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius" id="search" href="javascript:;">
                                        <span class="am-icon-search"></span> 搜索
                                    </a>
                                </div> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-body am-fr">

                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>职位名称</th>
                                    <th>地址</th>
                                    <th>薪资</th>
                                    <th>招聘者</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($list)) : foreach ($list as $item) : ?>
                                        <tr>
                                            <td class="am-text-middle">
                                                <?= $item['id'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['job_name'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['job_address_name'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= explode(',',$item['job_price'])[0].'~'.explode(',',$item['job_price'])[1] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['user'] ? $item['user']['company']['company_name'] : '协会' ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['create_time'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <div class="tpl-table-black-operation">
                                                    <a href="<?= url(
                                                                    'recruit/edit',
                                                                    ['id' => $item['id']]
                                                                ) ?>">
                                                        <i class="am-icon-pencil"></i> 查看
                                                    </a>
                                                    <a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?= $item['id'] ?>">
                                                        <i class="am-icon-trash"></i> 删除
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                            else : ?>
                                    <tr>
                                        <td colspan="7" class="am-text-center">暂无记录</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">
                        <div class="am-fr">
                            <?= $list->render() ?>
                        </div>
                        <div class="am-fr pagination-total am-margin-right">
                            <div class="am-vertical-align-middle">总记录：
                                <?= $list->total() ?>
                            </div>
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
        $('#type').on('change', function() {
            var url = "<?php echo url('recruit/index') ?>";
            var param = $('#form').serialize();
            var html = url + '&' + param;
            window.location.href = html;
        });
    });
</script>
<script>
    $(function() {

        // 删除元素
        var url = "<?= url('recruit/delete') ?>";
        $('.item-delete').delete('id', url);

    });
</script>