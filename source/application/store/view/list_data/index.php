<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf"><?= $mode['name'] ?></div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius" href="<?= url('list_data/list_add&mode_id=') . $mode['id'] ?>">
                                        <span class="am-icon-plus"></span> 新增
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
                                    <th>列表名称</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                        <tr>
                                            <td class="am-text-middle">
                                                <?= $item['id'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['name'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['create_time'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <div class="tpl-table-black-operation">
                                                    <a href="<?= url(
                                                                    'list_data/list_detail',
                                                                    ['id' => $item['id']]
                                                                ) ?>">
                                                        <i class="am-icon-pencil"></i> 查看列表
                                                    </a>
                                                    <a href="<?= url(
                                                                    'list_data/list_edit',
                                                                    ['id' => $item['id']]
                                                                ) ?>">
                                                        <i class="am-icon-pencil"></i> 修改
                                                    </a>
                                                    <?php if ($mode['key_word'] == 'user_news') : ?>
                                                        <a class="tpl-table-black-operation-green" href="<?= url(
                                                                                                                'list_data/exportList',
                                                                                                                ['id' => $item['id']]
                                                                                                            ) ?>">
                                                            <i class="am-icon-book"></i> 导出清单
                                                        </a>
                                                    <?php endif; ?>
                                                    <a href="javascript:;" class="item-delete tpl-table-black-operation-del" data-id="<?= $item['id'] ?>">
                                                        <i class="am-icon-trash"></i> 删除
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                            else : ?>
                                    <tr>
                                        <td colspan="4" class="am-text-center">暂无记录</td>
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
        var url = "<?= url('list_data/list_delete') ?>";
        $('.item-delete').delete('id', url);
    });
</script>