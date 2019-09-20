<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">所有活动</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius" href="<?= url('activity/add') ?>">
                                        <span class="am-icon-plus"></span> 发起新活动
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-scrollable-horizontal am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped
                         tpl-table-black am-text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>活动标题</th>
                                    <th>封面</th>
                                    <th>报名时间</th>
                                    <th>活动时间</th>
                                    <th>排序</th>
                                    <th>添加时间</th>
                                    <th>报名人员</th>                                    
                                    <th>赞助人员</th>                                    
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                        <tr>
                                            <td class="am-text-middle">
                                                <?= $item['id'] ?>
                                            </td>
                                            <td class="am-text-middle" style="white-space:nowrap;text-overflow:ellipsis;overflow:hidden;">
                                                <?= $item['title'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <a href="<?= $item['cover']['file_path'] ?>" title="点击查看大图" target="_blank">
                                                    <img src="<?= $item['cover']['file_path'] ?>" width="72" height="72" alt="">
                                                </a>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= date('Y/m/d', $item['sign_begin']) . '~' . date('Y/m/d', $item['sign_end']) ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= date('Y/m/d', $item['active_begin']) . '~' . date('Y/m/d', $item['active_end']) ?>
                                            </td>  
                                            <td class="am-text-middle">
                                                <?= $item['sort'] ?>
                                            </td>                                         
                                            <td class="am-text-middle">
                                                <?= $item['create_time'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <div class="tpl-table-black-operation">
                                                    <a class="tpl-table-black-operation-green" href="<?= url(
                                                                    'activity/sign_report',
                                                                    ['id' => $item['id']]
                                                                ) ?>">
                                                        <i class="am-icon-users"></i> 查看
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="am-text-middle">
                                                <div class="tpl-table-black-operation">
                                                    <a class="tpl-table-black-operation-green" href="<?= url(
                                                                    'activity/sup_report',
                                                                    ['id' => $item['id']]
                                                                ) ?>">
                                                        <i class="am-icon-users"></i> 查看
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="am-text-middle">
                                                <div class="tpl-table-black-operation">
                                                    <a href="<?= url(
                                                                    'activity/edit',
                                                                    ['id' => $item['id']]
                                                                ) ?>">
                                                        <i class="am-icon-pencil"></i> 修改
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

        // 删除元素
        var url = "<?= url('activity/delete') ?>";
        $('.item-delete').delete('id', url);

    });
</script>