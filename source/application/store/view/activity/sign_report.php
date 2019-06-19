<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-cf"><?= $detail['title'] ?>报名表</div>
                </div>
                <div class="widget-body am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-primary am-radius" href="<?= url('activity/index') ?>">
                                        <span class="am-icon-angle-left"></span> 返回
                                    </a>
                                </div>
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="am-btn am-btn-default am-btn-success am-radius" href="<?= url('activity/outSign') ?>&act_id=<?= $detail['id'] ?>">
                                        <span class="am-icon-book"></span> 导出excel
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
                                    <th>联系人</th>
                                    <th>联系电话</th>
                                    <th>联系邮箱</th>
                                    <th>报名人数</th>
                                    <th>学历学位</th>
                                    <th>职位</th>
                                    <th>职称</th>
                                    <th>单位名称</th>
                                    <th>单位电话</th>
                                    <th>邮箱</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!$list->isEmpty()) : foreach ($list as $item) : ?>
                                        <tr>
                                            <td class="am-text-middle">
                                                <?= $item['concat_person'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['phone'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['concat_email'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['member_count'] ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['user']['person'] ? $item['user']['person']['education_degree'] : '' ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['user']['person'] ? $item['user']['person']['job'] : '' ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['user']['person'] ? $item['user']['person']['positio'] : '' ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['user']['company'] ? $item['user']['company']['company_name'] : '' ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['user']['company'] ? $item['user']['company']['company_tel'] : '' ?>
                                            </td>
                                            <td class="am-text-middle">
                                                <?= $item['user']['company'] ? $item['user']['company']['email'] : '' ?>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                            else : ?>
                                    <tr>
                                        <td colspan="9" class="am-text-center">暂无记录</td>
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

    });
</script>