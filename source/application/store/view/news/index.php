<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf">新闻列表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius" href="<?= url('news/add') ?>">
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
                                    <th>新闻ID</th>
                                    <th>父级</th>
                                    <th>标题</th>
                                    <th>封面</th>
                                    <th>排序</th>
                                    <th>访问数</th>
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
                                        <?= $item['parent']['name'] ?>
                                    </td>
                                    <td class="am-text-middle">
                                        <p class="item-title">
                                            <?= $item['title'] ?>
                                        </p>
                                    </td>
                                    <td class="am-text-middle">
                                        <a href="<?= $item['cover']['file_path'] ?>" title="点击查看大图" target="_blank">
                                            <img src="<?= $item['cover']['file_path'] ?>" width="72" height="72" alt="">
                                        </a>
                                    </td>
                                    <td class="am-text-middle">
                                        <?= $item['sort'] ?>
                                    </td>
                                    <td class="am-text-middle">
                                        <?= $item['read_count'] ?>
                                    </td>
                                    <td class="am-text-middle">
                                        <?= $item['create_time'] ?>
                                    </td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="<?= url(
                                                            'news/edit',
                                                            ['id' => $item['id']]
                                                        ) ?>">
                                                <i class="am-icon-pencil"></i> 编辑
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
        var url = "<?= url('news/delete') ?>";
        $('.item-delete').delete('id', url);

    });
</script> 